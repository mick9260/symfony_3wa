<?php

namespace Troiswa\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Troiswa\PublicBundle\Entity\Film;
use Troiswa\PublicBundle\Form\FilmType;

class filmController extends Controller
{
    public function filmsAction()
    {
        /*$films = [[
            'id'=>'1',
            'titre'=>'300',
            'synopsis'=>'Super film, à recommander',
            'categorie'=>'Fantastique',],
            [
                'id'=>'2',
                'titre'=>'Mme Daugtfire',
                'synopsis'=>'Une histoire déjanté comme on aime',
                'categorie'=>'humour',]
        ];*/

         $em = $this-> getDoctrine()->getManager();
        $films = $em-> getRepository('TroiswaPublicBundle:Film')->findAll();

        //die(\Doctrine\Common\Util\Debug::dump($films));
        return $this->render('TroiswaPublicBundle:film:films.html.twig', array("films"=>$films));

    }

    public function filmAction($id)
    {
        $em = $this-> getDoctrine()->getManager();
        $film = $em-> getRepository('TroiswaPublicBundle:Film')->find($id);

        //die(\Doctrine\Common\Util\Debug::dump($films));
        return $this->render('TroiswaPublicBundle:film:film.html.twig', array("film"=>$film));
    }


    public function addfilmsAction(Request $request)
    {
        $film = new Film();
        $formFilm = $this -> createForm(new FilmType(), $film)
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
            $formFilm->bind($request);*/

        /*Après*/
        $formFilm -> handleRequest($request);
        if($formFilm -> isValid())
        {

            if($formFilm ->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($film);
                $em->flush();
                $session = $request->getSession();
                $session->getFlashbag()->add('info', 'Film créé');

                return $this->redirect($this->generateUrl('troiswa_public_films'));
            }
        }

        return $this->render('TroiswaPublicBundle:film:addfilm.html.twig',array('formFilm'=>$formFilm->createView()));
    }

}
