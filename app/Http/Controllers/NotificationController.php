<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Client\Credentials\Basic;

class NotificationController extends Controller
{
    public function sendSmsNotificaition()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("3ec2d7b4", "KdBH7rEgRVNZCHwG");
        $client = new \Vonage\Client($basic);
 

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS(
                "85593771244", 
                'SourngTECH', 
                'Send SMS from Laravel 10'                
            )
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }

        // $message = $client->sms()->send([
        //     'to' => '85592771244',
        //     'from' => 'SourngTECH',
        //     'text' => 'សាកល្បងផ្ញើរសារពី Laravel 10 API'
        // ]);
 
        dd('SMS message has been delivered.');
    }
}
