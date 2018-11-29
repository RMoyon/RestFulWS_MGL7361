<?php
namespace AppBundle\Form\Type;

use AppBundle\Form\Type\PeriodType;
use AppBundle\Form\Type\TagType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GreatDealType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id')
            ->add('typeOfGreatDeal')
            ->add('name')
            ->add('description')
            ->add('tags', CollectionType::class, array(
                'entry_type' => TagType::class,
            ))
            ->add('periods', CollectionType::class, array(
                'entry_type' => PeriodType::class,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\GreatDeal',
            'csrf_protection' => false,
        ]);
    }
}
