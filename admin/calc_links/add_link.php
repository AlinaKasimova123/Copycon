<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
//if (!isset($_POST["add_link"])) {
//    exit;
//}
require(__DIR__."/../check_for_verif.php");
include(__DIR__."/../../DBConnClass.php");

try 
    {
        $dateTime=$_POST['dateTime'];
        $comment=$_POST['comment'];
        $uuid=$_POST['uuid'];
        $status=$_POST['status'];
        $stmt = DBConnClass::run()->prepare("INSERT INTO calc_links (time_3, comment_3, link_3, status_3) VALUES (:dateTime, :comment, :uuid, :status);");
        $stmt->bindParam(":dateTime", $dateTime);
        $stmt->bindParam(":comment", $comment);
        $stmt->bindParam(":uuid", $uuid);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
} catch (PDOException $e) {
    die("Не получилось подсоединиться к базе данных:" . $e);
}
