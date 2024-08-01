<?php

namespace App\Console\Commands;

use App\Mail\AdminEmployeeRegistration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use App\Models\User;

class SendAdminEmployeeRegistrationMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sendadminemployeeregistrationmail {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is using for send registration mail to admin employee';

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
            Mail::to($user->email)->send(new AdminEmployeeRegistration($user));
        }
    }
}
