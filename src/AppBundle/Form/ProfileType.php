<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Candidate;

class ProfileType extends AbstractType {

    protected $candidate;

    public function __construct(Candidate $candidate = null) {
        $this->candidate = $candidate;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('name', TextType::class, array(
            'data' => $this->candidate->getName(),
        ));

        $builder->add('programtype', EntityType::class, array(
            'class' => 'AppBundle:ProgramType',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('p')
                                ->where('p.enabled = 1')
                                ->orderBy('p.id', 'ASC');
            },
            'choice_label' => 'description',
            'expanded' => false,
            'multiple' => false,
            'label' => 'Choose Program Type',
            'data' => $this->candidate->getProgramtype(),
        ));

        $builder->add('programofinterest', EntityType::class, array(
            'class' => 'AppBundle:ProgramOfInterest',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('p')
                                ->where('p.enabled = 1')
                                ->orderBy('p.id', 'ASC');
            },
            'choice_label' => 'description',
            'expanded' => false,
            'multiple' => false,
            'label' => 'Choose Program of Interest',
            'data' => $this->candidate->getProgramofinterest(),
        ));

        $builder->add('desiredintake', EntityType::class, array(
            'class' => 'AppBundle:DesiredIntake',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('p')
                                ->where('p.enabled = 1')
                                ->orderBy('p.id', 'ASC');
            },
            'choice_label' => 'description',
            'expanded' => false,
            'multiple' => false,
            'label' => 'Choose Desired Intake',
            'data' => $this->candidate->getDesiredintake(),
        ));

        $builder->add('intakeyear', ChoiceType::class, array(
            'choices' => array(
                '2017' => 2017,
                '2018' => 2018,
            ),
            'expanded' => false,
            'multiple' => false,
            'label' => 'Choose Intake Year',
            'data' => $this->candidate->getIntakeyear(),
        ));

        $builder->add('save', SubmitType::class, array('label' => 'Submit'));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Candidate',
        ));
    }

}
