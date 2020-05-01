<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType {

    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class) {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('username', null, array('label' => 'Nom Utlisateur', 'translation_domain' => 'FOSUserBundle', "attr" => array("class" => 'form-control input--withBorder ct-u-marginBottom10 input-focusMotive')))
                ->add('email', 'email', array('label' => 'Email', 'translation_domain' => 'FOSUserBundle', "attr" => array("class" => 'form-control input--withBorder ct-u-marginBottom10 input-focusMotive')))
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'Mot de passe'),
                    'second_options' => array('label' => 'Confirmation mot de passe'),
                    
                    'invalid_message' => 'fos_user.password.mismatch',
                    'attr' => array("class" => 'form-control input--withBorder ct-u-marginBottom10 input-focusMotive'),
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'registration',
        ));
    }

    public function getName() {
        return 'fos_user_registration';
    }

}