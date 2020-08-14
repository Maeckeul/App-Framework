<?php 

namespace App;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * This class is the main controller for our app
 * 
 * @author Maeckeul Chenais
 */

class Controller extends BaseController {

    /**
     * @return string contain the html to display
     */

    function executeHome() {
        $data = $this->model->getPageData('home');
        $content = $this->view->displayHtml($data);

        $response = new Response($content);
        /* $response->setContent($content);
        $response->headers->set('content-type', 'text/html');
        $response->setStatusCode(Response::HTTP_OK); */
        
        return $response;
    }

    function executeContact() {
        $data = $this->model->getPageData('contact');

        $usersHtml = '<ul>';
        foreach ($data['users'] as $user => $email) {
            $usersHtml .= '<li>' . $user . ' : ' . $email . '</li>';
        }

        $usersHtml .= '</ul>';

        $data['content'] .= $usersHtml;

        $content = $this->view->displayHtml($data);

        $response = new Response($content);
        /* $response->setContent($content);
        $response->headers->set('content-type', 'text/html');
        $response->setStatusCode(Response::HTTP_OK); */
        
        return $response;
    }

    function executeApi() {
        $data = $this->model->getPageData('contact');

        $response = new JsonResponse($data['users']);
        
        return $response;
    }
}