<?php

namespace App\Bundle\MainBundle\Form\Type\Submission;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Add submission form type
 */
class AddType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('url', 'text', [
                'label' => 'The gfycat URL',
                'attr' => [
                    'placeholder' => 'http://gfycat.com/UnsteadyLastingAmericanwigeon',
                ],
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Bundle\MainBundle\Form\Model\Submission\Add',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'submission_add';
    }
}
