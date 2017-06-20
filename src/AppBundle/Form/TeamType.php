<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// import de la classe EntityType qui permet de générer un menu de sélection en l'alimentant à partir d'une classe (en l'occurence la classe Country)
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class TeamType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('anneeCreation')
            ->add('entraineur')
            ->add('couleurs');

        // ajout d'un menu de sélection pour les pays
        // (à découvrir seul comme un grand: méthod statique/de classe en POO => EntityType::class)
        $builder
            ->add('country', EntityType::class, array(
                'class' => 'AppBundle:Country',
                'choice_label' => 'nom'
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Team'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_team';
    }


}
