<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \Logical\CloudCRP\mainBundle\Entity\transacciones;
use \Logical\CloudCRP\mainBundle\Entity\partidas;
use \Symfony\Component\HttpFoundation\JsonResponse;

class partidaController extends Controller {

    public function newAction(Request $request) {
        if ($request->isMethod('POST')) {
            return new JsonResponse($this->runSave($request));
        }

        $em = $this->getDoctrine()->getManager();
        $data = array();
        $iEmpresa = $this->get('session')->get('global_empresa_id');

        $data['cuentas'] = $em->createQuery("SELECT c FROM LCCMainBundle:cuentas c WHERE c.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();
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

    public function buscarCodigoAction() {
        $em = $this->getDoctrine()->getManager();
        $data = array();
        $iEmpresa = $this->get('session')->get('global_empresa_id');
        $data['sucursales'] = $em->createQuery("SELECT s FROM LCCMainBundle:sucursales s WHERE s.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();
        return $this->render('LCCMainBundle:partida:buscarCodigo.html.twig', array(
                    'data' => $data
        ));
    }

    public function buscarFechaAction() {
        $em = $this->getDoctrine()->getManager();
        $data = array();
        $iEmpresa = $this->get('session')->get('global_empresa_id');
        $data['sucursales'] = $em->createQuery("SELECT s FROM LCCMainBundle:sucursales s WHERE s.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();
        return $this->render('LCCMainBundle:partida:buscarFecha.html.twig', array(
                    'data' => $data
        ));
    }

    public function showAction() {
        return $this->render('LCCMainBundle:partida:show.html.twig', array(
                        // ...
        ));
    }

    private function runSave(Request $request) {        
        
        if ( !is_array($request->get('transacciones')) || !count($request->get('transacciones')) )
        {
             return array('error' => 1);
        }
        
        $em = $this->getDoctrine()->getManager();
        
        $partida = $em->getRepository('LCCMainBundle:partidas')->findOneBy(array('sucursal' => $request->get('partidaSucursal'), 'codigo' => $request->get('partidaCodigo')));
        
        if ($partida === null)
        {
            $partida = new partidas();
            $partida->setSucursal($em->getRepository('LCCMainBundle:sucursales')->find($request->get('partidaSucursal')));
            $partida->setCodigo($request->get('partidaCodigo'));
            $partida->setFecha( new \DateTime($request->get('partidaFecha')));
            $partida->setCreado( new \DateTime() );
            
        }
        $partida->setActualizado( new \DateTime());
        $em->persist($partida);       
        
        foreach($request->get('transacciones') as $transaccion){
            $docTransaccion = new transacciones();
            $docTransaccion->setPartida($partida);
            $docTransaccion->setCuenta($em->getRepository('LCCMainBundle:cuentas')->find($transaccion['cuenta_id']));
            $docTransaccion->setEliminado(false);
            $docTransaccion->setTipo($transaccion['tipo']);
            $docTransaccion->setCreadoPor($this->get('security.context')->getToken()->getUser());
            $docTransaccion->setMonto($transaccion['monto']);
            $docTransaccion->setConcepto1($transaccion['concepto1']);
            $docTransaccion->setConcepto2($transaccion['concepto2']);
            $docTransaccion->setConcepto3($transaccion['concepto3']);
            $docTransaccion->setCreado(new \DateTime());
            $em->persist($docTransaccion);
        }
        
        $em->flush();
        $em->clear();
        
        return array('error' => 0);
        
    }
}
