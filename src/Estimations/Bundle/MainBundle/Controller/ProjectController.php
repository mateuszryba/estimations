<?php

namespace Estimations\Bundle\MainBundle\Controller;

use Estimations\Bundle\MainBundle\Form\IssuesFileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Estimations\Bundle\MainBundle\Entity\Project;
use Estimations\Bundle\MainBundle\Form\ProjectType;
use Estimations\Bundle\MainBundle\Entity\Document;

/**
 * Project controller.
 *
 */
class ProjectController extends Controller
{

    /**
     * Lists all Project entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EstimationsMainBundle:Project')->findAll();

        return $this->render('EstimationsMainBundle:Project:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Project entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Project();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('project_show', array('id' => $entity->getId())));
        }

        return $this->render('EstimationsMainBundle:Project:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Project entity.
     *
     * @param Project $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createCreateForm(Project $entity)
    {
        $form = $this->createForm(new ProjectType(), $entity, array(
            'action' => $this->generateUrl('project_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Project entity.
     *
     */
    public function newAction()
    {
        $entity = new Project();
        $form   = $this->createCreateForm($entity);

        return $this->render('EstimationsMainBundle:Project:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Project entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EstimationsMainBundle:Project')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $issues = $entity->getIssues();

        return $this->render('EstimationsMainBundle:Project:show.html.twig', array(
            'entity'      => $entity,
            'issues'      => $issues,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Project entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EstimationsMainBundle:Project')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EstimationsMainBundle:Project:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Project entity.
    *
    * @param Project $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    protected function createEditForm(Project $entity)
    {
        $form = $this->createForm(new ProjectType(), $entity, array(
            'action' => $this->generateUrl('project_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Project entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EstimationsMainBundle:Project')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('project_edit', array('id' => $id)));
        }

        return $this->render('EstimationsMainBundle:Project:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Project entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EstimationsMainBundle:Project')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Project entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('project'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function calculateAverageAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('EstimationsMainBundle:Project')->find($id);

        if (!$project) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $averageCalc = $this->get('estimations_main.calculateAverageSPs');
        $averageCalc->calculateAverages($project);

        $em->persist($project);
        $em->flush();

        return $this->redirect($this->generateUrl('project_show', array('id' => $id)));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function estimateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $project = $em->getRepository('EstimationsMainBundle:Project')->find($id);

        if (!$project) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $estimator = $this->get('estimations_main.estimate');
        $estimationByHours = $estimator->estimateByHours($project);
        $estimationBySprints = $estimator->estimateBySprints($project);

        $project->setEstimationByHours($estimationByHours);
        $project->setEstimationBySprints($estimationBySprints);

        $em->persist($project);
        $em->flush();

        return $this->redirect($this->generateUrl('project_show', array('id' => $id)));
    }

    protected function createLoadForm(Document $document, $id)
    {
        $form = $this->createForm(new IssuesFileType(), $document, array(
            'action' => $this->generateUrl('project_import_issues', array('id'=>$id)),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array(
            'label' =>  $this->get('translator')->trans('import'),
            'attr' => array('class' => 'btn-success')
        ));

        return $form;
    }

    public function loadAction($id){
        $document = new Document();

        $form   = $this->createLoadForm($document, $id);

        return $this->render('EstimationsMainBundle:Project:upload.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function loadIssuesAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('EstimationsMainBundle:Project')->find($id);

        $document = new Document();
        $form = $this->createLoadForm($document, $id);
        $form->handleRequest($request);

        if ($this->getRequest()->getMethod() === 'POST'){
           // $form->handleRequest($this->getRequest());
            if($form->isValid()){
                $document->upload();
                if(file_exists($document->getAbsolutePath()))
                {
                    $issues = $this->get('estimations_main.importer')->importIssuesFromXls($document->getAbsolutePath(), $project);

                    foreach($issues as $issue)
                    {
                        $em->persist($issue);
                        $project->addIssue($issue);
                    }

                    $em->persist($project);
                    $em->flush();

                    $this->redirect($this->generateUrl('project'));
                }
                else
                {
                    echo('File does not exist');
                    exit;
                }
            }
        }
        return $this->redirect($this->generateUrl('project_show', array('id'=>$id)));
    }

    /**
     * Creates a form to delete a Project entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('project_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'delete', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
