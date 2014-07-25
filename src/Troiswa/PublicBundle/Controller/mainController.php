<?php

namespace Troiswa\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class mainController extends Controller
{
    public function indexAction()
    {
        return $this->render('TroiswaPublicBundle:main:index.html.twig');
    }
    public function ageAction($number)
    {
        return $this->render('TroiswaPublicBundle:main:age.html.twig',
            array('mon_age' => $number));
        }
    public function competenceAction()
    {
        $competence = array(
            'PHP'=>array('note'=> 5,'color'=>'#66CC66'),
            'CSS'=>array('note'=> 6,'color'=>'#222222'),
            'HTML'=>array('note'=> 8,'color'=>'red'),
            'JS'=>array('note'=> 4,'color'=>'yellow' ),
        );

        return $this->render('TroiswaPublicBundle:main:competence.html.twig',
            array('competence' => $competence));
    }
}

