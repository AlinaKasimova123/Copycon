<?php 
if(!isset($_SESSION['id'],$_SESSION['user_role_id']))
{
 header('location: /admin/index.php?logout=true');
 exit;
}		