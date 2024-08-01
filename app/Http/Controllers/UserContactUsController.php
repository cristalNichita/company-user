<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Schedule;

class UserContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        $user = Auth::user();
        $countryCodes = config('constant.countyCode');
        $usageConsumptionFormats = config('constant.usageConsumptionFormats');
        return view('user.contact_us.contact-us', compact('countryCodes', 'usageConsumptionFormats', 'user'));
    }

    /**
     * Store Details.
     **/
    public function createScheduleUser(Request $request)
    {
        DB::beginTransaction();

        $save = Schedule::create($request->all());

        if ($save) {
            DB::commit();
            return redirect(route('dashboardPage'))->with('success', trans('messages.user_contact_us.success'));
        }
        return redirect(route('userContactUs'))->with('error', trans('messages.user_contact_us.error'));
    }
}
