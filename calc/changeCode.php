<?php
session_start();
require(__DIR__ . "/../DBConnClass.php");
require_once(__DIR__."/../admin/get_user_ip.php");
$ip = getUserIP();
if (((!empty($_POST['name_calc'])) || (!empty($_POST['email_calc'])) || (!empty($_POST['number_calc'])))) {
     $stmt = DBConnClass::run()->prepare("SELECT * FROM personal_links WHERE IP_4 = :ip");
     $stmt->bindParam(":ip", $ip);
     $stmt->execute();
     $getNumOfLinks = $stmt->rowCount();
     if ($getNumOfLinks > 0) {
         $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
         foreach ($results as $k => $v) {
             echo $v['link_4'];
             exit;
         }
     } else {
         if (isset($_SESSION['name_calc']) || isset($_SESSION['email_calc']) || isset($_SESSION['number_calc'])) {
             $_SESSION['name_calc'] .= $_POST['name_calc'] . " ";
             $_SESSION['email_calc'] .= $_POST['email_calc'] . " ";
             $_SESSION['number_calc'] .= $_POST['number_calc'] . " ";
         } else {
             $_SESSION['name_calc'] = $_POST['name_calc'];
             $_SESSION['email_calc'] = $_POST['email_calc'];
             $_SESSION['number_calc'] = $_POST['number_calc'];
         }
         if (((!empty($_SESSION['name_calc'])) || (!empty($_SESSION['email_calc'])) || (!empty($_SESSION['number_calc'])))) {
             $info_about_user = "";
             if (isset($_SESSION['name_calc']) > 0) $info_about_user .= $_SESSION['name_calc'] . " ";
             if (isset($_SESSION['email_calc']) > 0) $info_about_user .= $_SESSION['email_calc'] . " ";
             if (isset($_SESSION['number_calc']) > 0) $info_about_user .= $_SESSION['number_calc'] . " ";
             $_SESSION['info_about_user'] = $info_about_user;
         }
     }
}
