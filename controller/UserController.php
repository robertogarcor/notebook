<?php

/**
 * Description of ControllerUser
 *
 * @author Roberto
 */

require_once '../model/User.php';
require_once '../dao/UserDAO.php';


class UserController {
    
    private $users; /* @var $users User */
    
    public function __construct() {
        $this->users = new User(new UserDAO);
        
    }
    
    public function getUser($username, $password) {
        return $this->users->getUser($username, $password);     
    }
    
}
