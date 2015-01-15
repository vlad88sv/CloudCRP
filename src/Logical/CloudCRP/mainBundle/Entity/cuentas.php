<?php

namespace Logical\CloudCRP\mainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cuentas
 */
class cuentas
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
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $comentario;

    /**
     * @var boolean
     */
    private $activo;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\cuentas
     */
    private $cuentaAgrupacion;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\empresas
     */
    private $empresa;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\cuentasClase
     */
    private $clase;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\cuentasTipo
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
     * Set codigo
     *
     * @param string $codigo
     * @return cuentas
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
     * Set nombre
     *
     * @param string $nombre
     * @return cuentas
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
     * Set comentario
     *
     * @param string $comentario
     * @return cuentas
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return cuentas
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
     * Set cuentaAgrupacion
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\cuentas $cuentaAgrupacion
     * @return cuentas
     */
    public function setCuentaAgrupacion(\Logical\CloudCRP\mainBundle\Entity\cuentas $cuentaAgrupacion = null)
    {
        $this->cuentaAgrupacion = $cuentaAgrupacion;

        return $this;
    }

    /**
     * Get cuentaAgrupacion
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\cuentas 
     */
    public function getCuentaAgrupacion()
    {
        return $this->cuentaAgrupacion;
    }

    /**
     * Set empresa
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\empresas $empresa
     * @return cuentas
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
     * Set clase
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\cuentasClase $clase
     * @return cuentas
     */
    public function setClase(\Logical\CloudCRP\mainBundle\Entity\cuentasClase $clase = null)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get clase
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\cuentasClase 
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set tipo
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\cuentasTipo $tipo
     * @return cuentas
     */
    public function setTipo(\Logical\CloudCRP\mainBundle\Entity\cuentasTipo $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\cuentasTipo 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set creadoPor
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\User $creadoPor
     * @return cuentas
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
