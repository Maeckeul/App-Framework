<?php

namespace App;

use Symfony\Component\HttpFoundation\Response;

class BaseController {

    /**
     * This members contain model class
     * 
     * This contain the class that allow to check data
     */
    
    protected $model;
    protected $view;

    public function __construct() {
        $this->model = new Model();
        $this->view = new View();
    }

    function execute404() {
        $data = $this->model->getPageData('404');

        $content = $this->view->displayHtml($data);

        $response = new Response($content, Response::HTTP_NOT_FOUND);
        /* $response->setContent($content);
        $response->headers->set('content-type', 'text/html');
        $response->setStatusCode(Response::HTTP_NOT_FOUND); */
        
        return $response;
    }
}