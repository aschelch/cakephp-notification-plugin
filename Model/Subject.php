<?php
App::uses('NotificationAppModel', 'Notification.Model');
/**
 * Subject Model
 *
 * @property Notification $Notification
 */
class Subject extends NotificationAppModel {

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Notification' => array(
			'className' => 'Notification.Notification',
			'foreignKey' => 'notification_id',
		)
	);

}
