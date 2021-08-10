<?php

namespace App\Form;

use App\Entity\Word;
use App\Entity\Language;
use App\Repository\LanguageRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class WordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $formOptions = [
            'class' => Language::class,
            'choice_label' => 'name',
        ];

        $builder
            ->add('value')
            ->add('translation')
            ->add('language_id', EntityType::class, [
                'class' => Language::class,
                'choice_label' => 'name',
                'label' => 'Choisissez une langue'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Word::class,
        ]);
    }
}
