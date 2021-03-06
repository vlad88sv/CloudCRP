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
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var boolean
     */
    private $avtivo;

    /**
     * @var \DateTime
     */
    private $creado;

    /**
     * @var \DateTime
     */
    private $actualizado;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\sucursales
     */
    private $sucursal;


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
     * Set avtivo
     *
     * @param boolean $avtivo
     * @return partidas
     */
    public function setAvtivo($avtivo)
    {
        $this->avtivo = $avtivo;

        return $this;
    }

    /**
     * Get avtivo
     *
     * @return boolean 
     */
    public function getAvtivo()
    {
        return $this->avtivo;
    }

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
     * @var boolean
     */
    private $activo;


    /**
     * Set activo
     *
     * @param boolean $activo
     * @return partidas
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
}
