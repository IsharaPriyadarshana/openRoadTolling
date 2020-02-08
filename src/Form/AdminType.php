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
            ->add('highwayCodeName',TextType::class,['label'=>'Code Name', 'required' => false, 'attr'=>['placeholder'=>" Code Name",'maxLength'=>"8"]])
            ->add('highwayExtensionName',TextType::class,['label'=>'Name', 'required' => false, 'attr'=>['placeholder'=>"Name"]])
            ->add('highwayExtensionCodeName',TextType::class,['label'=>'Code Name', 'required' => false, 'attr'=>['placeholder'=>"Code Name",'maxLength'=>"8"]])
            ->add('sequenceNo',TextType::class,['label'=>'Distance (from beginning)','required' => false,  'attr'=>['placeholder'=>"Distance (from beginning)"]])
            ->add('apNames',TextType::class,['label'=>'AP Names','required' => false,  'attr'=>['placeholder'=>"AP Names (Separated by Commas)"]])
            ->add('accessKey',TextType::class,['label'=>'Access Key','required' => false,  'attr'=>['placeholder'=>"Access Key"]])
            ->add('macAddress',TextType::class,['label'=>'MAC Address','required' => false,  'attr'=>['placeholder'=>"MAC Addresses (Separated by Commas)"]])
            ->add('gpsTag',TextType::class,['label'=>'GPS Tag','required' => false,  'attr'=>['placeholder'=>"GPS Tags (Separated by Strokes '|')"]])
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
