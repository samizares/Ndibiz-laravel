<?php 
namespace App\Newsletters;

interface NewsletterList{
	
	public function subscribeTo($listName, $email);

	public function unsubscribeFrom($listName, $email);
}