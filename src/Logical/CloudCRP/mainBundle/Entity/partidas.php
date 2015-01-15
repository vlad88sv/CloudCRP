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
}