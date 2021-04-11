<?php

/**
 * Description of FileTask
 *
 * @author Roberto
 */
class FileTask {
    
    // Create file task and download
    
    public function createFile($file, $tasksUser){
        $path = "../view/" . $file; 
        $f = fopen($path, 'w');
        foreach ($tasksUser as $key){
            $completed = $key['completed'] == "0" ? "Not Completed" : "Completed";
            $updateat =  $key['updateat'] != null ? $key['updateat'] : "N/A";
            $row = "Task #" . $key['id'] . " - "  . $key['name'] . " ---> " . $completed . " | created ---> " . $key['createat'] . " | updated ---> " . $updateat; 
            fwrite($f, $row . PHP_EOL);    
        }
        fclose($f);
        $this->downloadFile($path);    
    }
    
    
    private function downloadFile($file){
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit();
        }
    }
    
    
    
}
