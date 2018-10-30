<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('category')
            ->add('streetNumber')
            ->add('streetName')
            ->add('town')
            ->add('postalCode')
            ->add('email')
            ->add('phoneNumber')
            ->add('urlWebsite');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Information',
            'csrf_protection' => false,
        ]);
    }
}

