<?php
require_once("../DBConnClass.php");
function getPass($email)
    {
    $query = DBConnClass::run()->prepare("SELECT id, user_role_id, email, password FROM tbl_users WHERE email=:email");
    $query->bindParam(":email", $email);
    $query->execute();
    $fetch = $query->fetch();
    return $fetch["password"];
    }