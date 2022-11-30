<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventParamForCalc
{
    protected $db;
    private $_eventID;
    private $_main;
    private $_param;
    private $_step;
    private $_value;
    private $_status;

    public function setEventID($eventID) {
        $this->_eventID = $eventID;
    }
    public function setMain($main) {
        $this->_main = $main;
    }
    public function setParam($param) {
        $this->_param = $param;
    }
    public function setStep($step) {
        $this->_step = $step;
    }
    public function setValue($value) {
        $this->_value = $value;
    }
    public function setStatus($status) {
        $this->_status = $status;
    }

    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("INSERT INTO step_for_calc (main, param, step, value, status)  VALUES (:main, :param, :step, :value, :status)");
            $stmt->bindParam(":main", $this->_main);
            $stmt->bindParam(":param", $this->_param);
            $stmt->bindParam(":step", $this->_step);
            $stmt->bindParam(":value", $this->_value);
            $stmt->bindParam(":status", $this->_status);
            $stmt->execute();;
			return $this->db->lastInsertId();

		} catch (Exception $err) {
    		die("Ошибка!  ".$err);
		}

    }

    // редактировать
    public function update() {
        try {
            $stmt = DBConnClass::run()->prepare("UPDATE step_for_calc SET main=:main, param=:param, step=:step, value=:value, status=:status WHERE id=:event_id");
            $stmt->bindParam(":main", $this->_main);
            $stmt->bindParam(":param", $this->_param);
            $stmt->bindParam(":step", $this->_step);
            $stmt->bindParam(":value", $this->_value);
            $stmt->bindParam(":status", $this->_status);
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getParam() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, main, param, step, value, status FROM step_for_calc");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id, main, param, step, value, status FROM step_for_calc WHERE id=:event_id");
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
            $stmt = DBConnClass::run()->prepare("DELETE FROM step_for_calc WHERE id=:event_id AND status = 'Черновик'");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->rowCount();
	    } catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
}
