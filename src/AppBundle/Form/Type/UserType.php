<?php
namespace AppBundle\Form\Type;

use AppBundle\Form\Type\TakeAnInterestType;
use AppBundle\Form\Type\UniversityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id')
            ->add('login')
            ->add('password')
            ->add('lastName')
            ->add('firstName')
            ->add('universities', CollectionType::class, array(
                'entry_type' => UniversityType::class,
            ))
            ->add('interests', CollectionType::class, array(
                'entry_type' => TakeAnInterestType::class,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\User',
            'csrf_protection' => false,
        ]);
    }
}
