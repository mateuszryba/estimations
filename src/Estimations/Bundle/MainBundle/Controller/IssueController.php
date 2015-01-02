<?php

namespace Estimations\Bundle\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estimations\Bundle\MainBundle\Entity\Issue;
use Estimations\Bundle\MainBundle\Entity\Project;
use Estimations\Bundle\MainBundle\Form\IssueType;

/**
 * Issue controller.
 *
 */
class IssueController extends Controller
{
    /**
     * Creates a new Issue entity.
     *
     */
    public function createAction(Request $request, $projectId)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('EstimationsMainBundle:Project')->find($projectId);

        $issue = new Issue();
        $issue->setProject($project);

        $form = $this->createCreateForm($issue);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($issue);
            $em->flush();

            return $this->redirect($this->generateUrl('project_show', array('id' => $issue->getProject()->getId())));
        }

        return $this->render('EstimationsMainBundle:Issue:new.html.twig', array(
            'entity' => $issue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Issue entity.
     *
     * @param Issue $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createCreateForm(Issue $entity)
    {
        $form = $this->createForm(new IssueType(), $entity, array(
            'action' => $this->generateUrl('issue_create', array(
                'projectId' => $entity->getProject()->getId())),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Issue entity.
     *
     */
    public function newAction($projectId)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('EstimationsMainBundle:Project')->find($projectId);

        if (!$project) {
            throw $this->createNotFoundException('Unable to find Project entity.');
        }

        $issue = new Issue();
        $issue->setProject($project);
        $form = $this->createCreateForm($issue);

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $this->render('EstimationsMainBundle:Issue:new.html.twig', array(
            'entity' => $issue,
            'form' => $form->createView(),
        ));
    }
}
