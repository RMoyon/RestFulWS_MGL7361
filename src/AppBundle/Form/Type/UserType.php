<?php
namespace AppBundle\Form\Type;

use AppBundle\Form\Type\UniversityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id')
            ->add('login')
            ->add('password')
            ->add('lastName')
            ->add('firstName')
            ->add('universities')
            ->add('interests');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\User',
            'csrf_protection' => false,
        ]);
    }
}
