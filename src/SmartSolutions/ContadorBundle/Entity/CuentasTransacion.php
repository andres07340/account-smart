<?php

namespace SmartSolutions\ContadorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CuentasTransacion
 */
class CuentasTransacion
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
    private $descripcion;

    /**
     * @var string
     */
    private $tipo;


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
     * @return CuentasTransacion
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return CuentasTransacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return CuentasTransacion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $transaciones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add transaciones
     *
     * @param \SmartSolutions\ContadorBundle\Entity\transaciones $transaciones
     * @return CuentasTransacion
     */
    public function addTransacione(\SmartSolutions\ContadorBundle\Entity\transaciones $transaciones)
    {
        $this->transaciones[] = $transaciones;

        return $this;
    }

    /**
     * Remove transaciones
     *
     * @param \SmartSolutions\ContadorBundle\Entity\transaciones $transaciones
     */
    public function removeTransacione(\SmartSolutions\ContadorBundle\Entity\transaciones $transaciones)
    {
        $this->transaciones->removeElement($transaciones);
    }

    /**
     * Get transaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransaciones()
    {
        return $this->transaciones;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $transacion;


    /**
     * Add transacion
     *
     * @param \SmartSolutions\ContadorBundle\Entity\Transaccion $transacion
     * @return CuentasTransacion
     */
    public function addTransacion(\SmartSolutions\ContadorBundle\Entity\Transaccion $transacion)
    {
        $this->transacion[] = $transacion;

        return $this;
    }

    /**
     * Remove transacion
     *
     * @param \SmartSolutions\ContadorBundle\Entity\Transaccion $transacion
     */
    public function removeTransacion(\SmartSolutions\ContadorBundle\Entity\Transaccion $transacion)
    {
        $this->transacion->removeElement($transacion);
    }

    /**
     * Get transacion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransacion()
    {
        return $this->transacion;
    }
}
