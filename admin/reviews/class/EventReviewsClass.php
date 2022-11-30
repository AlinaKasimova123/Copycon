<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventReviews
{
    protected $db;
    private $_eventID;
    private $_name;
    private $_company_name;
    private $_image;
    private $_text;
    private $_status;

    public function setEventID($eventID) {
        $this->_eventID = $eventID;
    }
    public function setName($name) {
        $this->_name = $name;
    }
    public function setCompanyName($company_name) {
        $this->_company_name = $company_name;
    }
    public function setImage($image) {
        $this->_image = $image;
    }
    public function setText($text) {
        $this->_text = $text;
    }
    public function setStatus($status) {
        $this->_status = $status;
    }

    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("INSERT INTO block_reviews (name, company_name, image, text, status)  VALUES (:name, :company_name, :image, :text, :status)");
            $stmt->bindParam(":name", $this->_name);
            $stmt->bindParam(":company_name", $this->_company_name);
            $stmt->bindParam(":image", $this->_image);
            $stmt->bindParam(":text", $this->_text);
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
            $stmt = DBConnClass::run()->prepare("UPDATE block_reviews SET name=:name, company_name=:company_name, image=:image, text=:text, status=:status WHERE id=:event_id");
            $stmt->bindParam(":name", $this->_name);
            $stmt->bindParam(":company_name", $this->_company_name);
            $stmt->bindParam(":image", $this->_image);
            $stmt->bindParam(":text", $this->_text);
            $stmt->bindParam(":status", $this->_status);
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getReview() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, name, company_name, image, text, status FROM block_reviews");
		    $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id, name, company_name, image, text, status FROM block_reviews WHERE id=:event_id");
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
            $stmt = DBConnClass::run()->prepare("DELETE FROM block_reviews WHERE id=:event_id AND status = 'Черновик'");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->rowCount();
	    } catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
}
