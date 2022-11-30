<?php 
session_start();
include("DBConnClass.php");
try
{
    $id_2=$_REQUEST['pp'];
    $stmt = DBConnClass::run()->prepare("SELECT description  FROM privacypolicy WHERE id = :id;");
    $stmt->bindParam(":id", $id_2, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    $key = "";
      foreach($result as $k => $v){
        $key = $v;
    }
    echo $key;
      } catch (PDOException $e) {
         die("Не получилось подсоединиться к базе данных: ". $e);
      }
