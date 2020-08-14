<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class App {

    /**
     * @return Response
     */
    public function handleRequest(Request  $request) {
        $page = $this->getPageFromUrl($request);
        return $this->dispatchRoute($page);
    }

    private function getPageFromUrl(Request $request) {

        /*
        if(isset($_GET['page'])) {
            $pageFound = $_GET['page'];
            if ($pageFound == '') {
                $pageFound = '404' ;
            }
        } else {
            $pageFound = 'home';
        }
        */

        $pageFound = $request->query->get('page', 'home');

        return $pageFound;
    }

    private function dispatchRoute(string $page) {
        $controller = new Controller();
        
        $methodName = "execute" . ucfirst($page);
        if (!method_exists($controller, $methodName)) {
            $methodName = "execute404";
        }

        return $controller->$methodName();
    }
}