<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\BrowserExtension;
use App\Models\PlatformAccount;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use App\Models\HsmsTools;
use App\Models\AuditLog;
use App\Models\UserRole;
use App\Models\UserHsm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function index(): View
    {
        $user = Auth::user();
        $passwordsCount = Password::count();
        $usersCount = User::count();

        return view('user.dashboard.dashboard-2', compact('user', 'passwordsCount', 'usersCount'));
    }


    /**
     * Get Password data for chart
     *
     * @param Request $request
     * @return json
     */
    public function getPasswordChart(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {

            if ($request->filter == "Yearly") {
                $startYear = 2020; // Update this to the starting year of your data
                $currentYear = Carbon::now()->year;
                $years = range($startYear, $currentYear);

                // Initialize the data array with zeros for all years
                $result = array_fill_keys($years, 0);

                // Fetch data for each year
                $intervalData = PlatformAccount::selectRaw('YEAR(createdAt) as year, COUNT(*) as count')
                    ->where('userId', $user->id)
                    ->whereNotNull('createdAt')
                    ->groupBy('year')
                    ->pluck('count', 'year');

                // Initialize the data array with zeros for all years
                $totalPassword = array_fill_keys($years, 0);

                // Update the count in the result array
                foreach ($intervalData as $year => $count) {
                    $totalPassword[$year] = $count;
                }
            } else if ($request->filter == "Monthly") {

                $groupBy = DB::raw('MONTH(createdAt)');

                // Example query, modify as per your database structure
                $monthlyData = PlatformAccount::selectRaw("$groupBy as day_of_month, count(id) as count")
                    ->where('userId', $user->id)
                    ->groupBy('day_of_month')
                    ->get();

                $totalPassword = [];

                for ($i = 1; $i <= 12; $i++) {
                    $totalPassword[$i] = 0;
                }

                foreach ($monthlyData as $data) {
                    $totalPassword[$data->day_of_month] = $data->count;
                }
            } else if ($request->filter == "Weekly") {

                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();
                $groupByWeek = DB::raw('WEEK(createdAt)');
                $groupByDay = DB::raw('DAYOFWEEK(createdAt)');

                // Example query, modify as per your database structure
                $weeklyData = PlatformAccount::selectRaw("$groupByWeek as week, $groupByDay as day_of_week, count(id) as count")
                    ->where('userId', $user->id)
                    ->whereBetween('createdAt', [$startOfWeek, $endOfWeek])
                    ->groupBy('day_of_week')
                    ->get();

                $totalPassword = [];

                // Initialize arrays for each day of the week
                for ($i = 1; $i <= 7; $i++) {
                    $totalPassword[$i] = 0;
                }

                foreach ($weeklyData as $data) {
                    $totalPassword[$data->day_of_week] = $data->count;
                }
            }

            return $this->toJson(array_values($totalPassword));
        }
    }


    /**
     * Verify User Licence Key
     * @param $request
     * @return on user and hsmsTools status and isLicenceVerified updated
     */
    public function verifyLicenceKey(Request $request)
    {
        $user = Auth::user();
        $hsmsTool = HsmsTools::where('id', $user->hsmToolsId)->first();

        if ($request->licenceKey == $hsmsTool->licenceNumber) {
            $hsmsTool->status = 'Alloted';
            $hsmsTool->allocatedUserId = $user->id;
            $hsmsTool->save();
            $user->isLicenceVerified = 1;
            if ($user->save()) {
                return redirect()->back()->with('success', trans('messages.key-manager.verifyKey.success'));
            }
            return redirect()->back()->with('error', trans('messages.key-manager.verifyKey.error'));
        } else {
            return redirect()->back()->with('error', trans('messages.key-manager.verifyKey.error'));
        }
    }


    /**
     * Update Status Of Automatically Upload
     * @param $request
     **/
    public function updateAutomaticallyUpload(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->update(['automaticallyUpload' => $request->status]); // Adjust the model and column accordingly
            return response()->json(['success' => ($request->status == 1) ? 'Automatically upload has been enabled successfully.' : 'Automatically upload has been disabled successfully.']);
        }
        return response()->json(['error' => 'There are some problem to update status. Please try again later!']);
    }
}
