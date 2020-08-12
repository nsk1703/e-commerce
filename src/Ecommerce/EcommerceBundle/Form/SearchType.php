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
                    'attr' =>array('class' => 'input-medium search-query',
                                   'placeholder' => 'search your product')
                ))
                ->add('Search', SubmitType::class, array(
                    'attr' => array('class' => 'btn btn-primary')
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
