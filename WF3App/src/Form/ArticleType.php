<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Ajout des champs dans le formulaire
        $builder
            ->add('title', null, [
                'label' => 'article.title',
                'attr' => ['placeholder' => 'article.title'],
            ])
            ->add('content', null, [
                'label' => 'article.content',
            ])
            ->add('published', null, [
                'label' => 'article.published',
            ])
            ->add('difficulty', ChoiceType::class, [
                'label' => 'article.difficulty',
                'help' => 'article.difficulty_help', // Sf 4.1
                'expanded' => true,
                'choices' => [
                    'article.easy' => 0,
                    'article.normal' => 1,
                    'article.hard' => 2,
                ],
            ])
            // Ajout du submit
            ->add('save', SubmitType::class, ['label' => 'save'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // Indique due ce formulaire permet de modifier des objets Article
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
