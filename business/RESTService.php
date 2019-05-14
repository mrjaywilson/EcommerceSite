<?php

require_once 'DatabaseService.php';

class RESTService {
    
    public function generateJSON($start, $end) {
        $db = new DatabaseService('');
        
        return json_encode($db->getReportByRange($start, $end));
    }
    
}