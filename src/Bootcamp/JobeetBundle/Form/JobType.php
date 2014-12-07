<?php

namespace Bootcamp\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdAt')   
            ->add('categories')
            ->add('campanyName')
            ->add('type', 'choice', array(
                'choices' => array(
                    1   => "Freelancer",
                    2   => "Etat"
                )
            ))
            ->add('logo', 'file')
            ->add('url', 'url')
            ->add('position')
            ->add('location')
            ->add('description')
            ->add('howToApply')
            ->add('email', 'email')
                
            ->add('submit', 'submit', array('label' => 'dodaj oferte'))
                
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bootcamp\JobeetBundle\Entity\Job'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bootcamp_jobeetbundle_job';
    }
}
