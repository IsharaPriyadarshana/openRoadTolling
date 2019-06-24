<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class,[
                'label'=>'Email',
                'required' => false,
                'attr'=>['placeholder'=>"Email"]
            ])
            ->add('password',RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'required' => false,
                'options' => ['attr' => ['class' => 'password-field']],
                'first_options'  => ['label' => 'Password','attr'=>['placeholder'=>"Password"]],
                'second_options' => ['label' => 'Confirm Password','attr'=>['placeholder'=>"Confirm Password"]],
            ])
            ->add('firstName',TextType::class,['label'=>'First Name',  'attr'=>['placeholder'=>"First Name"]])
            ->add('lastName',TextType::class,['label'=>'Last Name','attr'=>['placeholder'=>"Last Name"]])
            ->add('address',TextareaType::class,['required' => false,'label'=>'Address','attr'=>['placeholder'=>"Address"]])
            ->add('idNumber',TextType::class,['label'=>'NIC Number','attr'=>['placeholder'=>"NIC Number"]])
            ->add('phoneNumber',TelType::class,['label'=>'Phone Number','attr'=>['placeholder'=>"Phone Number"]])
            ->add('image',FileType::class,['label'=>'Photo','required'=>false,'empty_data' => null,'attr'=>['hidden'=>"hidden", 'accept'=>"image/jpeg, image/png"]])
            ->add('save',SubmitType::class,[
                'label'=>'Register',
                'attr' => [
                    'class'=>"btn btn-outline-success float-right"
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
