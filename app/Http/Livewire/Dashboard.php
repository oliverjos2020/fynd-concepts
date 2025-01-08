<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Service;
use Livewire\Component;
use App\Models\SubService;
use Illuminate\Support\Facades\DB;
// use App\Models\Vehicle;
// use App\Models\BookingOrder;


class Dashboard extends Component
{
    public function render()
    {
        // $admins = "";
        // $localClient = "";
        // $internationalClient = "";
        // $otherClient = "";

        // if(Auth()->user()->role_id == 1):
            $artisans = User::where('role_id', 2)->get();
            $users = User::where('role_id', 1)->get();
            $services = Service::all();
            $subservices = SubService::all();
        //     $internationalClient = User::where('category_id', 2)->where('role_id', 3)->get();
        //     $otherClient = User::where('category_id', 3)->where('role_id', 3)->get();

            $currentYear = Carbon::now()->year;

            $data = DB::table('users')
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                ->where('role_id', 2)
                ->whereYear('created_at', $currentYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('count', 'month')->toArray();

            // Ensure all months are represented
            $artisanChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
            foreach ($data as $month => $count) {
                $artisanChart[$month] = $count;
            }

            $data1 = DB::table('users')
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                ->where('role_id', 3)
                ->whereYear('created_at', $currentYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('count', 'month')->toArray();

            // Ensure all months are represented
            $usersChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
            foreach ($data1 as $month1 => $count1) {
                $usersChart[$month1] = $count1;
            }

        //     $data2 = DB::table('users')
        //         ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        //         ->where('category_id', 3)->where('role_id', 3)
        //         ->whereYear('created_at', $currentYear)
        //         ->groupBy(DB::raw('MONTH(created_at)'))
        //         ->pluck('count', 'month')->toArray();

        //     // Ensure all months are represented
        //     $otherChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
        //     foreach ($data2 as $month2 => $count2) {
        //         $otherChart[$month2] = $count2;
        //     }
        // elseif(Auth()->user()->role_id == 2):
        //     $admins = User::where('role_id', 2)->get();
        //     $loggedInUser = Auth()->user()->id;
        //     $localClient = User::where('category_id', 1)->where('registered_by', $loggedInUser)->where('role_id', 3)->get();
        //     $internationalClient = User::where('category_id', 2)->where('registered_by', $loggedInUser)->where('role_id', 3)->get();
        //     $otherClient = User::where('category_id', 3)->where('registered_by', $loggedInUser)->where('role_id', 3)->get();

        //     $currentYear = Carbon::now()->year;

        //     $data = DB::table('users')
        //         ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        //         ->where('category_id', 1)->where('role_id', 3)
        //         ->whereYear('created_at', $currentYear)->where('registered_by', $loggedInUser)
        //         ->groupBy(DB::raw('MONTH(created_at)'))
        //         ->pluck('count', 'month')->toArray();

        //     // Ensure all months are represented
        //     $localChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
        //     foreach ($data as $month => $count) {
        //         $localChart[$month] = $count;
        //     }

        //     $data1 = DB::table('users')
        //         ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        //         ->where('category_id', 2)->where('role_id', 3)
        //         ->whereYear('created_at', $currentYear)->where('registered_by', $loggedInUser)
        //         ->groupBy(DB::raw('MONTH(created_at)'))
        //         ->pluck('count', 'month')->toArray();

        //     // Ensure all months are represented
        //     $internationalChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
        //     foreach ($data1 as $month1 => $count1) {
        //         $internationalChart[$month1] = $count1;
        //     }

        //     $data2 = DB::table('users')
        //         ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
        //         ->where('category_id', 3)->where('role_id', 3)
        //         ->whereYear('created_at', $currentYear)->where('registered_by', $loggedInUser)
        //         ->groupBy(DB::raw('MONTH(created_at)'))
        //         ->pluck('count', 'month')->toArray();

        //     // Ensure all months are represented
        //     $otherChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
        //     foreach ($data2 as $month2 => $count2) {
        //         $otherChart[$month2] = $count2;
        //     }
        // endif;
        $pendingArtisans = User::where('is_profile_complete', 1)->where('status', 0)->where('role_id', 2)->get();

        return view('dashboard.dashboard2', ['artisans' => $artisans, 'users' => $users, 'services' => $services, 'subservices' => $subservices, 'artisanChart' => $artisanChart, 'usersChart' => $usersChart, 'pendingArtisans' => $pendingArtisans])->layout('components.dashboard.dashboard-master');
        return view('dashboard.dashboard2')->layout('components.dashboard.dashboard-master');

    }
}
