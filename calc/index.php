<?php 
session_start();
require_once(__DIR__.'/../admin/get_user_ip.php');
require(__DIR__."/../DBConnClass.php");
include(__DIR__."/calculator.php");
if(isset($_SESSION['link'])){
    $per_link = $_SESSION['link'];
    $stmt = DBConnClass::run()->prepare("SELECT calc_links.id_3 FROM calc_links WHERE calc_links.link_3 = :per_link");
    $stmt->bindParam(":per_link", $per_link);
    $stmt->execute();
    header('Location: /');
  }
$key = "";
foreach($_GET as $k => $v){
    $key = $k;
}
$_SESSION['link'] = $key;
$user_ips = getUserIP();
$_SESSION['IP'] = $user_ips;

