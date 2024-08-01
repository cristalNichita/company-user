<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twilio\Rest\Client;


class TwilioCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twilio:sendsms {to} {body}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Twilio command is use to send sms';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $to = $this->argument('to');
        $body = $this->argument('body');

        $client = new Client(config('constant.twilio.accountSid'), config('constant.twilio.accountToken'));

        $client->messages->create($to,[
                'from' => config('constant.twilio.twilioNumber'),
                'body' => $body,
            ]
        );
    }
}
