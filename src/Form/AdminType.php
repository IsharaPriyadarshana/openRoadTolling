<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('className',TextType::class,['label'=>'Class Name','required' => false,  'attr'=>['placeholder'=>"Class Name"]])
            ->add('toll',TextType::class,['label'=>'Toll', 'required' => false, 'attr'=>['placeholder'=>"Toll"]])
            ->add('highwayName',TextType::class,['label'=>'Name','required' => false,  'attr'=>['placeholder'=>"Name"]])
            ->add('highwayCodeName',TextType::class,['label'=>'Code Name', 'required' => false, 'attr'=>['placeholder'=>" Code Name"]])
            ->add('highwayExtensionName',TextType::class,['label'=>'Name', 'required' => false, 'attr'=>['placeholder'=>"Name"]])
            ->add('highwayExtensionCodeName',TextType::class,['label'=>'Code Name', 'required' => false, 'attr'=>['placeholder'=>"Code Name"]])
            ->add('sequenceNo',TextType::class,['label'=>'Sequence Number','required' => false,  'attr'=>['placeholder'=>"Sequence Number"]])
            ->add('macAddress',TextType::class,['label'=>'MAC Address','required' => false,  'attr'=>['placeholder'=>"MAC Address"]])
            ->add('save',SubmitType::class,[
                'label'=>'Save Changes',
                'attr' => [
                    'class'=>"btn btn-outline-success"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
