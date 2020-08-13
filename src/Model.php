<?php 

namespace App;

class Model {

    public function getPageData(string $page) {
        $allData = $this->getData();
        $pageData = $allData[$page];

        return $pageData;
    }

    private function getData() {
        include __DIR__ . '/../data/data.php';
        return $data;
    }
}