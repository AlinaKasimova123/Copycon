<?php
require_once("../DBConnClass.php");
class EventPrices
{
    // получить из базы данных цены
    public function getPrices() {
    	try {
            $stmt = DBConnClass::run()->prepare("SELECT id, value, step FROM step_for_calc WHERE status = 'Опубликовано'");
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $err) {
		    die("Ошибка! " . $err);
		}
    }
}
