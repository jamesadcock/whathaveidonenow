<?php
namespace whathaveidonenow\blogBundle\Form\Type\blogType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text')
            ->add('description', 'text')
            ->add('from', 'radio')
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'post';
    }
}