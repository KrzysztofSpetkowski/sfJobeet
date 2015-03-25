<?php

namespace Bootcamp\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                
            ->add('firstName', null, array())
            ->add('lastName', null, array())
            ;

    }
    public function getParent()
    {
        return 'bootcamp_user_registration';
    }

    public function getName()
    {
        return 'bootcamp_user_registration';
    }
}


