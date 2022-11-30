<?php
session_start();
require_once __DIR__.DIRECTORY_SEPARATOR."../DBConnClass.php";
try {
    if($_POST['vacancy'] != "") {
        $theme = "Вакансия";
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $number = htmlspecialchars($_POST['number']);
        $vacancy = htmlspecialchars($_POST['vacancy']);

        $stmt = DBConnClass::run()->prepare("INSERT INTO messages (theme, name, email, number, vacancy) VALUES (:theme, :name, :email, :number, :vacancy)");
        $stmt->bindParam(":theme", $theme);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":vacancy", $vacancy);
        $stmt->execute();
    } elseif($_POST['theme'] != ""){
        $theme = "Заявка";
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $number = htmlspecialchars($_POST['number']);
        $reason = htmlspecialchars($_POST['theme']);
        $message = htmlspecialchars($_POST['message']);

        $stmt = DBConnClass::run()->prepare("INSERT INTO messages (theme, name, email, number, reason, message) VALUES (:theme, :name, :email, :number, :reason, :message)");
        $stmt->bindParam(":theme", $theme);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":reason", $reason);
        $stmt->bindParam(":message", $message);
        $stmt->execute();
    }
}  catch (Exception $err) {
    if($_POST['vacancy'] != "") {
        $stmt = DBConnClass::run()->prepare("INSERT INTO messages (theme, name, email, number, vacancy, error) VALUES (:theme, :name, :email, :number, :vacancy, :error)");
        $stmt->bindParam(":theme", $theme);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":vacancy", $vacancy);
        $stmt->bindParam(":error", $err);
        $stmt->execute();
        header('Location: ../index.php');
    } elseif($_POST['theme'] != ""){
        $stmt = DBConnClass::run()->prepare("INSERT INTO messages (theme, name, email, number, reason, message, error) VALUES (:theme, :name, :email, :number, :reason, :message, :error)");
        $stmt->bindParam(":theme", $theme);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":number", $number);
        $stmt->bindParam(":reason", $reason);
        $stmt->bindParam(":message", $message);
        $stmt->bindParam(":error", $err);
        $stmt->execute();
        header('Location: ../index.php');
    }
}

