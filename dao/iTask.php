<?php

/**
 *
 * @author Roberto
 */
interface iTask {
    
    public function getAllTasks();
    
    public function getAllTasksByUser($id);
               
    public function deleteTask($id);
    
    public function insertTask($name, $completed, $user_id);
    
    public function updateTask($name, $completed, $id);
    
        
}
    
