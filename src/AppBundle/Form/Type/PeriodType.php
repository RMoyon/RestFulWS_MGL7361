<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeriodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id')
            ->add('startDate', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', ['widget' => 'single_text'])
            ->add('endDate', 'Symfony\Component\Form\Extension\Core\Type\DateTimeType', ['widget' => 'single_text']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Period',
            'csrf_protection' => false,
        ]);
    }
}
