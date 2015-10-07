<?php namespace App\Notifications\Mailchimp;

use App\Notifications\BizCreated as BizCreatedInterface;
use Mailchimp;

class BizCreated implements BizCreatedInterface{

	const BiZ_SUBSCRIBERS_ID='769c3364a9';

	protected $mailchimp;

	function __construct(Mailchimp $mailchimp)
	{
		$this->mailchimp=$mailchimp;
	}
	
	public function notify($title, $body)
	{
		$options=[
			'list_id'= self::BiZ_SUBSCRIBERS_ID,
			'subject' => 'New Biz added On Beazea:'. $title,
			'from_name'=> 'Beazea Biz Directory',
			'from_email'=> 'samizares@hotmail.com',
			'to_name'  => 'Beazea Business Subscriber'
		];

		$content =[
		'html'=>$body,
		'text'=>strip_tags($body)

		];

		$campaign =$this->mailchimp->campaigns->create('regular',$options, $content);

		$this->mailchimp->campaigns->send($campaign['id']);
	}
}