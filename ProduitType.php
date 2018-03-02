<?php

namespace Sante\UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
             ->add('libelle', \Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
            'attr'=> array(
                'placeholder' => 'libelle',

            )
        ))

             ->add('file'
                 ,\Symfony\Component\Form\Extension\Core\Type\FileType::class,array(
                     'attr'=> array(


                     )
                 ))
             ->add('description', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class,array(
                'attr'=> array(
                    'placeholder' => 'Descrption',

                )
            ))
            ->add('prix',\Symfony\Component\Form\Extension\Core\Type\NumberType::class,array(
                'attr'=> array(
                    'placeholder' => 'prix',

                )
            ))
            ->add('remise',\Symfony\Component\Form\Extension\Core\Type\NumberType::class,array(
                'attr'=> array(
                    'placeholder' => 'remise',

                )
            ))
            ->add('quantiteDispo',\Symfony\Component\Form\Extension\Core\Type\NumberType::class,array(
                'attr'=> array(
                    'placeholder' => 'quantiteDispo',

                )
            ))
            ->add('prixLivraison',\Symfony\Component\Form\Extension\Core\Type\NumberType::class,array(
                'attr'=> array(
                    'placeholder' => 'prixLivraison',

                )
            ))
            ->add('marque',\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'attr'=> array(
                    'placeholder' => 'marque',

                )
            ))
             ->add('categorie', EntityType::class, array(
                 'class'=>'SanteUserBundle:Categorie',
                 'choice_label' => 'libelle',
                 'multiple' => false,
             ))


            ->add('dateFabrication',\Symfony\Component\Form\Extension\Core\Type\DateType::class,array(
                'attr'=> array(
                    'placeholder' => 'dateFabrication',

                )
            ))

            ->add('Save', SubmitType::class , array(
                'attr' => array(

                    'class'=>'btn btn-success'
                )));;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sante\UserBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sante_userbundle_produit';
    }


}
