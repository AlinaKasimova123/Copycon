<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventEmployees
{
    protected $db;
    private $_eventID;
    private $_image;
    private $_job;
    private $_name;
    private $_status;

    public function setEventID($eventID) {
        $this->_eventID = $eventID;
    }
    public function setImage($image) {
        $this->_image = $image;
    }
    public function setJob($job) {
        $this->_job = $job;
    }
    public function setName($name) {
        $this->_name = $name;
    }
    public function setStatus($status) {
        $this->_status = $status;
    }
    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("INSERT INTO block_employees (image, job, name, status)  VALUES (:image, :job, :name, :status)");
            $stmt->bindParam(":image", $this->_image);
            $stmt->bindParam(":job", $this->_job);
            $stmt->bindParam(":name", $this->_name);
            $stmt->bindParam(":status", $this->_status);
            $stmt->execute();
			return $this->db->lastInsertId();

		} catch (Exception $err) {
    		die("Ошибка!  ".$err);
		}

    }

    // редактировать
    public function update() {
        try {
            $stmt = DBConnClass::run()->prepare("UPDATE block_employees SET image=:image, job=:job, name=:name, status=:status WHERE id=:event_id");
            $stmt->bindParam(":image", $this->_image);
            $stmt->bindParam(":job", $this->_job);
            $stmt->bindParam(":name", $this->_name);
            $stmt->bindParam(":status", $this->_status);
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getEmployees() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, image, job, name, status FROM block_employees");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id, image, job, name, status FROM block_employees WHERE id=:event_id");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Ошибка! ");
        }
    }

    // удалить
    public function delete() {
    	try {
            $stmt = DBConnClass::run()->prepare("DELETE FROM block_employees WHERE id=:event_id");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->rowCount();
	    } catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }


}