<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventPrivacyPolicy
{
    protected $db;
    private $_eventID;
    private $_header;
    private $_description;
    private $_status;

    public function setEventID($eventID) {
        $this->_eventID = $eventID;
    }
    public function setHeader($header) {
        $this->_header = $header;
    }
    public function setDescription($description) {
        $this->_description = $description;
    }
    public function setStatus($status) {
        $this->_status = "Опубликовано";
    }

    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("SELECT id, description  FROM block_services WHERE id = :id");
            $stmt->bindParam(":header", $this->_header);
            $stmt->bindParam(":description", $this->_description);
            $stmt->bindParam(":status", $_status);
            $stmt->execute();
			return $this->db->lastInsertId();

		} catch (Exception $err) {
    		die("Ошибка!  ".$err);
		}

    }

    // редактировать
    public function update() {
        try {
            $stmt = DBConnClass::run()->prepare("UPDATE privacypolicy SET header=:header, description=:description, status=:status WHERE id=:event_id");
            $stmt->bindParam(":header", $this->_header);
            $stmt->bindParam(":description", $this->_description);
            $stmt->bindParam(":status", $this->_status);
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getPrivacyPolicy() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, header, description, status FROM privacypolicy");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id, header, description, status FROM privacypolicy WHERE id=:event_id");
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
            $stmt = DBConnClass::run()->prepare("DELETE FROM privacypolicy WHERE id=:event_id AND status = 'Черновик'");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->rowCount();
	    } catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }


}
?>