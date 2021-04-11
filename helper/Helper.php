<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author Roberto
 */
class Helper {
    
    // Helper url controller
    
    public function urlController($resource, $action, $value) {
        if ($value) {
           return '/notebook/controller/'. $resource . '.php?' . $action . '=' . $value;  
        }
        return '/notebook/controller/'. $resource . '.php?' . $action;  
    }
    
    
        
        
}
        
        
    
    

