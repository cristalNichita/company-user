<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\BrowserExtension;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;

class BrowserExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $extensions = BrowserExtension::where(['userId' => $user->id])->orderBy('createdAt', 'desc')->get();
        $installedExtensions = BrowserExtension::where(['userId' => $user->id, 'isInstalled' => 1])->get()->count();

        $parentUserId = User::getParentUser();
        $usersIds = User::where('parentId', $parentUserId->id)->pluck('id')->toArray();
        $usersIds = array_merge($usersIds, [$parentUserId->id]);
        $productDetail = Products::where('scheduleId', $parentUserId->id)->get();
        $totalNoOfDevice = $productDetail->sum('noOfExtensions');
        $extensions2 = BrowserExtension::whereIn('userId', $usersIds)->where('isInstalled', 1)->get();
        $totalAddedExtension = $extensions2->count();

        return view('user.browser-extension.index', compact('extensions', 'installedExtensions', 'totalNoOfDevice', 'totalAddedExtension'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StorePasskey  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $systemType = CommonHelper::getOperatingSystem();
        $browser = BrowserExtension::create($request->merge(['userId' => $user->id, 'ipAddress' => $request->ip(), 'systemType' => $systemType])->all());

        if ($browser) {
            return redirect()->back()->with('success', trans('messages.browser_extensions.success'));
        }
        return redirect()->back()->with('error', trans('messages.browser_extensions.error'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extension = BrowserExtension::where('id', $id)->first();
        if ($extension) {
            $extension->delete();
            return $this->toJson([], "Browser Extension has been deleted successfully!", 1);
        }
        return $this->toJson([], trans('messages.msg.deleted.error', ['module' => 'browser extension']), 0);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadExtension($id)
    {
        $extension = BrowserExtension::where('id', $id)->first();
        if ($extension) {
            $file = public_path('Chrome-Extension-Build.zip');

            if ($extension->browserType == "Firefox") {
                $file = public_path('Firefox-Extension-Build.zip');
            }

            return response()->download($file, 'flashx-browser-extensions.zip');
        }
        return $this->toJson([], trans('messages.msg.deleted.error', ['module' => 'browser extension']), 0);
    }
}
