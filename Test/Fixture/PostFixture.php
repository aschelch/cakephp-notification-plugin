<?php
/**
 * PostFixture
 *
 */
class PostFixture extends CakeTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'title' => 'string',
		'content' => 'text',
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
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
			'user_id' => 2,
			'title' => 'My first post',
			'content' => 'Lorem ipsum'
 		),
		array(
			'id' => 2,
			'user_id' => 2,
			'title' => 'My second post',
			'content' => 'Lorem ipsum'
 		),
	);

}
