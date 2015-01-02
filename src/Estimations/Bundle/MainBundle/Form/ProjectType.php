<?php

namespace Estimations\Bundle\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text', array(
                'label'=> 'form.name'
            ))
            ->add('hd','number', array(
                'label'=> 'form.hd'
            ))
            ->add('velocity','number', array(
                'label'=> 'form.velocity'
            ))
            ->add('sprintTime','number', array(
                'label'=> 'form.sprintTime'
            ))
            ->add('holidays','number', array(
                'label'=> 'form.holidays'
            ))
            ->add('clientVisits','number', array(
                'label'=> 'form.clientVisits'
            ))
            ->add('remaining1SP','number', array(
                'label'=> '1sp'
            ))
            ->add('remaining2SP','number', array(
                'label'=> '2sp'
            ))
            ->add('remaining3SP','number', array(
                'label'=> '3sp'
            ))
            ->add('remaining5SP','number', array(
                'label'=> '5sp'
            ))
            ->add('remaining8SP','number', array(
                'label'=> '8sp'
            ))
            ->add('remaining13SP','number', array(
                'label'=> '13sp'
            ))
            ->add('statisticsSprints','number', array(
                'label'=> 'form.statisticsSprints'
            ))
            ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Estimations\Bundle\MainBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estimations_bundle_mainbundle_project';
    }
}
