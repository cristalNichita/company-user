<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Helpers\ImageHelper;
use App\Rules\ReCaptchaRule;
use Illuminate\Http\Request;
use App\Models\JobApplied;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Contact Us Form Submission
     **/
    public function createSchedule(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptchaRule]
        ]);

        DB::beginTransaction();

        $save = Schedule::create($request->all());
        if ($save) {

            $cmd = 'cd ' . base_path() . ' && php artisan mail:sendmailtouser ' . $save->id . '';
            exec($cmd . ' > /dev/null &');

            $cmd = 'cd ' . base_path() . ' && php artisan mail:sendmailtoadmin ' . $save->id . '';
            exec($cmd . ' > /dev/null &');

            DB::commit();
            return redirect('contact-us')->with('success', trans('messages.schedule.success'));
        }
        return redirect('contact-us')->with('error', trans('messages.schedule.error'));
    }


    /**
     * Apply Job Form Submission
     **/
    public function submitApplyForm(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptchaRule]
        ]);

        DB::beginTransaction();

        if ($request->hasFile('documentFile')) {
            $fileName = ImageHelper::uploadImage($request->documentFile, 'job');
        }

        $save = JobApplied::create($request->merge(['document' => $fileName, 'phoneNumber' => $request->phoneNumber])->all());

        if ($save) {

            DB::commit();
            return redirect('career')->with('success', trans('messages.applied_job.success'));
        }
        return redirect('career')->with('error', trans('messages.applied_job.error'));
    }
}
