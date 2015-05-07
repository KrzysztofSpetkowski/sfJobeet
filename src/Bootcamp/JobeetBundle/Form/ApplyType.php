<?php

namespace Bootcamp\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApplyType extends AbstractType
{
    /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
  
            
            ->add('imageFile', 'file', array(
                'label' => 'Curriculum Vitae (wymagane)',
                'attr' => array(
                    'class' => 'form-control',
                )
            )) 
            ->add('coverFile', 'file', array(
                'label' => 'List Motywacyjny',
                'attr' => array(
                    'class' => 'form-control',
                    )
                ))
            ->add('file', 'file', array(
                'label' => 'Inny plik',
                'attr' => array(
                    'class' => 'form-control',
                    )
                ))   
                
                
            ->add('submit', 'submit', array(
                'label' => 'Aplikuj teraz',
                'attr' => array(
                    'class' => 'btn btn-lg btn-danger btn-block',
                    )))
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bootcamp\JobeetBundle\Entity\Apply'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bootcamp_jobeetbundle_apply';
    }
}
