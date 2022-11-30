<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventCalcLinksClass
{
    protected $db;
    private $_eventID;
    private $_time;
    private $_comment;
    private $_link;
    private $_status;
    private $link_db = '$_link."/calc/?".strtoupper(bin2hex(openssl_random_pseudo_bytes(8)))';

    // создать
    public function create() {
		try {
            $stmt = DBConnClass::run()->prepare("INSERT INTO calc_links (time_3, comment_3, link_3, status_3)  VALUES (:time, :comment, :link, :status)");
            $stmt->bindParam(":time_3", $_time);
            $stmt->bindParam(":comment_3", $_comment);
            $stmt->bindParam(":link_3", $link_db);
            $stmt->bindParam(":status_3", $_status);
            $stmt->execute();
			return $this->db->lastInsertId();

		} catch (Exception $err) {
    		die("Ошибка!  ".$err);
		}

    }

    // редактировать
    public function update() {
        try {
            $stmt = DBConnClass::run()->prepare("UPDATE calc_links SET time_3=:time_3, comment_3=:comment_3, link_3=:link_3, status_3=:status_3 WHERE id_3=:event_id");
            $stmt->bindParam(":time_3", $_time);
            $stmt->bindParam(":comment_3", $_comment);
            $stmt->bindParam(":link_3", $link_db);
            $stmt->bindParam(":status_3", $_status);
            $stmt->bindParam(":event_id", $_eventID);
            $stmt->execute();
			return $stmt->rowCount();
		} catch (Exception $err) {
			die("Ошибка! " . $err);
		}
    }
   
    // получить из базы данных
    public function getCalcLink() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id_3, time_3, comment_3, link_3, status_3 FROM calc_links");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id_3, time_3, comment_3, link_3, status_3 FROM calc_links WHERE id_3=:event_id");
            $stmt->bindParam(":event_id", $_eventID);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Ошибка! ");
        }
    }
     // удалить
     public function delete() {
    	try {
            $stmt = DBConnClass::run()->prepare("DELETE FROM calc_links WHERE id_3=:event_id AND status_3 = 'Черновик'");
            $stmt->bindParam(":event_id", $_eventID);
            $stmt->execute();
            return $stmt->rowCount();
	    } catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
}
