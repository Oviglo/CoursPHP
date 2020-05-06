<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Image;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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

            /*->add('image', EntityType::class, [
                'class' => Image::class,
                // 'choice_label' => 'name'
            ])*/
            // Inclus le formulaire d'image dans le formulaire article
            ->add('image', ImageType::class, ['label' => false])

            ->add('deleteImage', CheckboxType::class, [
                'label' => 'article.delete_image',
                'required' => false, // Pas obligatoire
            ])

            ->add('categories', EntityType::class, [
                'label' => 'article.categories',
                'class' => Category::class,
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (EntityRepository $er) {
                    // Modifie la requête d'affichage de la liste des catégories
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'asc')
                    ;
                },
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
