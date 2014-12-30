<?php

namespace Estimations\Bundle\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Estimations\Bundle\MainBundle\Entity\Project;

class IssuesFileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('attachment', 'file')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estimations_bundle_mainbundle_issuesfiletype';
    }
}
