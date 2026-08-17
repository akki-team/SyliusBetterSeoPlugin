<?php

declare(strict_types=1);

namespace JoppeDc\SyliusBetterSeoPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class SeoTranslationType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('pageTitle', TextType::class, [
            'empty_data' => '',
            'label' => 'app.ui.page_title',
            'required' => false,
        ]);

        $builder->add('ogTitle', TextType::class, [
            'empty_data' => '',
            'label' => 'app.ui.og_title',
            'required' => false,
        ]);

        $builder->add('ogDescription', TextareaType::class, [
            'empty_data' => '',
            'label' => 'app.ui.og_description',
            'required' => false,
        ]);

        $builder->add('twitterTitle', TextType::class, [
            'empty_data' => '',
            'label' => 'app.ui.twitter_title',
            'required' => false,
        ]);

        $builder->add('twitterDescription', TextareaType::class, [
            'empty_data' => '',
            'label' => 'app.ui.twitter_description',
            'required' => false,
        ]);

        $builder->add('twitterSite', TextType::class, [
            'empty_data' => '',
            'label' => 'app.ui.twitter_site',
            'required' => false,
        ]);

        $builder->add('extraTags', TextareaType::class, [
            'label' => 'app.ui.extra_tags',
            'required' => false,
            'constraints' => new Assert\Length([
                'max' => 255,
                'maxMessage' => 'Les extra-tags ne doivent pas dépasser {{ limit }} caractères.',
            ], groups: ['sylius']),
        ]);

        $builder->add('image', SeoImageType::class, [
            'label' => false,
            'required' => false,
        ]);

        $builder->add('robots', TextType::class, [
            'required' => false,
            'label' => 'app.ui.robots'
        ]);

        $builder->add('canonical', TextType::class, [
            'required' => false,
            'label' => 'app.ui.canonical'
        ]);

        $builder->add('metaDescription', TextType::class, [
            'label' => 'app.ui.meta_description_label',
            'help' => 'app.ui.meta_description_help',
            'required' => false,
            'constraints' => new Assert\Length([
                'max' => 2048,
                'maxMessage' => 'La méta description ne doit pas dépasser {{ limit }} caractères.',
            ], groups: ['sylius']),
        ]);

    }

    public function getBlockPrefix(): string
    {
        return 'joppedc_seo_translation';
    }
}
