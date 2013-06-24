<?php

class NotificationHelper extends AppHelper{
	
	public $helpers = array(
		'Html', 'Time'
	);
	
	public function display($notification, $type = false){
		return $this->_View->element('Notification/'.($type?$type.'/':'').$notification['Notification']['type'], array('data'=>$notification));
	}
	
}