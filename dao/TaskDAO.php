<?php 

/**
 * Description of TaskDAO
 *
 * @author Roberto
 */


require_once '../db/Database.php';
require_once 'iTask.php';

class TaskDAO implements iTask {

    public function getAllTasks() {

        $sql = 'SELECT * FROM tasks';

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */

            // Execute sent
            $prst->execute();

            // Return the rows
            return $prst->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
        
    }
      
    public function getAllTasksByUser($id) {
        
        $sql = 'SELECT * FROM tasks WHERE user_id = ?';

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */

            $prst->bindParam(1, $id, PDO::PARAM_INT);
            
            // Execute sent
            $prst->execute();

            // Return the rows
            return $prst->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
    }
    
    public function deleteTask($id) {

        $sql = 'DELETE FROM tasks WHERE id = ?';

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */
            
            $prst->bindParam(1, $id, PDO::PARAM_INT);

            // Execute sent
            $prst->execute();

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
        
    }
    
    public function insertTask($name, $completed, $user_id) {
        
        $sql = 'INSERT INTO tasks (name, completed, user_id) VALUES (?,?,?)';

        try {
            
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */
            $prst->bindParam(1, $name, PDO::PARAM_STR);
            $prst->bindParam(2, $completed, PDO::PARAM_INT);
            $prst->bindParam(3, $user_id, PDO::PARAM_INT);
            
            $prst->execute();

         } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }       

    }

    public function updateTask($name, $completed, $id) {
        
        $sql = 'UPDATE tasks SET name=?, completed=? WHERE id=?';

        try {
            
            $prst = Database::getInstance()->getDb()->prepare($sql); /* @var $prst PDOStatement */
            $prst->bindParam(1, $name, PDO::PARAM_STR);
            $prst->bindParam(2, $completed, PDO::PARAM_INT);
            $prst->bindParam(3, $id, PDO::PARAM_INT);
             
            $prst->execute();

         } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }       
        
    }
}


?>
