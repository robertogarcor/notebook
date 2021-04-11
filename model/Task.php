<?php 

/**
 * Description of Task
 *
 * @author Roberto
 */


require_once '../dao/iTask.php';

class Task implements iTask{
        
        private $id;
        private $name;
        private $completed;
        private $createat;
        private $updateat;
    
	private $dao; /* @var $dao TaskDAO */

	public function __construct(TaskDAO $dao) {
	    $this->dao = $dao;
	}
        
	public function getAllTasks(){   
            return $this->dao->getAllTasks();    
	}
        
        public function getAllTasksByUser($id) {
            return $this->dao->getAllTasksByUser($id);
        }
        
        public function deleteTask($id){   
            $this->dao->deleteTask($id);   
        }
        
        public function insertTask($name, $completed, $user_id) {
            $this->dao->insertTask($name, $completed, $user_id);
        }

        
        public function updateTask($name, $completed, $id) {
            $this->dao->updateTask($name, $completed, $id);
        }
        
        
        // Getters and Setters
        
        function getId() {
            return $this->id;
        }

        function getName() {
            return $this->name;
        }

        function getCompleted() {
            return $this->completed;
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

        function setId($id) {
            $this->id = $id;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setCompleted($completed) {
            $this->completed = $completed;
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



?>
