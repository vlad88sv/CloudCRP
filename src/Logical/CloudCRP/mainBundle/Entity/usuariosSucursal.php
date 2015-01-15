<?php

namespace Logical\CloudCRP\mainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * usuariosSucursal
 */
class usuariosSucursal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\sucursales
     */
    private $sucursal;

    /**
     * @var \Logical\CloudCRP\mainBundle\Entity\User
     */
    private $usuario;


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
     * Set sucursal
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\sucursales $sucursal
     * @return usuariosSucursal
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
     * Set usuario
     *
     * @param \Logical\CloudCRP\mainBundle\Entity\User $usuario
     * @return usuariosSucursal
     */
    public function setUsuario(\Logical\CloudCRP\mainBundle\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Logical\CloudCRP\mainBundle\Entity\User 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
