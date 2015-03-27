<?php

namespace Bootcamp\JobeetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder
                
            ->add('firstName', null, array('label' => 'Imię'))
            ->add('lastName', null, array('label' => 'Nazwisko'));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'bootcamp_user_registration';
    }
}
