<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \Logical\CloudCRP\mainBundle\Entity\transacciones;
use \Logical\CloudCRP\mainBundle\Entity\partidas;
use \Symfony\Component\HttpFoundation\JsonResponse;

class reportesController extends Controller {

    public function mostrarAction(Request $request) {

        return $this->render('LCCMainBundle:partida:new.html.twig', array('data' => $data));
    }
}
