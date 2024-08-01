<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Mail\CreateOrganizer;
use App\Models\User;

class sendMailToOrganizerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sendmailtoorganizer {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $userId = $this->argument('userId');

        $user = User::find($userId);

        Log::debug($user);

        if (!empty($user)) {
            Mail::to($user->email)->send(new CreateOrganizer($user));
        }
    }
}
