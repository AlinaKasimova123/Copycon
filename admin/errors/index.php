<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__ . "/../check_for_verif.php");
include(__DIR__ . "/../templates/header.php");
include(__DIR__ . "/../templates/left_sidebar.php");
include(__DIR__ . '/class/EventErrors.php');
$event = new EventErrors();
$eventError = $event->getError();
//var_dump($eventError);
//exit;
?>
<div class="content-wrapper">
    <div id="layoutSidenav_content">
        <script src="admin/../../tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <section class="showcase">
            <div class="container">
                <div class="pb-2 mt-4 mb-2 border-bottom">
                    <h2 style="text-align: center">Ошибки</h2>
                </div>
                <div class="row">
                    <div id="render-event-data">
                         <div>
                         <?php if (!empty($eventError) && count($eventError) > 0) { ?>
                                     <?php foreach ($eventError as $key => $element) { ?>
                                     <?php if ($element['error'] != "" && $element['theme'] == "Заявка") { ?>
                                     <div class="card gedf-card" style="margin: 5px;">
                                     <div class="card-body">
                                         <p class="card-text">Тема: <?php print $element['theme']; ?></p>
                                         <p class="card-text">Имя: <?php print $element['name']; ?></p>
                                         <p class="card-text">Email: <?php print $element['email']; ?></p>
                                         <p class="card-text">Номер телефона: <?php print $element['number']; ?></p>
                              <?php if (($element['reason'] != "") || ($element['message'] != "")) { ?>
                                  <p class="card-text">Причина обращения: <?php print $element['reason']; ?></p>
                                  <p class="card-text">Сообщение: <?php print $element['message']; ?></p>
                              <?php } ?>
                              <p class="card-text">Ошибка: <?php print $element['error']; ?></p>
                                         </div>
                                         </div>
                                     <?php } ?>


                             <?php if ($element['error'] != "" && $element['theme'] == "Вакансия") { ?>
                                 <div class="card gedf-card" style="margin: 5px;">
                                     <div class="card-body">
                                         <p class="card-text">Тема: <?php print $element['theme']; ?></p>
                                         <p class="card-text">Имя: <?php print $element['name']; ?></p>
                                         <p class="card-text">Email: <?php print $element['email']; ?></p>
                                         <p class="card-text">Номер телефона: <?php print $element['number']; ?></p>
                                  <p class="card-text">Вакансия: <?php print $element['vacancy']; ?></p>
                              <p class="card-text">Ошибка: <?php print $element['error']; ?></p>
                                         </div>
                                         </div>
                             <?php } ?>

                             </div>
                             <?php }
                             } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include(__DIR__ . '/../templates/footer.php'); ?>
<script src="admin/../../tinymce/custom.tinymce.js"></script>


