<?php
// src/Acme/ApiBundle/Entity/AuthCode.php

namespace AppBundle\Entity;

use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Model\ClientInterface;

/**
 * @ORM\Entity
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estabelecimento")
     */
    protected $estabelecimento_id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set estabelecimento_id
     *
     * @param \AppBundle\Entity\Estabelecimento $estabelecimentoId
     * @return AuthCode
     */
    public function setEstabelecimentoId(\AppBundle\Entity\Estabelecimento $estabelecimentoId)
    {
        $this->estabelecimento_id = $estabelecimentoId;

        return $this;
    }

    /**
     * Get estabelecimento_id
     *
     * @return \AppBundle\Entity\Estabelecimento 
     */
    public function getEstabelecimentoId()
    {
        return $this->estabelecimento_id;
    }

}
