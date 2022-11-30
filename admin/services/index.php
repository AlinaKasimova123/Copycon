<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../check_for_verif.php");
include(__DIR__."/../templates/header.php");
include(__DIR__."/../templates/left_sidebar.php");
include(__DIR__.'/class/EventServiceClass.php');
$event = new EventService();
$eventService = $event->getService();
?>
            <div class="content-wrapper">
            <div id="layoutSidenav_content">
                <main>
<script src="admin/../../tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <section class="showcase">
      <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
          <h2 style="text-align: center">Услуги</h2>
        </div>
        <span id="render-event-data">
         <?php if(!empty($eventService) && count($eventService)>0) { ?>
            <?php foreach($eventService as $key=>$element) { ?>
            <span id="dyn-<?php print $element['id'];?>">
            <div class="card gedf-card" style="margin: 5px;">
    
      <div class="card-body">
              <h5 class="card-title"><?php print $element['header']; ?></h5>
          <div class="text-muted h7 mb-2"> <?php print $element['main']; ?></div>
          <p class="card-text"><?php print $element['description']; ?></p>
          <p class="card-text"><?php print $element['image']; ?></p>
          <div class="text-muted h7 mb-2"> <?php print $element['status']; ?></div>
          <hr>
          <p class="card-text float-right">
            <button type="submit" class="btn btn-sm btn-outline-secondary update-event" data-ueventid="<?php print $element['id'];?>">Редактировать</button>
            <button type="submit" class="btn btn-sm btn-outline-secondary delete-event" data-deventid="<?php print $element['id'];?>">Удалить</button>
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
          <div class="col-sm-12"><h3 style="text-align: center">Добавить новую услугу</h3></div>
           <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-header" placeholder="Заголовок" name="header">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-main" placeholder="Текст" name="main">
              </div>
            </div> 
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="event-description" name="description">Текст для модульного окна</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="event-image" name="image">Основная картинка</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">       
                <select name="status" id="status" class="form-control">
                  <option value="Опубликовано">Опубликовано</option>
                  <option value="Черновик">Черновик</option>
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



