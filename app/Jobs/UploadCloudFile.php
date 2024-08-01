<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Bus\Queueable;
use App\Models\CloudFile;
use App\Models\User;

class UploadCloudFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $fileName;
    public $userId;
    public function __construct($fileName, $userId)
    {
        $this->fileName = $fileName;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $isBotUser = User::where('id', $this->userId)->value('isBOT');

        if ($isBotUser) {
            $disk = 'botFile';
            $fileName = 'botFiles/' . $this->fileName;
            $file = file_get_contents(Storage::disk($disk)->url($fileName));
            $fileName = $this->userId . '/' . $this->fileName;
        } else {
            $disk = 'public';
            $fileName = $this->userId . '/' . $this->fileName;
            $file = Storage::disk($disk)->get($fileName);
        }

        ini_set('memory_limit', '-1');
        Storage::disk('wasabi')->put($fileName, $file);
        CloudFile::where(['user_id' => $this->userId, 'fileName' => $this->fileName])->update(['wasabiFileStatus' => 1]);
        if ($isBotUser == 0)
            unlink(storage_path('app/public/' . $fileName));
    }
}
