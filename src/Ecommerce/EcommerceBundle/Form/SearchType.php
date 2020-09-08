<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction($options['action'])
                ->add('search', TextType::class, array(
                    'attr' => array('class' => 'form-control',
                                   'placeholder' => 'search your product',
                                    'type' => 'text',
                                    'aria-label' => 'Search')
                ))
                ->add('Search', SubmitType::class, array(
                    'attr' => array('class' => 'btn btn-success mr-5 my-sm-0')
                ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ecommerce_ecommercebundle_search';
    }

}
