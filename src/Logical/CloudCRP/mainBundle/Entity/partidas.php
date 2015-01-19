<?php

namespace Logical\CloudCRP\mainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * partidas
 */
class partidas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\cuentas
     */
    private $cuenta;


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
     * Set codigo
     *
     * @param string $codigo
     * @return partidas
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set cuenta
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\cuentas $cuenta
     * @return partidas
     */
    public function setCuenta(\Logical\CloudCRP\mainBundle\Entity\cuentas $cuenta = null)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\cuentas 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }
    /**
     * @var \DateTime
     */
    private $fecha;


    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return partidas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\sucursales
     */
    private $sucursal;


    /**
     * Set sucursal
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\sucursales $sucursal
     * @return partidas
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
     * @var \DateTime
     */
    private $actualizado;


    /**
     * Set actualizado
     *
     * @param \DateTime $actualizado
     * @return partidas
     */
    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;

        return $this;
    }

    /**
     * Get actualizado
     *
     * @return \DateTime 
     */
    public function getActualizado()
    {
        return $this->actualizado;
    }
    /**
     * @var \DateTime
     */
    private $creado;


    /**
     * Set creado
     *
     * @param \DateTime $creado
     * @return partidas
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;

        return $this;
    }

    /**
     * Get creado
     *
     * @return \DateTime 
     */
    public function getCreado()
    {
        return $this->creado;
    }
}
