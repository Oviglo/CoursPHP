<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Ajout des champs dans le formulaire
        $builder
            ->add('title')
            ->add('content')
            ->add('published')
            // Ajout du submit
            ->add('save', SubmitType::class)
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
