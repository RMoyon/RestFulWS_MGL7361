<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('category')
            ->add('name')
            ->add('streetNumber')
            ->add('streetName')
            ->add('town')
            ->add('postalCode')
            ->add('latitude')
            ->add('longitude')
            ->add('email')
            ->add('phoneNumber')
            ->add('urlWebsite');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Place',
            'csrf_protection' => false,
        ]);
    }
}
