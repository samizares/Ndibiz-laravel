<?php namespace App\Notifications;

interface BizCreated{
	
	public function notify($title, $body);
}