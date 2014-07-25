<?php

namespace Troiswa\PublicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActeurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
               -> add('prenom', 'text', array('required'=>false))
               -> add('nom', 'text', array('required'=>false))
               -> add('datenaissance','date', array(
                   'widget' => 'single_text',))
               -> add('biographie','text', array('required'=>false))
               -> add('sexe', 'choice', array(
                   'choices'   => array(
                       'm' => 'Masculin',
                       'f' => 'Féminin'),
                   'data'=> 'm',
                   'expanded'  => true))
               -> add('nationalite')
               ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Troiswa\PublicBundle\Entity\Acteur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'troiswa_publicbundle_acteur';
    }
}
