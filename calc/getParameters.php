<?php
session_start();
require(__DIR__ . "/../DBConnClass.php");
if (!isset($_POST["parameters"]) && (mb_strlen($_POST["parameters"] . "") < 1)) {
    exit;
}
$info_about_users = $_SESSION['info_about_user'];
$link_1 = $_SESSION['link'];
$stmt = DBConnClass::run()->prepare("SELECT * FROM calc_links WHERE link_3 = :link_1");
$stmt->bindParam(":link_1", $link_1);
$stmt->execute();
$getNumOfLinks = $stmt->rowCount();
if ($getNumOfLinks !== 1) {
    $stmt = DBConnClass::run()->prepare("INSERT INTO calc_links (comment_3, link_3) VALUES (:info_about_user, :link_1)");
    $stmt->bindParam(":info_about_user", $info_about_users);
    $stmt->bindParam(":link_1", $link_1);
    $stmt->execute();
    unset($_SESSION['name_calc']);
    unset($_SESSION['email_calc']);
    unset($_SESSION['number_calc']);
}
$user_ip = $_SESSION['IP'];
$param = $_POST['parameters'];
$stmt = DBConnClass::run()->prepare("SELECT calc_links.id_3 FROM calc_links WHERE calc_links.link_3 = :link_1");
$stmt->bindParam(":link_1", $link_1);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
$_SESSION['reference'] = $result;
$ref = $_SESSION['reference'];
$key_1 = "";
foreach ($ref as $k => $v) {
    foreach ($v as $k1 => $v1) {
        $key_1 = $v1;
    }
}
$_SESSION['refer'] = $key_1;
$ref = $_SESSION['refer'];
$stmt = DBConnClass::run()->prepare("INSERT INTO personal_links (param_4, IP_4, link_4, id_refer) VALUES (:param_msg, :user_ip, :link_1, :ref)");
$stmt->bindParam(":param_msg", $param);
$stmt->bindParam(":user_ip", $user_ip);
$stmt->bindParam(":link_1", $link_1);
$stmt->bindParam(":ref", $ref, PDO::PARAM_INT);
$stmt->execute();