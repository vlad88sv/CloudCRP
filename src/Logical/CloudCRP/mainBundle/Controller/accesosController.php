<?php

namespace Logical\CloudCRP\mainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class accesosController extends Controller
{
    public function indexAction()
    {
        $data = array();
        $em = $this->getDoctrine()->getManager();
        
        $qSucursales = $em->createQuery("SELECT s FROM LCCMainBundle:sucursales s");
        $data['sucursales'] = $qSucursales->getResult();
        
        $qUsuarios = $em->createQuery("SELECT u FROM LCCMainBundle:User u");        
        $data['usuarios'] = $qUsuarios->getResult();
        
        $qPermisos = $em->createQuery("SELECT us FROM LCCMainBundle:usuariosSucursal us");
        $data['permisos'] = $qPermisos->getResult();
        
        
        return $this->render('LCCMainBundle:accesos:index.html.twig', array ('data' => $data));
    }
    
    public function saveAction(Request $request){
        
        $em = $this->getDoctrine()->getManager();
        
        $doPermiso = new \Logical\CloudCRP\mainBundle\Entity\usuariosSucursal();
        
        $doPermiso->setUsuario($em->getRepository('LCCMainBundle:User')->find($request->request->get('id_usuario')));
        $doPermiso->setSucursal($em->getRepository('LCCMainBundle:sucursales')->find($request->request->get('id_sucursal')));
        
        $em->persist($doPermiso);
        $em->flush();
        
        return new JsonResponse(array('resultado' => 'ok'));
    }
    
    
    
    public function deleteAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $doUsuarioSucursal = $em->getRepository('LCCMainBundle:usuariosSucursal')->find($request->request->get('id_permiso'));
        
        $em->remove($doUsuarioSucursal);
        
        return new JsonResponse(array('resultado' => 'ok'));
    }
}
