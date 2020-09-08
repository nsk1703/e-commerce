<?php

namespace Users\UsersBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersAddressType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nom', TextType::class, array(
                    'attr' => array('class' => 'form-control',
                                    'placeholder' => 'Last Name')
                ))
                ->add('prenom', TextType::class, array(
                    'attr' => array('class' => 'form-control',
                                    'placeholder' => 'First Name')
                ))
                ->add('telephone', TelType::class, array(
                    'attr' => array('class' => 'form-control',
                                    'placeholder' => 'phone number')
                ))
                ->add('addresse', TextType::class, array(
                    'attr' => array('class' => 'form-control',
                                    'placeholder' => 'Address')
                ))
                ->add('cp', TextType::class, array(
                    'attr' => array('class' => 'form-control',
                                    'placeholder' => 'Postal Code')
                ))
                ->add('pays', TextType::class, array(
                    'attr' => array('class' => 'form-control',
                                    'placeholder' => 'Country')
                ))
                ->add('ville', TextType::class, array(
                    'attr' => array('class' => 'form-control',
                                    'placeholder' => 'city')
                ))
                ->add('complement', null, array(
                    'attr'=> array('class' => 'form-control',
                                    'placeholder' => 'Complement'),
                    'required' => false

                ))
                ->add('Ajouter', SubmitType::class, array(
                    'attr' => array('class' => 'btn btn-primary mt-3')
                ));
//                ->add('users');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Users\UsersBundle\Entity\UsersAddress'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'users_usersbundle_usersaddress';
    }


}
