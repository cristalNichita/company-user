<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Rules\ReCaptchaRule;
use Illuminate\Http\Request;
use App\Models\NewsLetter;
use App\Models\ContactUs;
use App\Models\Schedule;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact-us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        $contactUs = new ContactUs();
        $contactUs->fill($request->all());

        if ($contactUs->save()) {

            return redirect(route('contactUsForm'))->with('success', trans('messages.conatct-us.created.success'));
        }
        return redirect(route('contactUsForm'))->with('error', trans('messages.conatct-us.created.error'));
    }

    /**
     * Contact Us Request Save
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contactUsRequestSave(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptchaRule]
        ]);

        DB::beginTransaction();

        $save = Schedule::create($request->merge(['type' => 'Contact'])->all());
        if ($save) {

            DB::commit();
            return redirect('contact-us-create')->with('success', trans('messages.conatct-us.created.success'));
        }
        return redirect('contact-us-create')->with('error', trans('messages.conatct-us.created.error'));
    }

    public function newsletterPost(Request $request)
    {
        DB::beginTransaction();
        $exists = NewsLetter::where('email', $request->email)->first();
        if ($exists) {
            return $this->toJson([], trans('messages.conatct-us.created.success'), 1);
        }
        $save = NewsLetter::create($request->merge(['email' => $request->email])->all());
        if ($save) {
            DB::commit();
            return $this->toJson([], trans('messages.conatct-us.created.success'), 1);
        }
        return $this->toJson([], trans('messages.conatct-us.created.error'), 1);
    }
}
