<?php

namespace Troiswa\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Troiswa\PublicBundle\Entity\Acteur;
use Symfony\Component\HttpFoundation\Request;
use Troiswa\PublicBundle\Form\ActeurType;

class acteurController extends Controller
{
    public function acteursAction()
    {

        $em = $this-> getDoctrine()->getManager();
        $acteurs = $em-> getRepository('TroiswaPublicBundle:Acteur')->findAll();

        //die(\Doctrine\Common\Util\Debug::dump($acteurs));
        return $this->render('TroiswaPublicBundle:acteur:acteurs.html.twig', array("acteurs"=>$acteurs));
    }

    public function acteurAction($id)
    {

        $em = $this-> getDoctrine()->getManager();
        $acteur = $em-> getRepository('TroiswaPublicBundle:Acteur')->find($id);

        //die(\Doctrine\Common\Util\Debug::dump($films));
        return $this->render('TroiswaPublicBundle:acteur:acteur.html.twig', array("acteur"=>$acteur));
    }

    public function addActeurAction(Request $request)
    {
        $acteur = new Acteur();
        $formActeur = $this -> createForm(new ActeurType(), $acteur)
                           /* -> add('prenom', 'text', array('required'=>false))
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
                            -> add('nationalite')*/
                            -> add('ajouter', 'submit');
        /*Avant
        if("POST" === $request->getMethod())
        {
            //die('Post');
            $formActeur->bind($request);*/

        /*Après*/
        $formActeur -> handleRequest($request);
        if($formActeur -> isValid())
        {

            if($formActeur ->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($acteur);
                $em->flush();
                $session = $request->getSession();
                $session->getFlashbag()->add('info', 'Acteur créé');

                return $this->redirect($this->generateUrl('troiswa_public_acteurs'));
            }
        }


        return $this->render('TroiswaPublicBundle:acteur:addacteur.html.twig',array('formActeur'=>$formActeur->createView()));
    }
    public function updateacteurAction($id, Request $request)
    {
        $em = $this-> getDoctrine()->getManager();
        $updateacteur = $em-> getRepository('TroiswaPublicBundle:Acteur')->find($id);

        $formActeur = $this -> createFormBuilder($updateacteur)
                            -> add('prenom', 'text')
                            -> add('nom')
                            -> add('datenaissance')
                            -> add('biographie')
                            -> add('sexe')
                            -> add('nationalite')
                            -> add('ajouter', 'submit')
                            -> getForm();


        if("POST" === $request->getMethod())
        {
            //die('Post');
            $formActeur->bind($request);
            if($formActeur ->isValid())
            {
                //$em=$this->getDoctrine()->getManager();
                $em->persist($updateacteur);
                #nouvel objet arrivé (il le surveille);
                $em->flush();
                $session = $request->getSession();
                $session->getFlashbag()->add('info', 'Acteur modifié');
            }

        }

        return $this->render('TroiswaPublicBundle:acteur:updateacteur.html.twig',array('formActeur'=>$formActeur->createView()));
    }
}