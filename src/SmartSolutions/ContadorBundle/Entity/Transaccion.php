<?php

namespace SmartSolutions\ContadorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaccion
 */
class Transaccion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $naturaleza;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $valor;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Transaccion
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
     * Set naturaleza
     *
     * @param string $naturaleza
     * @return Transaccion
     */
    public function setNaturaleza($naturaleza)
    {
        $this->naturaleza = $naturaleza;

        return $this;
    }

    /**
     * Get naturaleza
     *
     * @return string 
     */
    public function getNaturaleza()
    {
        return $this->naturaleza;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Transaccion
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
     * Set valor
     *
     * @param integer $valor
     * @return Transaccion
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return integer 
     */
    public function getValor()
    {
        return $this->valor;
    }
    /**
     * @var \SmartSolutions\ContadorBundle\Entity\CuentasTransacion
     */
    private $cuenta;

    /**
     * @var \SmartSolutions\ContadorBundle\Entity\Documento
     */
    private $documento;


    /**
     * Set cuenta
     *
     * @param \SmartSolutions\ContadorBundle\Entity\CuentasTransacion $cuenta
     * @return Transaccion
     */
    public function setCuenta(\SmartSolutions\ContadorBundle\Entity\CuentasTransacion $cuenta = null)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return \SmartSolutions\ContadorBundle\Entity\CuentasTransacion 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set documento
     *
     * @param \SmartSolutions\ContadorBundle\Entity\Documento $documento
     * @return Transaccion
     */
    public function setDocumento(\SmartSolutions\ContadorBundle\Entity\Documento $documento = null)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return \SmartSolutions\ContadorBundle\Entity\Documento 
     */
    public function getDocumento()
    {
        return $this->documento;
    }
}
