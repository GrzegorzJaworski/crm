<?php

namespace CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserEditType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('username', null, ['label'=>'Imię i Nazwisko'])
                ->add('email')
                ->add('phone', null, ['label'=>'Telefon'])
                ->add('alarmPhone', null, ['label'=>'Telefon awaryjny'])
                ->add('address', null, ['label'=>'Adres'])
                ->add('description', null, ['label'=>'Informacje dodatkowe']);
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
