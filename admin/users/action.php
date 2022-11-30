<?php
require_once(__DIR__.'/../check_IP_from_white_list.php');
session_start();
require(__DIR__."/../check_for_verif.php");
include(__DIR__.'/class/EventUsersClass.php');
$event = new EventUsers();
$eventService = $event->getUsers();
$event = new EventUsers();
$post = $_POST;
$json = array();	
if(!empty($post['action']) && $post['action']=="create") {
	$event->setUserRoleId($post['user_role_id']);
	$event->setUsername($post['username']);
	$event->setEmail($post['email']);
    $event->setPassword($post['password']);
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
              <h5 class="card-title">'.$post['user_role_id'].'</h5>
              <h5 class="card-title">'.$post['username'].'</h5>
              <h5 class="card-title">'.$post['email'].'</h5>
              <h5 class="card-title">'.$post['password'].'</h5>
              <p class="card-text">'.$post['status'].'</p>
          <hr>
          <p class="card-text float-right">
            <button type="submit" class="btn btn-sm btn-outline-secondary update-event" data-ueventid="'.$status.'">Редактировать</button>
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
                <select name="user_role_id" id="event-status'.$fetchEvent['id'].'" class="form-control">';
                    if($fetchEvent["user_role_id"] == "1") {
                        echo '<option value="1" selected>Администратор</option>
                                  <option value="2">Модератор</option>';
                    } else {
                        echo '<option value="1">Администратор</option>
                                  <option value="2" selected>Модератор</option>';
                    }
                    echo '
                </select> 
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-main" placeholder="Username" name="username" value="'.$fetchEvent['username'].'">
              </div>
            </div> 
            <div class="form-group">
              <div class="col-sm-12">          
                <input type="text" class="form-control" id="event-email" placeholder="Email" name="email" value="'.$fetchEvent['email'].'">
              </div>
            </div> 
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="event-content'.$fetchEvent['id'].'" name="password">'.$fetchEvent['password'].'</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">       
                <select name="status" id="event-status'.$fetchEvent['id'].'" class="form-control">';
                    if($fetchEvent["status"] == "Вкл") {
                        echo '<option value="Вкл" selected>Вкл</option>
                        <option value="Выкл">Выкл</option>';
                    } else {
                        echo '<option value="Вкл">Вкл</option>
                        <option value="Выкл" selected>Выкл</option>';
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
	$event->setUserRoleId($post['user_role_id']);
	$event->setUsername($post['username']);
	$event->setEmail($post['email']);
  $event->setPassword($post['password']);
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
              <h5 class="card-title">'.$post['user_role_id'].'</h5>
              <h5 class="card-title">'.$post['username'].'</h5>
              <h5 class="card-title">'.$post['email'].'</h5>
              <h5 class="card-title">'.$post['password'].'</h5>
              <p class="card-text">'.$post['status'].'</p>
          <hr>
          <p class="card-text float-right">
            <button type="submit" class="btn btn-sm btn-outline-secondary update-event" data-ueventid="'.$post['event_id'].'">Редактировать</button>
          </p>
      </div>                    
    </div>';
}