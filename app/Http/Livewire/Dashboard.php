<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// use App\Models\Vehicle;
// use App\Models\BookingOrder;


class Dashboard extends Component
{
    public function render()
    {
        if(Auth()->user()->role_id == 1):
            $admins = User::where('role_id', 2)->get();
            $localClient = User::where('category_id', 1)->where('role_id', 3)->get();
            $internationalClient = User::where('category_id', 2)->where('role_id', 3)->get();
            $otherClient = User::where('category_id', 3)->where('role_id', 3)->get();

            $currentYear = Carbon::now()->year;

            $data = DB::table('users')
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                ->where('category_id', 1)->where('role_id', 3)
                ->whereYear('created_at', $currentYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('count', 'month')->toArray();

            // Ensure all months are represented
            $localChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
            foreach ($data as $month => $count) {
                $localChart[$month] = $count;
            }

            $data1 = DB::table('users')
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                ->where('category_id', 2)->where('role_id', 3)
                ->whereYear('created_at', $currentYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('count', 'month')->toArray();

            // Ensure all months are represented
            $internationalChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
            foreach ($data1 as $month1 => $count1) {
                $internationalChart[$month1] = $count1;
            }

            $data2 = DB::table('users')
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                ->where('category_id', 3)->where('role_id', 3)
                ->whereYear('created_at', $currentYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('count', 'month')->toArray();

            // Ensure all months are represented
            $otherChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
            foreach ($data2 as $month2 => $count2) {
                $otherChart[$month2] = $count2;
            }
        elseif(Auth()->user()->role_id == 2):
            $admins = User::where('role_id', 2)->get();
            $loggedInUser = Auth()->user()->id;
            $localClient = User::where('category_id', 1)->where('registered_by', $loggedInUser)->where('role_id', 3)->get();
            $internationalClient = User::where('category_id', 2)->where('registered_by', $loggedInUser)->where('role_id', 3)->get();
            $otherClient = User::where('category_id', 3)->where('registered_by', $loggedInUser)->where('role_id', 3)->get();

            $currentYear = Carbon::now()->year;

            $data = DB::table('users')
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                ->where('category_id', 1)->where('role_id', 3)
                ->whereYear('created_at', $currentYear)->where('registered_by', $loggedInUser)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('count', 'month')->toArray();

            // Ensure all months are represented
            $localChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
            foreach ($data as $month => $count) {
                $localChart[$month] = $count;
            }

            $data1 = DB::table('users')
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                ->where('category_id', 2)->where('role_id', 3)
                ->whereYear('created_at', $currentYear)->where('registered_by', $loggedInUser)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('count', 'month')->toArray();

            // Ensure all months are represented
            $internationalChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
            foreach ($data1 as $month1 => $count1) {
                $internationalChart[$month1] = $count1;
            } 

            $data2 = DB::table('users')
                ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                ->where('category_id', 3)->where('role_id', 3)
                ->whereYear('created_at', $currentYear)->where('registered_by', $loggedInUser)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('count', 'month')->toArray();

            // Ensure all months are represented
            $otherChart = array_fill(1, 12, 0); // Fill with 0 for all 12 months
            foreach ($data2 as $month2 => $count2) {
                $otherChart[$month2] = $count2;
            }
        endif;

        return view('dashboard.dashboard2', ['admins' => $admins, 'localClient' => $localClient, 'internationalClient' => $internationalClient, 'otherClient' => $otherClient, 'localChart' => $localChart, 'internationalChart' => $internationalChart, 'otherChart' => $otherChart])->layout('components.dashboard.dashboard-master');

    }
}
