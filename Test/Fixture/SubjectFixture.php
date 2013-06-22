<?php
/**
 * SubjectFixture
 *
 */
class SubjectFixture extends CakeTestFixture {

	public $table = "notification_subjects";
/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'notification_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'model_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'notification_id' => array('column' => array('notification_id', 'model', 'model_id'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'notification_id' => 1,
			'model' => 'Post',
			'model_id' => 1
		),
		array(
			'id' => 2,
			'notification_id' => 1,
			'model' => 'User',
			'model_id' => 2
		),
	);

}
