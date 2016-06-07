<?php
namespace App\Services\Mailers;

abstract class Mailer
{
	public function emailTo($person, $view, $data, $subject, $sender)
	{
		\Mail::queue($view, ['data'=>$data], function($message) use($person, $subject,$sender)
		{
			$message->to($person->email)
					->subject($subject)
					->from($sender);

		});
	}

	public function sendTo($users,$view, $data,$subject,$sender)
	{
		\Mail::queue($view, ['data' =>$data ], function ($message) use($sender,$subject,$users)
        {
            $message->from($sender, 'Beazea')
            		->subject($subject)
					->to($users);

        });
	}
}