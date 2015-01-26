<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \Logical\CloudCRP\mainBundle\Entity\transacciones;
use \Logical\CloudCRP\mainBundle\Entity\partidas;
use \Symfony\Component\HttpFoundation\JsonResponse;
use \Symfony\Component\HttpFoundation\Response;

class reportesController extends Controller {
    
    private $data = array();

    public function mostrarAction(Request $request, $id) {
        $render = null;
        
        $this->data['fechaInicial'] = $request->get('txtFechaInicial', date('Y-m-01'));
        $this->data['fechaFinal'] = $request->get('txtFechaFinal', date('Y-m-t'));

        switch ($id) {
            case '1':
                // Libro auxiliar del mayor
                $render = $this->reporte1();
                break;
            case '2':
                // Partida de diario
                $render = $this->reporte2();
                break;
            case '3':
                 // Balance de comprobación
                $render = $this->reporte3();
                break;
            default:
                $render = $this->renderView('LCCMainBundle:reportes:indiceReportes.html.twig', array('data' => $this->data));
        }
        
        return new Response($render);
    }
    
    private function vistaHtml($aReporte) {
        
    }
    
    private function vistaPdf($aReporte) {
        
    }
    
    private function vistaXls($aReporte) {
        
    }

    // Libro auxiliar del mayor
    private function reporte1() {
        // Este reporte contiene el resumen por cada cuenta de tipo mayor
        $em = $this->getDoctrine()->getManager();

        /*
        $result = $em->createQuery('SELECT p FROM LCCMainBundle:partidas p WHERE p.sucursal IN (SELECT e.id FROM LCCMainBundle:empresas e WHERE e.id = :id_empresa ) AND p.fecha >= :fechaInicial AND p.fecha <= :fechaFinal')
                ->setParameter('id_empresa', $this->get('session')->get('global_empresa_id'))
                ->setParameter('fechaInicial',$this->data['fechaInicial'])
                ->setParameter('fechaFinal',$this->data['fechaFinal'])
                ->getResult();
        */
        
        $result = $em->createQuery('SELECT t FROM LCCMainBundle:transacciones t JOIN LCCMainBundle:partidas p WITH t.partida = p.id WHERE p.sucursal IN (SELECT e.id FROM LCCMainBundle:empresas e WHERE e.id = :id_empresa ) AND p.fecha >= :fechaInicial AND p.fecha <= :fechaFinal')
                ->setParameter('id_empresa', $this->get('session')->get('global_empresa_id'))
                ->setParameter('fechaInicial',$this->data['fechaInicial'])
                ->setParameter('fechaFinal',$this->data['fechaFinal'])
                ->getResult();
        
        return $this->renderView('LCCMainBundle:reportes:libroAuxiliarDelMayor.html.twig', array('data' => $this->data));
    }

    // Partida de diario
    private function reporte2() {
        return $this->renderView('LCCMainBundle:reportes:generico.html.twig', array('data' => $this->data));
    }

    // Balance de comprobación
    private function reporte3() {
        return $this->renderView('LCCMainBundle:reportes:generico.html.twig', array('data' => $this->data));
    }

}
