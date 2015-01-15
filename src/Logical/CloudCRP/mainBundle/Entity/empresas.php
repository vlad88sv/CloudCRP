<?php

namespace Logical\CloudCRP\mainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * empresas
 */
class empresas
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
     * @var string
     */
    private $razonSocial;

    /**
     * @var string
     */
    private $registroIva;

    /**
     * @var string
     */
    private $nit;

    /**
     * @var string
     */
    private $direccion1;

    /**
     * @var string
     */
    private $direccion2;

    /**
     * @var boolean
     */
    private $activo;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\empresasTipo
     */
    private $tipo;

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
     * @return empresas
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
     * Set razonSocial
     *
     * @param string $razonSocial
     * @return empresas
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set registroIva
     *
     * @param string $registroIva
     * @return empresas
     */
    public function setRegistroIva($registroIva)
    {
        $this->registroIva = $registroIva;

        return $this;
    }

    /**
     * Get registroIva
     *
     * @return string 
     */
    public function getRegistroIva()
    {
        return $this->registroIva;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return empresas
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set direccion1
     *
     * @param string $direccion1
     * @return empresas
     */
    public function setDireccion1($direccion1)
    {
        $this->direccion1 = $direccion1;

        return $this;
    }

    /**
     * Get direccion1
     *
     * @return string 
     */
    public function getDireccion1()
    {
        return $this->direccion1;
    }

    /**
     * Set direccion2
     *
     * @param string $direccion2
     * @return empresas
     */
    public function setDireccion2($direccion2)
    {
        $this->direccion2 = $direccion2;

        return $this;
    }

    /**
     * Get direccion2
     *
     * @return string 
     */
    public function getDireccion2()
    {
        return $this->direccion2;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return empresas
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
     * Set tipo
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\empresasTipo $tipo
     * @return empresas
     */
    public function setTipo(\Logical\CloudCRP\mainBundle\Entity\empresasTipo $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\empresasTipo 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set creadoPor
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\User $creadoPor
     * @return empresas
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
