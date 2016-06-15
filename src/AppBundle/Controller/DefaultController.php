<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * DefaultController
 */
class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $this->get('logger')->info('index action...');
        $html = file_get_contents(__DIR__.'/../Resources/views/Default/index.html');

        return new Response($html);
    }
}
