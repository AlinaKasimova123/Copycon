<?php
require_once("../DBConnClass.php");
function getUserAccessRoleByID($id) {

global $conn;
$query = DBConnClass::run()->prepare("SELECT user_role FROM tbl_user_role WHERE id = :id");
$query->bindParam(":id", $id);
$query->execute();
$fetch = $query->fetch();
return $fetch["user_role"];
}