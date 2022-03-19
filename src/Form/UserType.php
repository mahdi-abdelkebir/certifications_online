<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{EmailType, PasswordType, RepeatedType, TextType};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array('label' => false, 'attr' => array('placeholder' => 'Email'), 'invalid_message'=>'my error message!'))
            ->add('username', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'Username')))
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'first_options'  => array('label' => false, 'attr' => array('placeholder' => 'Password')),
                'second_options' => array('label' => false, 'attr' => array('placeholder' => 'Repeat your Password'))));
    }
 
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
            'attr' => array('novalidate' => 'novalidate', 'class' => 'form-horizontal')
        ));
    }
}
