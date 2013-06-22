<?php
App::uses('NotificationNotification', 'Notification.Model');

/**
 * NotificationNotification Test Case
 *
 */
class NotificationNotificationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.notification.notification_notification',
		'plugin.notification.user',
		'plugin.notification.club',
		'plugin.notification.city',
		'plugin.notification.province',
		'plugin.notification.state',
		'plugin.notification.country',
		'plugin.notification.activity',
		'plugin.notification.map',
		'plugin.notification.comment',
		'plugin.notification.like',
		'plugin.notification.tag',
		'plugin.notification.maps_tag',
		'plugin.notification.friendship',
		'plugin.notification.dog',
		'plugin.notification.breed',
		'plugin.notification.subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NotificationNotification = ClassRegistry::init('Notification.NotificationNotification');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NotificationNotification);

		parent::tearDown();
	}

}
