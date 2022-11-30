<?php
require_once(__DIR__.'/../../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../../check_for_verif.php");
include(__DIR__."/../../../DBConnClass.php");
class EventErrors
{
    // получить из базы данных
    public function getError() {
        try {
            $stmt = DBConnClass::run()->prepare("SELECT theme, name, email, number, reason, message, vacancy, error FROM messages");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (Exception $err) {
            die("Ошибка! " . $err);
        }
    }
}

