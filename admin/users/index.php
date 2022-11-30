<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../check_for_verif.php");
include(__DIR__."/../templates/header.php");
include(__DIR__."/../templates/left_sidebar.php");
include(__DIR__.'/class/EventUsersClass.php');
$event = new EventUsers();
$eventUsers = $event->getUsers();

?>
            <div class="content-wrapper">
            <div id="layoutSidenav_content">
                <main>
                <script src="admin/../../tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <section class="showcase">
      <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
          <h2 style="text-align: center">Пользователи</h2>
        </div>
        <span id="render-event-data">
         <?php if(!empty($eventUsers) && count($eventUsers)>0) { ?>
            <?php foreach($eventUsers as $key=>$element) { ?>
            <span id="dyn-<?php print $element['id'];?>">
            <div class="card gedf-card" style="margin: 5px;">
    
      <div class="card-body">
              <h5 class="card-title"><?php print $element['user_role_id']; ?></h5>
              <h5 class="card-title"><?php print $element['username']; ?></h5>
              <h5 class="card-title"><?php print $element['email']; ?></h5>
          <p class="card-text"><?php print $element['password']; ?></p>
          <div class="text-muted h7 mb-2"> <?php print $element['status']; ?></div>
          <hr>
          <p class="card-text float-right">
            <button type="submit" class="btn btn-sm btn-outline-secondary update-event" data-ueventid="<?php print $element['id'];?>">Редактировать</button>
          </p>

      </div>                    
    </div>
  </span>
          <?php } ?>
        <?php } ?>
        </span>
        <br/>
        <hr>
        <form id="dynamic-post" class="dynamic-post">
        <input type="hidden" name="action" value="create">
        <div class="row align-items-center">
          <div class="col-md-12 col-md-right">
          <div class="col-sm-12"><h3 style="text-align: center">Добавить нового пользователя</h3></div>
           <div class="form-group">
              <div class="col-sm-12">       
                <select name="user_role_id" id="role_of_user" class="form-control">
                  <option value="1">Администратор</option>
                  <option value="2">Модератор</option>
                </select> 
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-main" placeholder="Username" name="username">
              </div>
            </div> 
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" class="form-control" id="event-main" placeholder="Email" name="email">
              </div>
            </div>
              <div class="form-group">
                  <div class="col-sm-12">
                      <textarea class="form-control" id="event-password" name="password">Пароль</textarea>
                  </div>
              </div>
            <div class="form-group">
              <div class="col-sm-12">       
                <select name="status" id="status" class="form-control">
                  <option value="Вкл">Вкл</option>
                  <option value="Выкл">Выкл</option>
                </select> 
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-12">
                <button type="button" class="btn btn-info float-right" id="save-event">Добавить</button>
              </div>
            </div>
        </div>
      </div>
     </form>
    </div>
  </section>
  </div>
  </div>
<?php include(__DIR__.'/../templates/footer.php');?>
<script src="admin/../../tinymce/custom.tinymce.js"></script>



