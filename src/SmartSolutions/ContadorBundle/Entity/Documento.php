<?php

namespace SmartSolutions\ContadorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documento
 */
class Documento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \DateTime
     */
    private $fecha;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Documento
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Documento
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
     * @return Documento
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
}
