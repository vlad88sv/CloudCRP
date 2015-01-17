<?php

namespace Logical\CloudCRP\mainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class layoutController extends Controller
{
    public function mostrarNombreEmpresaAction(Request $request) {
        $sEmpresa = $this->get('session')->get('global_empresa');
        
        return new \Symfony\Component\HttpFoundation\Response(@$sEmpresa[0]['nombre'] ?: 'Ninguna empresa seleccionada.');
    }
}