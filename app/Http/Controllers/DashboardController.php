<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Consultation;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Package;


class DashboardController extends Controller
{
    public function index()
{
    // ✅ Step 1: Check if the user is not authenticated
    if (!auth()->check()) {
        return redirect('/welcome'); // Redirect to welcome page
    }

    // Get the authenticated user
    $user = Auth::user();

    // Redirect to role-specific dashboard based on user role
    if ($user) {
        if ($user->role === 'customer') {
            return $this->customerDashboard($user);
        } elseif ($user->role === 'manager') {
            return $this->managerDashboard($user);
        } elseif ($user->role === 'staff') {
            return $this->staffDashboard($user);
        }
    }

    // Fallback if no role matches
    return redirect()->route('login')->with('error', 'Unauthorized access!');
}

public function customerDashboard($user)
{
    // Upcoming Appointments (Future dates and times)
    $upcomingAppointments = Appointment::where('user_id', $user->id)
        ->where(function ($query) {
            $query->where('date', '>', now()->toDateString()) // Future dates
                ->orWhere(function ($query) {
                    $query->where('date', now()->toDateString()) // Today
                        ->where('time', '>=', now()->toTimeString()); // Future times today
                });
        })
        ->orderBy('date')
        ->orderBy('time')
        ->get();

    // Appointment History (Past dates and times)
    $appointmentHistory = Appointment::where('user_id', $user->id)
        ->where(function ($query) {
            $query->where('date', '<', now()->toDateString()) // Past dates
                ->orWhere(function ($query) {
                    $query->where('date', now()->toDateString()) // Today
                        ->where('time', '<', now()->toTimeString()); // Past times today
                });
        })
        ->orderBy('date', 'desc')
        ->orderBy('time', 'desc')
        ->get();

        $currentDay = Carbon::now()->format('l'); // Get day name (e.g., "Monday")

        // Define the sunnah days
        $sunnahDays = ['Monday', 'Wednesday', 'Friday', 'Sunday'];
    
        // Calculate the next Sunnah Bekam date
        $nextSunnahDate = Carbon::now()->next(Carbon::parse($sunnahDays[0])->dayOfWeek); // Default to Monday
    
        foreach ($sunnahDays as $day) {
            $nextSunnahDate = Carbon::now()->next($day);
            if ($nextSunnahDate->isAfter(Carbon::now())) {
                break;
            }
        }
    

    return view('customer.dashboard', compact('user', 'upcomingAppointments', 'appointmentHistory','nextSunnahDate' ));
}

private function managerDashboard($user)
{
    $today = Carbon::today();

    $appointmentsToday = Appointment::whereDate('date', $today)->get();

    // Join with packages to get the total sales (price)
    $totalSalesToday = DB::table('appointments')
        ->join('packages', 'appointments.package_id', '=', 'packages.id')
        ->whereDate('appointments.date', $today)
        ->where('appointments.payment_status', 'paid')
        ->sum('packages.price');
  // Sum total sales from paid appointments for **all dates**
  $totalSalesAllTime = DB::table('appointments')
  ->join('packages', 'appointments.package_id', '=', 'packages.id')
  ->where('appointments.payment_status', 'paid')
  ->sum('packages.price');

// Count total staff users
$totalStaff = User::where('role', 'staff')->count();

// Count total customer users
$totalCustomers = User::where('role', 'customer')->count();
$totalPackages = Package::count(); // ← new line

return view('manager.dashboard', compact('appointmentsToday', 'totalSalesToday', 'totalSalesAllTime', 'totalStaff', 'totalCustomers','totalPackages'));
}

private function staffDashboard($user)
{
    $today = Carbon::today();

    $appointmentsToday = Appointment::whereDate('date', $today)->get();

    // Join with packages to get the total sales (price)
    $totalSalesToday = DB::table('appointments')
        ->join('packages', 'appointments.package_id', '=', 'packages.id')
        ->whereDate('appointments.date', $today)
        ->where('appointments.payment_status', 'paid')
        ->sum('packages.price');
  // Sum total sales from paid appointments for **all dates**
  $totalSalesAllTime = DB::table('appointments')
  ->join('packages', 'appointments.package_id', '=', 'packages.id')
  ->where('appointments.payment_status', 'paid')
  ->sum('packages.price');


$totalAppointments = Appointment::count();

// Count total customer users
$totalCustomers = User::where('role', 'customer')->count();
$totalPackages = Package::count(); // ← new line

return view('staff.dashboard', compact('appointmentsToday', 'totalSalesToday', 'totalSalesAllTime','totalCustomers','totalAppointments','totalPackages'));
}
}