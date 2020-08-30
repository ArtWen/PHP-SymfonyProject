<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
/*
 * wygenerowane komendą php bin/console make:form
*/
class ProjectSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('search_query',TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Search'])
            ->add('search_button', SubmitType::class, array(
                'label' => 'Search',
                'attr' => array('class' => '')));
        ;
    }
}
