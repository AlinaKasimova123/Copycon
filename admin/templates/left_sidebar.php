 <?php 
 session_start();
 ?>
 <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Главная</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/services/index.php">
            <i class="fa fa-fw fa fa-laptop"></i>
            <span class="nav-link-text">Услуги</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/advantages/index.php">
            <i class="fa fa-fw fa fa-bar-chart"></i>
            <span class="nav-link-text">Преимущества</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/clients/index.php">
            <i class="fa fa-fw fa fa-id-badge"></i>
            <span class="nav-link-text">Клиенты</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/reviews/index.php">
            <i class="fa fa-fw fa fa-comment"></i>
            <span class="nav-link-text">Отзывы</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/privacyPolicy/index.php">
            <i class="fa fa-fw fa fa-wpforms"></i>
            <span class="nav-link-text">Политика конфиденциальности</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/calculator/index.php">
            <i class="fa fa-fw fa fa-calculator"></i>
            <span class="nav-link-text">Калькулятор</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/calc_links/index.php">
            <i class="fa fa-fw fa fa-calculator"></i>
            <span class="nav-link-text">Персональные ссылки на калькулятор</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/param_for_calc/index.php">
            <i class="fa fa-fw fa fa-calculator"></i>
            <span class="nav-link-text">Параметры для цен калькулятора</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="../employees/index.php">
            <i class="fa fa-fw fa fa-users"></i>
            <span class="nav-link-text">Сотрудники</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="/admin/vacancies/index.php">
            <i class="fa fa-fw fa fa-tasks"></i>
            <span class="nav-link-text">Вакансии</span>
          </a>
        </li>
        <?php 
		//only visible to admin and editor
		if($_SESSION['user_role_id'] == 1){?>
		
			 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
			  <a class="nav-link" href="/admin/users/index.php">
				<i class="fa fa-fw fa fa-user"></i>
				<span class="nav-link-text">Пользователи</span>
			  </a>
			</li>
		<?php }?>
          <li class="nav-item" data-toggle="tooltip" data-placement="right">
              <a class="nav-link" href="/admin/errors/index.php">
                  <i class="fa fa-exclamation-triangle"></i>
                  <span class="nav-link-text">Ошибки</span>
              </a>
          </li>
      </ul>
     
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="/admin/index.php?logout=true">
            <i class="fa fa-fw fa-sign-out"></i>Выйти
		  </a>
        </li>
      </ul>
    </div>
  </nav>