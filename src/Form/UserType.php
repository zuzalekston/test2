<?php
/**
 * User type.
 */

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserType
 * @package App\Form
 */
class UserType extends AbstractType
{

    /**
     * Build the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $builder->getData();

        if (!$user->getEmail()) {
            $builder->add(
                'email',
                TextType::class,
                [
                    'label' => 'label_email',
                    'required' => true,
                    'attr' => ['max_length' => 64],
                ]
            );
        }
        else {
            $builder->add(
                'email',
                TextType::class,
                [
                    'label' => 'label_email',
                    'required' => true,
                    'attr' => ['max_length' => 64,
                        'readonly'=>true],
                ]
            );
        }

        $builder->add(
            'password',
            PasswordType::class,
            [
                'label' => 'label_password',
                'required' => true,
                'attr' => ['max_length' => 64],
            ]
        );
    }

    /**
     * Configures the options for this type.
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['validation_groups' => User::class]);
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix(): string
    {
        return 'user';
    }
}
