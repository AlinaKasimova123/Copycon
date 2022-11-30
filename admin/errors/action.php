<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../check_for_verif.php");
include(__DIR__.'/class/EventClientsClass.php');
$event = new EventClientsClass();
$post = $_POST;
$json = array();
if(!empty($post['action']) && $post['action']=="create") {
    $event->setDescription($post['description']);
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
          <p class="card-text">'.$post['description'].'</p>
          <hr>
//          <p class="card-text float-right">
//            <button type="submit" class="btn btn-sm btn-outline-secondary update-event" data-ueventid="'.$status.'">Редактировать</button>
//            <button type="submit" class="btn btn-sm btn-outline-secondary delete-event" data-deventid="'.$status.'">Удалить</button>
//          </p>
      </div>                    
    </div>';
}

if(!empty($post['action']) && $post['action']=="fetch_event") {
    $event->setEventID($post['event_id']);
    $fetchEvent = $event->getEvent();
    header('Content-Type: application/json');
    echo '<form id="dynamic-post-'.$post['event_id'].'" class="dynamic-post">
	<input type="hidden" name="action" value="update">
		<input type="hidden" name="event_id" value="'.$fetchEvent['id'].'">
        <div class="row align-items-center">
          <div class="col-md-12 col-md-right">
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="event-content'.$fetchEvent['id'].'" name="image">'.$fetchEvent['image'].'</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-main" placeholder="Ссылка" name="link" value="'.$fetchEvent['link'].'">
              </div>
            </div> 
			<div class="form-group">
              <div class="col-sm-12">       
                <select name="status" id="event-status'.$fetchEvent['id'].'" class="form-control">';
                    if($fetchEvent["status"] == "Опубликовано") {
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
                <button type="button" class="btn btn-info float-right save-update" data-seventid="'.$fetchEvent['id'].'">Отправить</button>
              </div>
            </div>
        </div>
      </div>
      </form>';
}

if(!empty($post['action']) && $post['action']=="update") {
    $event->setEventID($post['event_id']);
    $event->setImage($post['image']);
    $event->setLink($post['link']);
    $event->setStatus($post['status']);
    $status = $event->update();
    if(!empty($status)){
        $json['msg'] = 'success';
    } else {
        $json['msg'] = 'failed';
    }
    header('Content-Type: application/json');
    echo '<div class="card gedf-card" style="margin: 5px;" id="dyn-'.$post['event_id'].'">
      <div class="card-body">
          <p class="card-text">'.$post['image'].'</p>
          <p class="card-text">'.$post['status'].'</p>
      </div>                    
    </div>';
}

if(!empty($post['action']) && $post['action']=="delete") {
    $event->setEventID($post['event_id']);
    $status = $event->delete();
    if(!empty($status)){
        $json['msg'] = 'success';
    } else {
        $json['msg'] = 'failed';
    }
    header('Content-Type: application/json');
    echo json_encode($json);
}

