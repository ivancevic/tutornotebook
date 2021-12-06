<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('fistname', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'label' => 'First name',
            ])
            ->add('lastname', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'label' => 'Last name'
            ])
            ->add('Address', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'label' => 'Address'
            ])
            ->add('telefon', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'label' => 'Telefon'
            ])
            ->add('role', EntityType::class, [
                'class' => \App\Entity\Role::class,
                'expanded' => true,
                'multiple' => true,
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
