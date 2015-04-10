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
//            ->add('createdAt')   
            
            ->add('campanyName', 'text', array(
                'label' => 'Nazwa firmy:',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('type', 'choice',array(
                'choices' => array(
                    1   => "Umowa o pracę",
                    2   => "Umowa zlecenie",
                    3   => "B2B",
                
                )))
//            ->add('logo', 'file')
//            ->add('url', 'url')
            ->add('position', 'text', array(
                'label' => 'Stanowisko',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('location', 'text', array(
                'label' => 'Miejscowość:',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('description', 'text', array(
                'label' => 'Opis stanowiska:',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('howToApply', 'text', array(
                'label' => 'Preferencje aplikacji',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('email', 'email', array(
                'label' => 'E-mail',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('categories', 'text', array(
                'label' => 'Kategoria:',
//                'choices' => array(
//                    1   => "IT- Programowanie",
//                    2   => "Budownictwo",
//                    3   => "Handel",
//                    4   => "Usługi",
//                    5   => "Praca fizyczna",
//                    6   => "Transport",
                'attr' => array(
                    'class' => 'form-control',
                )
//            )
                    ))   
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
