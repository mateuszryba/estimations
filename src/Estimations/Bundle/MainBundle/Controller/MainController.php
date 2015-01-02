<?php

namespace Estimations\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class MainController extends Controller
{
    public function landingAction()
    {
        return $this->render('EstimationsMainBundle:Main:landing.html.twig');
    }
}
