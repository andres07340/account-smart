<?php

namespace SmartSolutions\AdmistradorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
/**
 * Users
 */
class Users implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;

    /**
     * @var string
     */
    private $numDocumento;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var integer
     */
    private $salarioBasico;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    private $password;

     /**
     * @ORM\Column(name="is_active", type="boolean")
     * @var boolean
     */
    private $isActive;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $grupo;

    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        $this->salt = md5(uniqid(time(), true));
        $this->grupo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Users
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
     * Set apellido
     *
     * @param string $apellido
     * @return Users
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set numDocumento
     *
     * @param string $numDocumento
     * @return Users
     */
    public function setNumDocumento($numDocumento)
    {
        $this->numDocumento = $numDocumento;

        return $this;
    }

    /**
     * Get numDocumento
     *
     * @return string 
     */
    public function getNumDocumento()
    {
        return $this->numDocumento;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Users
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set salarioBasico
     *
     * @param integer $salarioBasico
     * @return Users
     */
    public function setSalarioBasico($salarioBasico)
    {
        $this->salarioBasico = $salarioBasico;

        return $this;
    }

    /**
     * Get salarioBasico
     *
     * @return integer 
     */
    public function getSalarioBasico()
    {
        return $this->salarioBasico;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Users
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set contraseña
     *
     * @param string $contraseña
     * @return Users
     */
    public function setPassword($contraseña)
    {
        
        $this->password = $contraseña;
        return $this;
    }

    /**
     * Get contraseña
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array($this->grupo->getRole());
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            $this->salt
        ) = unserialize($serialized);
    }


    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Users
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
    /**
     * @var \SmartSolutions\AdmistradorBundle\Entity\Eps
     */
    private $eps;


    /**
     * Set eps
     *
     * @param \SmartSolutions\AdmistradorBundle\Entity\Eps $eps
     * @return Users
     */
    public function setEps(\SmartSolutions\AdmistradorBundle\Entity\Eps $eps = null)
    {
        $this->eps = $eps;

        return $this;
    }

    /**
     * Get eps
     *
     * @return \SmartSolutions\AdmistradorBundle\Entity\Eps 
     */
    public function getEps()
    {
        return $this->eps;
    }
    /**
     * @var \SmartSolutions\AdmistradorBundle\Entity\pension
     */
    private $pension;


    /**
     * Set pension
     *
     * @param \SmartSolutions\AdmistradorBundle\Entity\pension $pension
     * @return Users
     */
    public function setPension(\SmartSolutions\AdmistradorBundle\Entity\pension $pension = null)
    {
        $this->pension = $pension;

        return $this;
    }

    /**
     * Get pension
     *
     * @return \SmartSolutions\AdmistradorBundle\Entity\pension 
     */
    public function getPension()
    {
        return $this->pension;
    }
    
    
    /**
     * Add grupo
     *
     * @param \SmartSolutions\AdmistradorBundle\Entity\grupo $grupo
     * @return Users
     */
    public function setGrupo(\SmartSolutions\AdmistradorBundle\Entity\grupo $grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Add grupo
     *
     * @param \SmartSolutions\AdmistradorBundle\Entity\grupo $grupo
     * @return Users
     */
    public function addGrupo(\SmartSolutions\AdmistradorBundle\Entity\grupo $grupo)
    {
        $this->grupo[] = $grupo;

        return $this;
    }

    /**
     * Remove grupo
     *
     * @param \SmartSolutions\AdmistradorBundle\Entity\grupo $grupo
     */
    public function removeGrupo(\SmartSolutions\AdmistradorBundle\Entity\grupo $grupo)
    {
        $this->grupo->removeElement($grupo);
    }

    /**
     * Get grupo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }
}
