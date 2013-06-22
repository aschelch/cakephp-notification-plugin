<?php
App::uses('NotificationSubject', 'Notification.Model');

/**
 * NotificationSubject Test Case
 *
 */
class NotificationSubjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.notification.notification_subject',
		'plugin.notification.notification'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NotificationSubject = ClassRegistry::init('Notification.NotificationSubject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NotificationSubject);

		parent::tearDown();
	}

}
