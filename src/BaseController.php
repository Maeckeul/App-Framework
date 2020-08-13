<?php

namespace App;

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

        http_response_code(404);

        return $this->view->displayHtml($data);
    }
}