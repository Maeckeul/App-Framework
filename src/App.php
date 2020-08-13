<?php

namespace App;

class App {
    
    public function handleRequest() {
        $page = $this->getPageFromUrl();
        return $this->dispatchRoute($page);
    }

    private function getPageFromUrl() {
        if(isset($_GET['page'])) {
            $pageFound = $_GET['page'];
            if ($pageFound == '') {
                $pageFound = '404' ;
            }
        } else {
            $pageFound = 'home';
        }
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