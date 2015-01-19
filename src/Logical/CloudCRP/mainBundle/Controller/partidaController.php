<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \Logical\CloudCRP\mainBundle\Entity\transacciones;
use \Logical\CloudCRP\mainBundle\Entity\partidas;

class partidaController extends Controller {

    public function newAction(Request $request) {
        if ($request->isMethod('POST')) {
            $this->runSave($request);
        }

        $em = $this->getDoctrine()->getManager();
        $data = array();
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

    public function buscarCodigoAction() {
        $em = $this->getDoctrine()->getManager();
        $data = array();
        $iEmpresa = $this->get('session')->get('global_empresa_id');
        $data['sucursales'] = $em->createQuery("SELECT s FROM LCCMainBundle:sucursales s WHERE s.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();
        return $this->render('LCCMainBundle:partida:buscarCodigo.html.twig', array(
                    'data' => $data
        ));
    }

    public function showAction() {
        return $this->render('LCCMainBundle:partida:show.html.twig', array(
                        // ...
        ));
    }

    private function runSave(Request $request) {
        $em = $this->getDoctrine()->getManager();
        
        $partida = $em->getRepository('LCCMainBundle:partidas')->find($request->get('partidaCodigo'));
        
        if ($partida === null)
        {
            $partida = new partidas();
        }
        
        $partida->setSucursal($em->getRepository('LCCMainBundle:sucursales')->find($request->get('partidaSucursal')));
        $partida->setCodigo($request->get('partidaCodigo'));
        $partida->setFecha($request->get('partidaFecha'));
        $em->persist($partida);
        
        $docTransaccion = new transacciones();
        foreach($request->get('transacciones') as $transaccion){
            $docTransaccion->setCuenta($em->getRepository('LCCMainBundle:cuentas')->find($transaccion[0]['cuenta_id']));
            $docTransaccion->setTipo($em->getRepository('LCCMainBundle:cuentasTipo')->find($transaccion[0]['tipo']));
            $docTransaccion->setCreadoPor($this->get('security.context')->getToken()->getUser());
            $docTransaccion->setMonto($transaccion[0]['monto']);
            $docTransaccion->setConcepto1($transaccion[0]['concepto1']);
            $docTransaccion->setConcepto2($transaccion[0]['concepto2']);
            $docTransaccion->setConcepto3($transaccion[0]['concepto3']);
            $em->persist($docTransaccion);
        }
        
        $em->flush();
        
    }
}
