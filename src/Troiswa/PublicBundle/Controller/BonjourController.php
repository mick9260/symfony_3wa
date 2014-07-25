<?php

namespace Troiswa\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BonjourController extends Controller
{
    public function bonjourAction()
    {
        return $this->render('TroiswaPublicBundle:Main:bonjour.html.twig');
    }
}
