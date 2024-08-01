<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Mail\AdminContactUs;
use App\Models\Schedule;
use App\Models\User;

class SendMailToAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sendmailtoadmin {userId}';

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
        $user = Schedule::find($userId);
        $admin = User::where('role', 'admin')->first();

        Log::debug($user);

        if (!empty($user)) {
            Mail::to($admin->email)->send(new AdminContactUs($user));
        }
    }
}
