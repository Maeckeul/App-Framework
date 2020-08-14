<?php 

namespace App;

class View {
    
    /**
     * @param array $data
     */
    function displayHtml(array $data) {
        ob_start();
        include __DIR__ . '/../templates/template.tpl.php';
        $html = ob_get_clean();
    
        return $html;
    }
}