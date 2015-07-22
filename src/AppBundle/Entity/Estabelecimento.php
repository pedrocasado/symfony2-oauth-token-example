<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;


/**
 * Estabelecimento
  * @ORM\Entity(repositoryClass="AppBundle\Entity\EstabelecimentoRepository")
 */
class Estabelecimento implements UserInterface, AdvancedUserInterface, \Serializable, EquatableInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

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
     * Set nome
     *
     * @param string $nome
     * @return Estabelecimento
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }
    /**
     * @var string
     */
    private $secret;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $lng;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var \DateTime
     */
    private $criado_em;


    /**
     * Set secret
     *
     * @param string $secret
     * @return Estabelecimento
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * Get secret
     *
     * @return string 
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set key
     *
     * @param string $key
     * @return Estabelecimento
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string 
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Estabelecimento
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
     * Set senha
     *
     * @param string $senha
     * @return Estabelecimento
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     * @return Estabelecimento
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string 
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set lat
     *
     * @param string $lat
     * @return Estabelecimento
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param string $lng
     * @return Estabelecimento
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return string 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Estabelecimento
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Estabelecimento
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
     * Set criado_em
     *
     * @param \DateTime $criadoEm
     * @return Estabelecimento
     */
    public function setCriadoEm($criadoEm)
    {
        $this->criado_em = $criadoEm;

        return $this;
    }

    /**
     * Get criado_em
     *
     * @return \DateTime 
     */
    public function getCriadoEm()
    {
        return $this->criado_em;
    }

    /**
     * @var boolean
     */
    private $is_active;

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Estabelecimento
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    public function getUsername()
    {
        return $this->email;
    }

    /* wont need salt coz im using bcrypt */
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->senha;
    }

    public function getRoles()
    {
        return array('ROLE_ESTABELECIMENTO');
    }

    public function eraseCredentials()
    {
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->getIsActive();
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->senha,
            $this->is_active,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->senha,
            $this->is_active,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    /**
     * @var string
     */
    private $user_secret;

    /**
     * @var string
     */
    private $user_key;


    /**
     * Set user_secret
     *
     * @param string $userSecret
     * @return Estabelecimento
     */
    public function setUserSecret($userSecret)
    {
        $this->user_secret = $userSecret;

        return $this;
    }

    /**
     * Get user_secret
     *
     * @return string 
     */
    public function getUserSecret()
    {
        return $this->user_secret;
    }

    /**
     * Set user_key
     *
     * @param string $userKey
     * @return Estabelecimento
     */
    public function setUserKey($userKey)
    {
        $this->user_key = $userKey;

        return $this;
    }

    /**
     * Get user_key
     *
     * @return string 
     */
    public function getUserKey()
    {
        return $this->user_key;
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof Estabelecimento) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->salt !== $user->getSalt()) {
            return false;
        }

        // if ($this->username !== $user->getUsername()) {
        //     return false;
        // }

        return true;
    }
}
