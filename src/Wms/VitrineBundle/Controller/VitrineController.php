<?php

namespace Wms\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VitrineController extends Controller
{
    public function indexAction()
    {
        return $this->render('WmsVitrineBundle::index.html.twig');
    }

}
