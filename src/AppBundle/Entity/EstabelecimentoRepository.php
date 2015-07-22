<?php
namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;

class EstabelecimentoRepository extends EntityRepository
{
	// public function findAllOrderedByName()
 //    {
 //        return $this->getEntityManager()
 //            ->createQuery(
 //                'SELECT p FROM AppBundle:Product p ORDER BY p.name ASC'
 //            )
 //            ->getResult();
 //    }
}