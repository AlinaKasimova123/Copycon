<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventVacancies
{
    protected $db;
    private $_eventID;
    private $_name_vacancy;
    private $_vacancy;
    private $_status;

    public function setEventID($eventID) {
        $this->_eventID = $eventID;
    }
    public function setNameVacancy($name_vacancy) {
        $this->_name_vacancy = $name_vacancy;
    }
    public function setVacancy($vacancy) {
        $this->_vacancy = $vacancy;
    }
    public function setStatus($status) {
        $this->_status = $status;
    }

    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("INSERT INTO block_vacancies (name_vacancy, vacancy, status)  VALUES (:name_vacancy, :vacancy, :status)");
            $stmt->bindParam(":name_vacancy", $this->_name_vacancy);
            $stmt->bindParam(":vacancy", $this->_vacancy);
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
            $stmt = DBConnClass::run()->prepare("UPDATE block_vacancies SET name_vacancy=:name_vacancy, vacancy=:vacancy, status=:status WHERE id=:event_id");
            $stmt->bindParam(":name_vacancy", $this->_name_vacancy);
            $stmt->bindParam(":vacancy", $this->_vacancy);
            $stmt->bindParam(":status", $this->_status);
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getVacancies() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, name_vacancy, vacancy, status FROM block_vacancies");
		    $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id, name_vacancy, vacancy, status FROM block_vacancies WHERE id=:event_id");
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
            $stmt = DBConnClass::run()->prepare("DELETE FROM block_vacancies WHERE id=:event_id AND status = 'Черновик'");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->rowCount();
	    } catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }


}