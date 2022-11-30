<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../check_for_verif.php");
include(__DIR__."/../templates/header.php");
include(__DIR__."/../templates/left_sidebar.php");
include(__DIR__.'/class/EventCalcLinksClass.php');
$event = new EventCalcLinksClass();
$eventLink = $event->getCalcLink();

?>
<div class="container">
<?php if(!empty($eventLink) && count($eventLink)>0) { ?>
            <?php foreach($eventLink as $key=>$element) { ?>
            <div class="modal-wide">
            <div class="modal fade" id="myModal" class="getService" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" style="min-width:50%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center">История лога</h4>
                            <button type="button" data-bs-dismiss="modal" class="btn btn-default" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                        </div>
                        <div class="modal-body"> </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>

            <div class="content-wrapper">
            <div id="layoutSidenav_content">
                <main>
                <script src="admin/../../tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <section class="showcase">
      <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
          <h2 style="text-align: center">Персональные ссылки</h2>
        </div>
        <span id="render-event-data">
         <?php if(!empty($eventLink) && count($eventLink)>0) { ?>
            <?php foreach($eventLink as $key=>$element) { ?>
            <span id="dyn-<?php print $element['id_3'];?>">
            <div class="card gedf-card" style="margin: 5px;">
    
      <div class="card-body">
              <h5 class="card-title"><?php print $element['time_3']; ?></h5>
              <h5 class="card-title"><?php print $element['comment_3']; ?></h5>
          <p class="card-text"><?php print $element['link_3']; ?></p>
          <div class="text-muted h7 mb-2"> <?php print $element['status_3']; ?></div>
          <hr>
          <p class="card-text float-right">
            <button id="<?php echo $element['id_3'];?>" type="submit" class="btn btn-sm btn-outline-secondary history-event" value ="<?php $element['id_3']; ?>"  data-ueventid="<?php print $element['id_3'];?> " onclick="loadHistory(<?php echo $element['id_3'];?>)">История лога</button>
            <button type="submit" class="btn btn-sm btn-outline-secondary update-event" data-ueventid="<?php print $element['id_3'];?>">Редактировать</button>
            <button type="submit" class="btn btn-sm btn-outline-secondary delete-event" data-deventid="<?php print $element['id_3'];?>">Удалить</button>
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
          <div class="col-sm-12"><h3 style="text-align: center">Добавить новую персональную ссылку</h3></div>
            <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-main" placeholder="Дата и время" name="time_3">
              </div>
            </div>
              <div class="form-group">
                  <div class="col-sm-12">
                      <textarea class="form-control" id="event-comment" name="comment_3">Комментарий</textarea>
                  </div>
              </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input class="form-control" id="event-description" placeholder="Ссылка" name="link_3">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">       
                <select name="status_3" id="status" class="form-control">
                  <option value="Опубликовано">Опубликовано</option>
                  <option value="Черновик">Черновик</option>
                </select> 
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-12">
                <button type="button" class="btn btn-info float-right" id="save-event" name="if (!isset($_SESSION["link"]) && (mb_strlen($_POST["link"] . "") < 1)) {
                  exit;
                  }" onclick="add_new_link(<?php echo ($element['id_3'] + 1);?>)">Добавить</button>
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
<script src="../../js/modals.js"></script>



