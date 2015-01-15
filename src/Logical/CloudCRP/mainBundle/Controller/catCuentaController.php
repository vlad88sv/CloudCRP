<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class catCuentaController extends Controller
{
    private $empresa_id = 0;
       
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = array();
        $sEmpresa = $this->get('session')->get('global_empresa');
        $iEmpresa = $this->get('session')->get('global_empresa_id');
        
        $data['cuentas'] = $em->createQuery("SELECT c FROM LCCMainBundle:cuentas c WHERE c.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();        
        $data['tipos'] = $em->createQuery("SELECT ct FROM LCCMainBundle:cuentasTipo ct")->getResult();        
        $data['clases'] = $em->createQuery("SELECT cc FROM LCCMainBundle:cuentasClase cc")->getResult();        
        
        return $this->render('LCCMainBundle:catCuenta:index.html.twig', array('data' => $data, 'empresa' => $sEmpresa[0]['nombre']));
    }

    public function newAction(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $this->runSave($request);
        }
        
        $em = $this->getDoctrine()->getManager();
        $data = array();
        $sEmpresa = $this->get('session')->get('global_empresa');
        $iEmpresa = $this->get('session')->get('global_empresa_id');
        
        $data['cuentas'] = $em->createQuery("SELECT c FROM LCCMainBundle:cuentas c WHERE c.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();        
        $data['tipos'] = $em->createQuery("SELECT ct FROM LCCMainBundle:cuentasTipo ct")->getResult();        
        $data['clases'] = $em->createQuery("SELECT cc FROM LCCMainBundle:cuentasClase cc")->getResult();        

        return $this->render('LCCMainBundle:catCuenta:new.html.twig', array('data' => $data, 'empresa' => $sEmpresa[0]['nombre']));
    }
    
    public function runSave(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $p = $request->request;
        $em->createQuery("INSERT INTO LCCMainBundle:cuentas (codigo, nombre, comentario, activo, empresa, clase, tipo, creadoPor) "
                . "VALUES(:codigo, :nombre, :comentario, :activo, :empresa, :clase, :tipo, :creadoPor)")
                ->setParameter('codigo', $p->get('codigo') )
                ->setParameter('nombre', $p->get('nombre') )
                ->setParameter('comentario', $p->get('comentario') )
                ->setParameter('activo', $p->get('activo') )
                ->setParameter('empresa', $p->get('empresa') )
                ->setParameter('clase', $p->get('clase') )
                ->setParameter('tipo', $p->get('tipo') )
                ->setParameter('creadoPor', 1 );

    }
    
    public function editAction(Request $request)
    {
        return $this->render('LCCMainBundle:catCuenta:edit.html.twig');
    }
    
    public function showAction(Request $request)
    {
        return $this->render('LCCMainBundle:catCuenta:show.html.twig');
    }
}
