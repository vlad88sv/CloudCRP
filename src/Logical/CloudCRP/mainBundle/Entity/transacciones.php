<?php

namespace Logical\CloudCRP\mainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * transacciones
 */
class transacciones
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $concepto1;

    /**
     * @var string
     */
    private $concepto2;

    /**
     * @var string
     */
    private $concepto3;

    /**
     * @var string
     */
    private $monto;

    /**
     * @var boolean
     */
    private $tipo;

    /**
     * @var boolean
     */
    private $eliminado;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\partidas
     */
    private $partida;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\sucursales
     */
    private $sucursal;

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
     * Set concepto1
     *
     * @param string $concepto1
     * @return transacciones
     */
    public function setConcepto1($concepto1)
    {
        $this->concepto1 = $concepto1;

        return $this;
    }

    /**
     * Get concepto1
     *
     * @return string 
     */
    public function getConcepto1()
    {
        return $this->concepto1;
    }

    /**
     * Set concepto2
     *
     * @param string $concepto2
     * @return transacciones
     */
    public function setConcepto2($concepto2)
    {
        $this->concepto2 = $concepto2;

        return $this;
    }

    /**
     * Get concepto2
     *
     * @return string 
     */
    public function getConcepto2()
    {
        return $this->concepto2;
    }

    /**
     * Set concepto3
     *
     * @param string $concepto3
     * @return transacciones
     */
    public function setConcepto3($concepto3)
    {
        $this->concepto3 = $concepto3;

        return $this;
    }

    /**
     * Get concepto3
     *
     * @return string 
     */
    public function getConcepto3()
    {
        return $this->concepto3;
    }

    /**
     * Set monto
     *
     * @param string $monto
     * @return transacciones
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set tipo
     *
     * @param boolean $tipo
     * @return transacciones
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return boolean 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set eliminado
     *
     * @param boolean $eliminado
     * @return transacciones
     */
    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;

        return $this;
    }

    /**
     * Get eliminado
     *
     * @return boolean 
     */
    public function getEliminado()
    {
        return $this->eliminado;
    }

    /**
     * Set partida
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\partidas $partida
     * @return transacciones
     */
    public function setPartida(\Logical\CloudCRP\mainBundle\Entity\partidas $partida = null)
    {
        $this->partida = $partida;

        return $this;
    }

    /**
     * Get partida
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\partidas 
     */
    public function getPartida()
    {
        return $this->partida;
    }

    /**
     * Set sucursal
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\sucursales $sucursal
     * @return transacciones
     */
    public function setSucursal(\Logical\CloudCRP\mainBundle\Entity\sucursales $sucursal = null)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\sucursales 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set creadoPor
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\User $creadoPor
     * @return transacciones
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
