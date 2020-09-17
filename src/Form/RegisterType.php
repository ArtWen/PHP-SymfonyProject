<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

/*
 *  klasa dodana przez Macieja Morynia
*/
class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, ['label' => 'security.register_username_label'])
            ->add('email', EmailType::class, ['label' => 'security.register_email_label'])
            ->add('password', PasswordType::class, ['label' => 'security.register_password_label'])
            ->add('confirm_password', PasswordType::class, ['label' => 'security.register_confirm_password']);
    }

}