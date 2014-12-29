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
            ->add('name')
            ->add('hd')
            ->add('velocity')
            ->add('sprintTime')
            ->add('holidays')
            ->add('clientVisits')
            ->add('remaining1SP')
            ->add('remaining2SP')
            ->add('remaining3SP')
            ->add('remaining5SP')
            ->add('remaining8SP')
            ->add('remaining13SP')
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
