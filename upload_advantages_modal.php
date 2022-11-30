<?php
session_start();
require_once __DIR__.DIRECTORY_SEPARATOR."DBConnClass.php";
try
{
    $id_1=$_REQUEST['adv'];
    $stmt = DBConnClass::run()->prepare("SELECT description  FROM block_advantages WHERE id = :id");
    $stmt->bindParam(":id", $id_1);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
      foreach($result as $k => $v){
          echo $v;
        
      }
     } catch (PDOException $e) {
         die("Не получилось подсоединиться к базе данных:");
     }


     



