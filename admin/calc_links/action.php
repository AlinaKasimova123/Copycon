<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/check_for_verif.php");
include(__DIR__.'/class/EventCalcLinksClass.php');
$event = new EventCalcLinksClass();
$post = $_POST;
$json = array();	
if(!empty($post['action']) && $post['action']=="create") {
    $event->setTime($post['time_3']);
    $event->setComment($post['comment_3']);
    $event->setLink($post['link_3']);
    $event->setStatus($post['status_3']);
	$status = $event->create();
	if(!empty($status)){
		$json['msg'] = 'success';
		$json['task_id'] = $status;
	} else {
		$json['msg'] = 'failed';
		$json['task_id'] = '';
	}
	header('Content-Type: application/json');	
	echo '<div class="card gedf-card" style="margin: 5px;" id="dyn-'.$status.'">
      <div class="card-body">
              <h5 class="card-title">'.$post['time_3'].'</h5>
              <h5 class="card-title">'.$post['comment_3'].'</h5>
              <h5 class="card-title">'.$post['link_3'].'</h5>
              <p class="card-text">'.$post['status_3'].'</p>
          <hr>
          <p class="card-text float-right">
            <button type="submit" class="btn btn-sm btn-outline-secondary update-event" data-ueventid="'.$status.'">Редактировать</button>
            <button type="submit" class="btn btn-sm btn-outline-secondary delete-event" data-deventid="'.$status.'">Удалить</button>
            </p>
      </div>                    
    </div>';
}

if(!empty($post['action']) && $post['action']=="fetch_event") {
	$event->setEventID($post['event_id']);
	$fetchEvent = $event->getEvent();
	header('Content-Type: application/json');
	echo '<form id="dynamic-post-'.$post['event_id'].'" class="dynamic-post">
	<input type="hidden" name="action" value="update">
		<input type="hidden" name="event_id" value="'.$fetchEvent['id_3'].'">
        <div class="row align-items-center">
          <div class="col-md-12 col-md-right">
           <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-header" placeholder="Дата и время" name="time_3" value="'.$fetchEvent['time_3'].'">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="event-content'.$fetchEvent['id'].'" name="comment_3">'.$fetchEvent['comment_3'].'</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-link" placeholder="Ссылка" name="link_3" value="'.$fetchEvent['link_3'].'">
              </div>
            </div> 
            <div class="form-group">
              <div class="col-sm-12">       
                <select name="status_3" id="event-status'.$fetchEvent['id_3'].'" class="form-control">';
                    if($fetchEvent["status_3"] == "Опубликовано") {
                        echo '<option value="Опубликовано" selected>Опубликовано</option>
                                  <option value="Черновик">Черновик</option>';
                    } else {
                        echo '<option value="Опубликовано">Опубликовано</option>
                                  <option value="Черновик" selected>Черновик</option>';
                    }
                    echo '
                </select> 
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-12">
                <button type="button" class="btn btn-info float-right save-update" data-seventid="'.$fetchEvent['id_3'].'">Отправить</button>
              </div>
            </div>
        </div>
      </div>
      </form>';
  }

if(!empty($post['action']) && $post['action']=="update") {
	$event->setEventID($post['event_id']);
	$event->setTime($post['time_3']);
	$event->setComment($post['comment_3']);
  $event->setLink($post['link_3']);
  $event->setStatus($post['status_3']);
	$status = $event->update();
	if(!empty($status)){
		$json['msg'] = 'success';
	} else {
		$json['msg'] = 'failed';
	}
	header('Content-Type: application/json');	
	echo '<div class="card gedf-card" style="margin: 5px;" id="dyn-'.$post['event_id'].'">
      <div class="card-body">
              <h5 class="card-title">'.$post['time_3'].'</h5>
              <h5 class="card-title">'.$post['comment_3'].'</h5>
              <h5 class="card-title">'.$post['link_3'].'</h5>
              <p class="card-text">'.$post['status_3'].'</p>
          <hr>
          <p class="card-text float-right">
            <button type="submit" class="btn btn-sm btn-outline-secondary update-event" data-ueventid="'.$post['event_id'].'">Редактировать</button>
            <button type="submit" class="btn btn-sm btn-outline-secondary delete-event" data-deventid="'.$post['event_id'].'">Удалить</button>
            </p>
      </div>                    
    </div>';
}

if(!empty($post['action']) && $post['action']=="delete") {
	$event->setEventID($post['event_id']);
  $event->setStatus($post['status']);
	$status = $event->delete();
	if(!empty($status)){
		$json['msg'] = 'success';
	} else {
		$json['msg'] = 'failed';
	}
	header('Content-Type: application/json');	
	echo json_encode($json);	
}
?>