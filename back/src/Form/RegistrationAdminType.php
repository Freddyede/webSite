<?php

namespace App\Form;

use App\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{PasswordType, SubmitType, TextType};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail',TextType::class,array(
                'attr'=>array(
                    'class'=>'form-control text-center',
                    'placeholder'=>'Mail',
                    'required'=>true
                )
            ))
            ->add('userName',TextType::class,array(
                'attr'=>array(
                    'class'=>'form-control text-center',
                    'placeholder'=>'Username',
                    'required'=>true
                )
            ))
            ->add('password',PasswordType::class,array(
                'attr'=>array(
                    'class'=>'form-control text-center',
                    'placeholder'=>'Password',
                    'required'=>true
                )
            ))
            ->add('confirm_password',PasswordType::class,array(
                'attr'=>array(
                    'class'=>'form-control text-center',
                    'placeholder'=>'Confirm Password',
                    'required'=>true
                )
            ))
            ->add('registration',SubmitType::class,array(
                'attr'=>array(
                    'class'=>'btn btn-success'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
        ]);
    }
}
