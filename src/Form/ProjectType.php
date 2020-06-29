<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/*  wygenerowane komendą php bin/console make:form
 *  dla klasy Project
*/
class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //forma stworzona przez Artur Wenda
        $builder
            ->add('title',TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Title'])
            ->add('summary', TextareaType::class,[
                'label' => 'Summary'])
            ->add('description', TextareaType::class,[
                'attr' => ['rows' => 20],
                'label' => 'Description'])
            ->add('date',DateTimeType::class,[
                'label' => 'Post date'])
            ->add('Save', SubmitType::class,[
                'label' => 'Save'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
