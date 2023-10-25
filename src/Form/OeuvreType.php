<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Repository\OeuvreRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('description_o')
            ->add('artiste')
            ->add('coordonee_lat')
            ->add('coordonee_lon')
            ->add('photo')
            ->add('alt_img')
            ->add('adresse')
            ->add('credit')
            // ->add('rela_cat', ChoiceType::class, []);
            // ->add('rela_oeuvre')
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
        ]);
    }
}
