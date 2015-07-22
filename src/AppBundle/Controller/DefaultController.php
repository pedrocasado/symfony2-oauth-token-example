<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home_index")
     */
    public function indexAction()
    {
    	// create client_id
  		// $clientManager = $this->container->get('fos_oauth_server.client_manager.default');
		// $client = $clientManager->createClient();
		// $client->setRedirectUris(array('http://dev.easybonus.com'));
		// // $client->setAllowedGrantTypes(array('token', 'password'));
		// $client->setAllowedGrantTypes(array('password', 'refresh_token'));
		// $clientManager->updateClient($client);

        return $this->render('default/index.html.twig');
    }
}
