<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = array();
        
        $qPermisos = $em->createQuery("SELECT e FROM LCCMainBundle:empresas e LEFT JOIN LCCMainBundle:sucursales s WHERE e.id = s.empresa AND s.id IN (SELECT us FROM LCCMainBundle:usuariosSucursal us WHERE us.usuario = 1) GROUP BY e") ;
        $data['empresas'] = $qPermisos->getResult();
        
        return $this->render('LCCMainBundle:Default:index.html.twig', array('data' => $data));
    }
    
    public function cambioEmpresaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $this->get('session')->set('global_empresa_id', $request->request->get('id_empresa'));
        $this->get('session')->set('global_empresa', $em->createQuery("SELECT CONCAT(e.razonSocial, ' ( ' , e.nombre, ' )') AS nombre FROM LCCMainBundle:empresas e WHERE e.id = :id")->setParameter('id',  $request->request->get('id_empresa'))->getScalarResult());
        
        $request->getSession()->getFlashBag()->add(
            'notice',
            'Se han guardado los cambios.'
        );
 
        return $this->redirect($this->generateUrl("lcc_main_homepage"));
    }
}
