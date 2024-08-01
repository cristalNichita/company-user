<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\NewsLetter;

class ComingSoonController extends Controller
{
    /**
     * This function show Coming-Soon-Page
     *
     * @return page
     **/
    public function index()
    {
        return view('coming-soon');
    }


    /**
     * This function Store Emails
     **/
    public function comingSoonStore(Request $request)
    {
        DB::beginTransaction();
        $save = NewsLetter::create(['email' => $request->email]);
        if ($save) {
            DB::commit();
            return true;
        }
        return false;
    }
}
