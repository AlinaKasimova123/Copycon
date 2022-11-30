<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../check_for_verif.php");
include(__DIR__.'/class/EventParamForCalcClass.php');
$event = new EventParamForCalc();
$post = $_POST;
$json = array();	
if(!empty($post['action']) && $post['action']=="create") {
	$event->setMain($post['main']);
    $event->setParam($post['param']);
	$event->setStep($post['step']);
	$event->setValue($post['value']);
    $event->setStatus($post['status']);
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
              <h5 class="card-title">'.$post['main'].'</h5>
              <h5 class="card-title">'.$post['param'].'</h5>
          <div class="text-muted h7 mb-2">'.$post['step'].'</div>
          <p class="card-text">'.$post['value'].'</p>
          <p class="card-text">'.$post['status'].'</p>
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
		<input type="hidden" name="event_id" value="'.$fetchEvent['id'].'">
        <div class="row align-items-center">
          <div class="col-md-12 col-md-right">
          <div class="form-group">
          <div class="col-sm-12">       
            <select name="main" id="event-status1'.$fetchEvent['id'].'" class="form-control">';
            if($fetchEvent["main"] == "Компьютер") {
                    echo '<option value="Компьютер" selected>Компьютер</option>
              <option value="Сервер">Сервер</option>';
                } else {
                    echo '<option value="Компьютер">Компьютер</option>
              <option value="Сервер" selected>Сервер</option>';
                }
                echo'
            </select> 
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-12">
          <textarea class="form-control" id="event-param'.$fetchEvent['id'].'" name="param">'.$fetchEvent['param'].'</textarea>
        </div>
      </div>
        <div class="form-group">
        <div class="col-sm-12">
          <textarea class="form-control" id="event-main'.$fetchEvent['id'].'" name="step">'.$fetchEvent['step'].'</textarea>
        </div>
      </div>
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="event-content'.$fetchEvent['id'].'" name="value">'.$fetchEvent['value'].'</textarea>
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
                echo '</select> 
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
	$event->setMain($post['main']);
    $event->setParam($post['param']);
	$event->setStep($post['step']);
	$event->setValue($post['value']);
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
              <h5 class="card-title">'.$post['main'].'</h5>
              <h5 class="card-title">'.$post['param'].'</h5>
          <div class="text-muted h7 mb-2">'.$post['step'].'</div>
          <p class="card-text">'.$post['value'].'</p>
          <p class="card-text">'.$post['status'].'</p>
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