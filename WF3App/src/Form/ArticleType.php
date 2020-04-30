<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        // Indique due ce formulaire permet de modifier des objets Article
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
