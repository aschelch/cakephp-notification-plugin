<?php

App::uses('ReadableBehavior', 'Readable.Model/Behavior');

class User extends CakeTestModel{

	public $actsAs = array('Notification.Notifiable'=>array(
		'subjects' => array('Post', 'User')
	));

	public $hasMany = array('Post');

}

class Post extends CakeTestModel{

	public $belongsTo = array('User');

}


class NotifiableBehaviorTest extends CakeTestCase{

	/**
     * Fixtures associated with this test case
     *
     * @var array
     */
    var $fixtures = array(
    	'plugin.notification.user',
    	'plugin.notification.notification',
    	'plugin.notification.subject',
    	'plugin.notification.post',
    );


	/**
	 * Method executed before each test
	 *
	 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}
	
	/**
	 * Method executed after each test
	 *
	 */
	public function tearDown() {
		unset($this->User);
		parent::tearDown();
	}

	public function testNotify(){

		$notifications = $this->User->Notification->get(array('conditions'=>array('Notification.user_id'=>1)));
		$this->assertEqual(1, count($notifications));
		$this->assertTrue(!empty($notifications[0]['Post']));
		$this->assertTrue(!empty($notifications[0]['User']));
		
		$this->assertTrue($this->User->notify(1, 'post_add', array('User'=>2, 'Post'=>2)));

		$notifications = $this->User->Notification->get(array('conditions'=>array('Notification.user_id'=>1)));
		$this->assertEqual(2, count($notifications));
		$this->assertTrue(!empty($notifications[1]['Post']));
		$this->assertTrue(!empty($notifications[1]['User']));

	}

	public function testNotifyWithoutUserId(){

		$notifications = $this->User->Notification->get(array('conditions'=>array('Notification.user_id'=>1)));
		$this->assertEqual(1, count($notifications));
		$this->assertTrue(!empty($notifications[0]['Post']));
		$this->User->id = 1;

		$this->assertTrue($this->User->notify('post_add', array('User'=>2, 'Post'=>2)));
		
		$notifications = $this->User->Notification->get(array('conditions'=>array('Notification.user_id'=>1)));
		$this->assertEqual(2, count($notifications));
		$this->assertTrue(!empty($notifications[1]['Post']));
		$this->assertTrue(!empty($notifications[1]['User']));

	}

	public function testGetUnreadNotification(){
		$this->assertEqual(0, count($this->User->getUnreadNotification(1)));
		$this->assertTrue($this->User->notify(1, 'post_add', array('User'=>2, 'Post'=>2)));
		$this->assertEqual(1, count($this->User->getUnreadNotification(1)));
		$this->User->id = 1;
		$this->assertTrue($this->User->notify('post_add', array('User'=>2, 'Post'=>2)));
		$this->assertEqual(2, count($this->User->getUnreadNotification()));
	}

}