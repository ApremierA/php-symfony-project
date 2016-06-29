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
     * Отображает главную страницу
     *
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('Default/index.html.twig');
    }
}
