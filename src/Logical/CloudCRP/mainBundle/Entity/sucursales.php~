<?php

namespace Logical\CloudCRP\mainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sucursales
 */
class sucursales
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var boolean
     */
    private $activo;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\empresas
     */
    private $empresa;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\User
     */
    private $creadoPor;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return sucursales
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return sucursales
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set empresa
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\empresas $empresa
     * @return sucursales
     */
    public function setEmpresa(\Logical\CloudCRP\mainBundle\Entity\empresas $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\empresas 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set creadoPor
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\User $creadoPor
     * @return sucursales
     */
    public function setCreadoPor(\Logical\CloudCRP\mainBundle\Entity\User $creadoPor = null)
    {
        $this->creadoPor = $creadoPor;

        return $this;
    }

    /**
     * Get creadoPor
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\User 
     */
    public function getCreadoPor()
    {
        return $this->creadoPor;
    }
}
