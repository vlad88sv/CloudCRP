<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class partidaController extends Controller {

    public function newAction() {
        $em = $this->getDoctrine()->getManager();
        $data = array();
        $sEmpresa = $this->get('session')->get('global_empresa');
        $iEmpresa = $this->get('session')->get('global_empresa_id');
        
        $data['cuentas'] = $em->createQuery("SELECT c FROM LCCMainBundle:cuentas c WHERE c.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();        
        $data['tipos'] = $em->createQuery("SELECT ct FROM LCCMainBundle:cuentasTipo ct")->getResult();        
        $data['clases'] = $em->createQuery("SELECT cc FROM LCCMainBundle:cuentasClase cc")->getResult();        
        $data['sucursales'] = $em->createQuery("SELECT s FROM LCCMainBundle:sucursales s WHERE s.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();        
        
        //$ultimoNoPartida = $em->createQuery("SELECT p.codigo FROM LCCMainBundle:partidas p ORDER BY p.codigo DESC")->getSingleScalarResult();
        
        return $this->render('LCCMainBundle:partida:new.html.twig', array('data' => $data));
    }

    public function editAction() {
        return $this->render('LCCMainBundle:partida:edit.html.twig', array(
                        // ...
        ));
    }

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $data = array();
        $iEmpresa = $this->get('session')->get('global_empresa_id');
        $data['sucursales'] = $em->createQuery("SELECT s FROM LCCMainBundle:sucursales s WHERE s.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();        
        return $this->render('LCCMainBundle:partida:index.html.twig', array(
            'data' => $data
        ));
    }
    
    public function showAction() {
        return $this->render('LCCMainBundle:partida:show.html.twig', array(
                        // ...
        ));
    }

}
