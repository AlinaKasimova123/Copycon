<?php
require_once(__DIR__."/DBConnClass.php");
class Event 
{
    private $_eventID;

    public function getEvent() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT id, header, main, image, status FROM block_services WHERE id=:event_id");
            $stmt->bindParam(":event_id", $_eventID, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Ошибка! ");
        }
    }

    // получить из базы данных
    public function getServices() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, header, main, image FROM block_services WHERE status = 'Опубликовано'");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    // 
    public function getAdvantages() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, header, main, image FROM block_advantages WHERE status = 'Опубликовано'");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    //
    public function getClients() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, link, image FROM block_clients WHERE status = 'Опубликовано'");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    //
    public function getReviews() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, name, company_name, image, text FROM block_reviews WHERE status = 'Опубликовано'");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    //
    public function getEmployees() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, image, job, name FROM block_employees WHERE status = 'Опубликовано'");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    //
    public function getVacancies() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, name_vacancy, vacancy FROM block_vacancies WHERE status = 'Опубликовано'");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    //
    public function getPrivacyPolicy() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, header, description FROM privacypolicy WHERE status = 'Опубликовано'");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
    //
    public function getCalc() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, main FROM block_calculator WHERE status = 'Опубликовано'");
            $stmt->execute();
		    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
}
