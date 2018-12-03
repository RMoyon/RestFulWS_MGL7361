<?php
namespace AppBundle\Form\Type;

use AppBundle\Form\Type\GreatDealType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TakeAnInterestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id')
            ->add('typeOfInterest')
            ->add('greatDeals', GreatDealType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\TakeAnInterest',
            'csrf_protection' => false,
        ]);
    }
}
