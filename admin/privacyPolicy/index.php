<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../check_for_verif.php");
include(__DIR__."/../templates/header.php");
include(__DIR__."/../templates/left_sidebar.php");
include(__DIR__.'/class/EventPrivacyPolicyClass.php');
$event = new EventPrivacyPolicy();
$eventPrivacyPolicy = $event->getPrivacyPolicy();

?>
            <div class="content-wrapper">
            <div id="layoutSidenav_content">
                <main>
                <script src="admin/../../tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <section class="showcase">
      <div class="container">
        <div class="pb-2 mt-4 mb-2 border-bottom">
          <h2 style="text-align: center">Политика обработки персональных данных</h2>
        </div>
        <span id="render-event-data">
         <?php if(!empty($eventPrivacyPolicy) && count($eventPrivacyPolicy)>0) { ?>
            <?php foreach($eventPrivacyPolicy as $key=>$element) { ?>
            <span id="dyn-<?php print $element['id'];?>">
            <div class="card gedf-card" style="margin: 5px;">
    
      <div class="card-body">
          <a class="card-link" >
              <h5 class="card-title"><?php print $element['header']; ?></h5>
          </a>
          <p class="card-text"><?php print $element['description']; ?></p>
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
        </div>
      </div>
    </div>
<?php include(__DIR__.'/../templates/footer.php');?>
<script src="admin/../../tinymce/custom.tinymce.js"></script>



