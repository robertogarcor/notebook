<?php

/**
 * Description of User
 *
 * @author Roberto
 */

require_once '../dao/iUser.php';

class User implements iUser{
    
    private $username;
    private $password;
    private $email;
    private $firstname;
    private $surname;
    private $createat;
    private $updateat;
    
    
    private $dao; /* @var $dao UserDAO */
    
    public function __construct(UserDAO $dao) {
        $this->dao = $dao;
    }
    
    public function getUser($username, $password) {
        return $this->dao->getUser($username, $password);
    }
    
    
    // Getters and Setters 
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getSurname() {
        return $this->surname;
    }

    function getCreateat() {
        return $this->createat;
    }

    function getUpdateat() {
        return $this->updateat;
    }

    function getDao() {
        return $this->dao;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setCreateat($createat) {
        $this->createat = $createat;
    }

    function setUpdateat($updateat) {
        $this->updateat = $updateat;
    }

    function setDao($dao) {
        $this->dao = $dao;
    }



}
