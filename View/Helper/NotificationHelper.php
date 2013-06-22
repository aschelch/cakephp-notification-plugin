<?php

class NotificationHelper extends AppHelper{
	
	public $helpers = array(
		'Html', 'Time'
	);
	
	public function display($notification){
		return $this->_View->element('Notification/'.$notification['Notification']['type'], array('data'=>$notification));
	}
	
}