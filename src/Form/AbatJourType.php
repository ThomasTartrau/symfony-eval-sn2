<?php

namespace App\Form;

use App\Entity\AbatJour;
use App\Entity\Marque;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbatJourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre')
            ->add('Description')
            ->add('Couleur')
            ->add('Matiere')
            ->add('Forme')
            ->add('Dimensions')
            ->add('CodeBarre')
            ->add('Marque', EntityType::class, [
                'class' => Marque::class,
                'choice_label' => 'Nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AbatJour::class,
        ]);
    }
}
