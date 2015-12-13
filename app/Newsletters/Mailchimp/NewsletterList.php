<?php namespace App\Newsletters\Mailchimp;

use App\Newsletters\NewsletterList as NewsletterListInterface;
use Mailchimp;

class NewsletterList implements NewsletterListInterface{

	protected $mailchimp;

	protected $lists= [
	
		'BeazeaDirSubscribers' =>'769c3364a9'
	];

	function __construct(Mailchimp $mailchimp)
	{
		$this->mailchimp=$mailchimp;
	}

	public function subscribeTo($listName, $email)
	{ 
		return $this->mailchimp->lists->subscribe(
			$this->lists[$listName],
			['email'=>$email],
			null, //merge vars
			'html', //email type
			false, //require double opt in?
			true // update existing cutomers
			);

	}

	public function unsubscribeFrom($listName,$email)
	{
		return $this->mailchimp->lists->unsubscribe(
			$this->lists[$listName],
			['email'=>$email],
			false, //delete the member permanently
			false, //send goodbye email
			false //send unsubscribe notification email
			);

	}
}