<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventUsers
{
    protected $db;
    private $_eventID;
    private $_UserRoleId;
    private $_username;
    private $_email;
    private $_password;
    private $_status;

    public function setEventID($eventID) {
        $this->_eventID = $eventID;
    }
    public function setUserRoleId($user_role_id) {
        $this->_UserRoleId = $user_role_id;
    }
    public function setUsername($username) {
        $this->_username = $username;
    }
    public function setEmail($email) {
        $this->_email = $email;
    }
    public function setPassword($password) {
        $this->_password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function setStatus($status) {
        $this->_status = $status;
    }

    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("INSERT INTO tbl_users (user_role_id, username, email, password, status)  VALUES (:user_role_id, :username, :email, :password, :status)");
            $stmt->bindParam(":user_role_id", $this->_UserRoleId);
            $stmt->bindParam(":username", $this->_username);
            $stmt->bindParam(":email", $this->_email);
            $stmt->bindParam(":password", $this->_password);
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
            $stmt = DBConnClass::run()->prepare("UPDATE tbl_users SET user_role_id=:user_role_id, username=:username, email=:email, password=:password, status=:status WHERE id=:event_id");
            $stmt->bindParam(":user_role_id", $this->_UserRoleId);
            $stmt->bindParam(":username", $this->_username);
            $stmt->bindParam(":email", $this->_email);
            $stmt->bindParam(":password", $this->_password);
            $stmt->bindParam(":status", $this->_status);
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getUsers() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, user_role_id, username, email, password, status FROM tbl_users");
		    $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id, user_role_id, username, email, password, status FROM tbl_users WHERE id=:event_id");
            $stmt->bindParam(":event_id", $this->_eventID);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Ошибка! ");
        }
    }
}
