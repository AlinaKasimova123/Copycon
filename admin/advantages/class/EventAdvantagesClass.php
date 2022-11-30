<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class Event_AdvantagesClass
{
    protected $db;
    private $_eventID;
    private $_header;
    private $_main;
    private $_image;
    private $_description;
    private $_status;

    public function setEventID($eventID) {
        $this->_eventID = $eventID;
    }
    public function setHeader($header) {
        $this->_header = $header;
    }
    public function setMain($main) {
        $this->_main = $main;
    }
    public function setDescription($description) {
        $this->_description = $description;
    }
    public function setImage($image) {
        $this->_image = $image;
    }
    public function setStatus($status) {
        $this->_status = $status;
    }

    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("INSERT INTO block_advantages (header, main, description, image, status)  VALUES (:header, :main, :description, :image, :status)");
            $stmt->bindParam(":header", $this->_header);
            $stmt->bindParam(":main", $this->_main);
            $stmt->bindParam(":description", $this->_description);
            $stmt->bindParam(":image", $this->_image);
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
            $stmt = DBConnClass::run()->prepare("UPDATE block_advantages SET header=:header, main=:main, description=:description, image=:image, status=:status WHERE id=:event_id");
            $stmt->bindParam(":header", $this->_header);
            $stmt->bindParam(":main", $this->_main);
            $stmt->bindParam(":description", $this->_description);
            $stmt->bindParam(":image", $this->_image);
            $stmt->bindParam(":status", $this->_status);
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getAdvantage() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, header, main, description, image, status FROM block_advantages");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
   
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id, header, main, description, image, status FROM block_advantages WHERE id=:event_id");
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
            $stmt = DBConnClass::run()->prepare("DELETE FROM block_advantages WHERE id=:event_id AND status='Черновик'");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->rowCount();
	    } catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }


}
