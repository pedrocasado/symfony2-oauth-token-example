<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAware;
use AppBundle\Entity\Estabelecimento;

class LoadUserData extends ContainerAware implements FixtureInterface
{
     /**
     * @var ContainerAware
     */
    protected $container;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $Estabelecimento = new Estabelecimento();
        $Estabelecimento->setUserSecret('admin');
        $Estabelecimento->setUserKey('a');
        $Estabelecimento->setNome('a');
        $Estabelecimento->setEmail('admin');

        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($Estabelecimento)
        ;
        $Estabelecimento->setSenha($encoder->encodePassword('secret', $Estabelecimento->getSalt()));

        // $Estabelecimento->setSenha('test');
        $Estabelecimento->setCidade('a');
        $Estabelecimento->setLat(11);
        $Estabelecimento->setLng(12);
        $Estabelecimento->setIsActive(true);


        $manager->persist($Estabelecimento);
        $manager->flush();
    }
}