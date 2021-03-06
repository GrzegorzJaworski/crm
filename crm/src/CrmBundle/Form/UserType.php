<?php

namespace CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
                ->add('username', null, ['label'=>'Imię i Nazwisko'])
                ->add('email')
                ->add('phone', null, ['label'=>'Telefon'])
                ->add('plainPassword', 'password', ['label'=>'haslo'])
                ->add('roles', 'choice', ['label'=>'Typ', 'choices' => ['ROLE_ADMIN' => 'Administrator', 'ROLE_EMPLOYEE' => 'Pracownik', 'ROLE_CUSTOMER' => 'Klient'],
            'expanded' => true,
            'multiple' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CrmBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'crmbundle_user';
    }

}
