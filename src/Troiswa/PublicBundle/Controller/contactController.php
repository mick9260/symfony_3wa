<?php

/*
namespace Troiswa\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class contactController extends Controller
{
    public function contactAction()
    {
        return $this->render('TroiswaPublicBundle:contact:contact.html.twig');
    }
}
*/

namespace Troiswa\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Troiswa\PublicBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;

class contactController extends Controller
{
    public function newAction(Request $request)
    {
        // crée une tâche et lui donne quelques données par défaut pour cet exemple
        $task = new Contact();
        $task->setTask('Write a blog post');

        $formContact = $this->createFormBuilder($task)
            ->add('name', 'text')
            ->add('mail', 'text')
            ->add('message', 'text')
            ->add('save', 'submit')
            ->getForm();

        return $this->render('TroiswaPublicBundle:contact:contact.html.twig', array(
            'form' => $formContact->createView(),
        ));
    }
}