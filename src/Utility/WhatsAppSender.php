<?php
namespace App\Utility;

use Twilio\Rest\Client;

class WhatsAppSender
{
    protected $sid;
    protected $token;
    protected $from;

    public function __construct($sid, $token, $from = 'whatsapp:+14155238886')
    {
        $this->sid = $sid;
        $this->token = $token;
        $this->from = $from;
    }

    public function send($to, $message)
    {
        $client = new Client($this->sid, $this->token);
        return $client->messages->create(
            'whatsapp:' . $to,
            [
                'from' => $this->from,
                'body' => $message
            ]
        );
    }
}
