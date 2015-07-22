<?php
  // src/Acme/DemoBundle/Provider/UserProvider.php

  namespace AppBundle\Provider;

  use Symfony\Component\Security\Core\User\UserInterface;
  use Symfony\Component\Security\Core\User\UserProviderInterface;
  use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
  use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
  use Doctrine\Common\Persistence\ObjectRepository;
  use Doctrine\ORM\NoResultException;
  use AppBundle\Entity\Estabelecimento;
  use AppBundle\Entity\EstabelecimentoRepository;
  use Doctrine\ORM\EntityManager;
  use Doctrine\ORM\EntityRepository;

  class EstabelecimentoProvider extends EntityRepository implements UserProviderInterface
  {
      protected $repo;

      public function __construct(EntityRepository $repo)
      {
        $this->repo = $repo;
      }

      public function loadUserByUsername($email)
      {
            $q = $this->repo
              ->createQueryBuilder('u')
              ->where('u.email = :email')
              ->setParameter('email', $email)
              ->getQuery();

            try {
                $Estabelecimento = $q->getSingleResult();
                // var_dump($Estabelecimento->getEstabelecimentoId());exit;
            } catch (NoResultException $e) {
                $message = sprintf(
                    'Unable to find an active admin AppBundle:Estabelecimento object identified by "%s".',
                    $email
                );
                throw new UsernameNotFoundException($message, 0, $e);
            }

          return $Estabelecimento;

          // $Estabelecimento = new Estabelecimento('admin', 'secret', null, array('ROLE_ESTABELECIMENTO'));
          // var_dump($Estabelecimento);exit;
      }

      public function refreshUser(UserInterface $user)
      {
          if (!$user instanceof Estabelecimento) {
              throw new UnsupportedUserException(
                  sprintf('Instances of "%s" are not supported.', get_class($user))
              );
          }

          return $this->loadUserByUsername($user->getUsername());
      }

      public function supportsClass($class)
      {
          return $class === 'AppBundle\Entity\Estabelecimento';
      }
  }