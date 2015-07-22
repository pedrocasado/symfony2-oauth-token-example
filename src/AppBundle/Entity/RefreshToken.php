<?php
// src/Acme/ApiBundle/Entity/RefreshToken.php

namespace AppBundle\Entity;

use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Model\ClientInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class RefreshToken extends BaseRefreshToken
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
     * @return RefreshToken
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
    
    /**
     * {@inheritdoc}
     */
    public function setUser(UserInterface $user)
    {
        // $this->user = $user;
        // var_dump($user->getId());exit;
        // our user is the estabelecimento_id because we renamed
        $this->estabelecimento_id = $user;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        return $this->estabelecimento_id;
    }

}
