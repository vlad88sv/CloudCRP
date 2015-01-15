<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class catCuentaController extends Controller {

    private $empresa_id = 0;

    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $data = array();
        $sEmpresa = $this->get('session')->get('global_empresa');
        $iEmpresa = $this->get('session')->get('global_empresa_id');

        $data['cuentas'] = $em->createQuery("SELECT c FROM LCCMainBundle:cuentas c WHERE c.empresa = :id_empresa")->setParameter("id_empresa", $iEmpresa)->getResult();
        $data['tipos'] = $em->createQuery("SELECT ct FROM LCCMainBundle:cuentasTipo ct")->getResult();
        $data['clases'] = $em->createQuery("SELECT cc FROM LCCMainBundle:cuentasClase cc")->getResult();

        return $this->render('LCCMainBundle:catCuenta:index.html.twig', array('data' => $data, 'empresa' => $sEmpresa[0]['nombre']));
    }

    public function newAction(Request $request) {
        if ($request->isMethod('POST')) {
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

    public function runSave(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $dCatalogo = new \Logical\CloudCRP\mainBundle\Entity\cuentas();

        try {
            
            if (empty($request->request->get('txtNombreCuenta')))
            {
                throw new \Exception("Falta nombre de cuenta");
            }
            
            $dCatalogo->setClase($em->getRepository('LCCMainBundle:cuentasClase')->find($request->request->get('cmbClasficacionCuenta')));
            $dCatalogo->setActivo(true);
            $dCatalogo->setCodigo($request->request->get('txtCodigoCuenta'));
            $dCatalogo->setComentario($request->request->get('txtComentario'));
            $dCatalogo->setCreadoPor($this->get('security.context')->getToken()->getUser());
            $dCatalogo->setCuentaAgrupacion($em->getRepository('LCCMainBundle:cuentas')->find($request->request->get('cmbCuentaAgrupacion')));
            $dCatalogo->setEmpresa($em->getRepository('LCCMainBundle:empresas')->find($this->get('session')->get('global_empresa_id')));
            $dCatalogo->setNombre($request->request->get('txtNombreCuenta'));
            $dCatalogo->setTipo($em->getRepository('LCCMainBundle:cuentasTipo')->find($request->request->get('cmbTipoCuenta')));

            $em->persist($dCatalogo);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('info', 'Cuenta ingresada exitosamente');
        } catch (\Exception $e) {
            
            $this->get('session')->getFlashBag()->add('error', 'Error al ingresar nueva cuenta. ' . $e->getMessage());
        }
    }

    public function editAction(Request $request) {
        return $this->render('LCCMainBundle:catCuenta:edit.html.twig');
    }

    public function showAction(Request $request) {
        return $this->render('LCCMainBundle:catCuenta:show.html.twig');
    }

}
