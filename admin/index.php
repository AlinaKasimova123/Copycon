<?php
require_once(__DIR__.'/check_IP_from_white_list.php');
session_start();
require_once(__DIR__.'/../DBConnClass.php');
require(__DIR__.'/getUserAccessRoleByID.php');
require(__DIR__.'/password_verif.php');

if(isset($_POST['login']))
{
	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = DBConnClass::run()->prepare("SELECT id, user_role_id, email, password FROM tbl_users WHERE email = :email AND status = 'Вкл'");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $getNumRows = $stmt->rowCount();

		if($getNumRows == 1)
		{
            $passw = getPass($email);
			$getUserRow = $stmt->fetch(PDO::FETCH_ASSOC);
			//unset($getUserRow['password']);

      if(password_verify($password, $passw)) {
          $_SESSION['id'] = $getUserRow['id'];
          $_SESSION['user_role_id'] = $getUserRow['user_role_id'];
          header('location: /admin/dashboard.php');
          exit;
		}
      else {
          $errorMsg = "Неверный email или пароль";
      }
  }
		else
		{
			$errorMsg = "Неверный email или пароль";
		}
	}
}
if(isset($_GET['logout']) && $_GET['logout'] == true)
{
	session_destroy();
	header("location: /admin/index.php");
	exit;
}


if(isset($_GET['lmsg']) && $_GET['lmsg'] == true)
{
	$errorMsg = "Необходимо авторизоваться";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Войти</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark" style="background-image: url(https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80) !important; background-size: cover;">
  <!-- <div class="container"> -->
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Войти</div>
      <div class="card-body">
		<?php 
			if(isset($errorMsg))
			{
				echo '<div class="alert alert-danger">';
				echo $errorMsg;
				echo '</div>';
				unset($errorMsg);
			}
		?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="email" placeholder="Введите email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Введите пароль" required>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
        </form>
       
      </div>
    </div>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
