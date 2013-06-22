<?php

App::uses('ReadableBehavior', 'Readable.Model/Behavior');

class User extends CakeTestModel{

	public $actsAs = array('Notification.Notifiable');

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

		$notifications = $this->User->Notification->findAllByUserId(1);
		$this->assertEqual(1, count($notifications));
		$this->assertTrue(!empty($notifications[0]['Subject']));
		
		$this->assertTrue($this->User->notify(1, 'post_add', array('User'=>2, 'Post'=>2)));

		$notifications = $this->User->Notification->findAllByUserId(1);
		$this->assertEqual(2, count($notifications));
		$this->assertEqual(2, count($notifications[1]['Subject']));
		$this->assertEqual('Post', $notifications[1]['Subject'][0]['model']);
		$this->assertEqual(2, $notifications[1]['Subject'][0]['model_id']);

	}

	public function testNotifyWithoutUserId(){

		$notifications = $this->User->Notification->findAllByUserId(1);
		$this->assertEqual(1, count($notifications));
		$this->assertTrue(!empty($notifications[0]['Subject']));
		$this->User->id = 1;

		$this->assertTrue($this->User->notify('post_add', array('User'=>2, 'Post'=>2)));
		
		$notifications = $this->User->Notification->findAllByUserId(1);
		$this->assertEqual(2, count($notifications));
		$this->assertEqual(2, count($notifications[1]['Subject']));
		$this->assertEqual('Post', $notifications[1]['Subject'][0]['model']);
		$this->assertEqual(2, $notifications[1]['Subject'][0]['model_id']);

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