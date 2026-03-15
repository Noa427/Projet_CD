<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Nom d\'utilisateur',
                'attr' => ['class' => 'w-full bg-slate-50 dark:bg-zinc-900 border border-slate-200 dark:border-zinc-800 p-3 font-mono text-sm focus:outline-none focus:border-blue-900 dark:focus:border-blue-500 transition-colors'],
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer un nom d\'utilisateur'),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'first_options'  => [
                    'label' => 'Mot de passe',
                    'attr' => ['class' => 'w-full bg-slate-50 dark:bg-zinc-900 border border-slate-200 dark:border-zinc-800 p-3 font-mono text-sm focus:outline-none focus:border-blue-900 dark:focus:border-blue-500 transition-colors'],
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                    'attr' => ['class' => 'w-full bg-slate-50 dark:bg-zinc-900 border border-slate-200 dark:border-zinc-800 p-3 font-mono text-sm focus:outline-none focus:border-blue-900 dark:focus:border-blue-500 transition-colors'],
                ],
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer un mot de passe'),
                    new Length(
                        min: 6,
                        minMessage: 'Votre mot de passe doit faire au moins {{ limit }} caractères',
                        max: 4096,
                    ),
                ],
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
