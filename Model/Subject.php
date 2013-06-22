<?php
App::uses('NotificationAppModel', 'Notification.Model');
/**
 * Subject Model
 *
 * @property Notification $Notification
 */
class Subject extends NotificationAppModel {

	public $recursive = 1;

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

	public function afterFind($results, $primary = false){
		foreach ($results as $k => $result) {
			$model = $result['Subject']['model'];
			if(array_key_exists($model, $result)){
				$results[$k] = $result[$this->alias]+array($model => $result[$model]);
				//$results[$k] = array($this->alias=>$result[$this->alias]+array($model => $result[$model]));
			}
		}
		return $results;
	}

}
