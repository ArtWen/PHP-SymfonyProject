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
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
                'label' => 'edit.title'])
            ->add('summary', TextareaType::class,[
                'label' => 'edit.summary'])
            ->add('description', TextareaType::class,[
                'attr' => ['rows' => 20],
                'label' => 'edit.description'])
            ->add('imageFile', VichImageType::class, [
                'label' => 'edit.upload_image',
                'required' => false])
            ->add('projectPackage', VichFileType::class, [
                'label' => 'Upload project files:',
                'required' => false,
                'delete_label' => 'Delete?',
                'download_label' => static function (Project $project) {
                    return $project->getProjectPackageName();}
            ])
            ->add('date',DateTimeType::class,[
                'label' => 'edit.post_date'])
            ->add('Save', SubmitType::class,[
                'label' => 'edit.save'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
