<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'attr' => array('class' => 'form-control'),
                'required' => false
            ))
            ->add('description', TextareaType::class, array(
                'attr' => array('class' => 'form-control'),
                'required' => false

            ))
            ->add('price', NumberType::class, array(
                'attr' => array('class' => 'form-control'),
                'required' => false
            ))
            ->add('available', CheckboxType::class, array(
                'required' => false
            ))
            ->add('category', EntityType::class, array(
                        'class' => 'Ecommerce\EcommerceBundle\Entity\Categories',
                        'choice_label' => 'nom',
                        'multiple' => false,
                        'attr' => array('class' => 'form-control'),
                        'mapped' => true
            ))
            ->add('image', MediaType::class)
            ->add('tva', EntityType::class, array(
                'class' => 'Ecommerce\EcommerceBundle\Entity\Tva',
                'attr' => array('class' => 'form-control'),
                'mapped' => true
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ecommerce\EcommerceBundle\Entity\Products'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ecommerce_ecommercebundle_products';
    }


}
