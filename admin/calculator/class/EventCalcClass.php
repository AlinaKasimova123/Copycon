<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventCalcClass
{
    protected $db;
    private $_eventID;
    private $_main;
    private $_status;

    public function setEventID($eventID) {
        $this->_eventID = $eventID;
    }
    public function setMain($main) {
        $this->_main = $main;
    }
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("INSERT INTO block_calculator (main, status)  VALUES (:main, :status)");
            $stmt->bindParam(":main", $this->_main);
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
            $stmt = DBConnClass::run()->prepare("UPDATE block_calculator SET main=:main, status=:status WHERE id=:event_id");
            $stmt->bindParam(":main", $this->_main);
            $stmt->bindParam(":status", $this->_status);
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getCalculator() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, main, status FROM block_calculator");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id,  main, status FROM block_calculator WHERE id=:event_id");
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
            $stmt = DBConnClass::run()->prepare("DELETE FROM block_calculator WHERE id=:event_id AND status = 'Черновик'");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->rowCount();
	    } catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }


}