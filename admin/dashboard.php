<?php 
session_start();
  require(__DIR__."/check_for_verif.php");
	require_once(__DIR__."/../DBConnClass.php");
  include(__DIR__.'/getUserAccessRoleByID.php');
	require_once(__DIR__.'/templates/header.php');
	require_once(__DIR__.'/templates/left_sidebar.php');
	
	
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <hr>
      <h2>Вы зашли как <strong><?php echo getUserAccessRoleByID($_SESSION['user_role_id']); ?></strong></h2>
      
      <div style="height: 1000px;"></div>
    </div>
	
<?php require_once(__DIR__.'/templates/footer.php'); ?>