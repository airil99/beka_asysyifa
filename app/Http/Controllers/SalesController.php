<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Package;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class SalesController extends Controller
{
    public function dashboard(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $query = Appointment::where('payment_status', 'paid');

        // Apply date filters correctly on 'date' column
        if ($fromDate && $toDate) {
            $query->whereBetween('date', [$fromDate, $toDate]);
        } elseif ($fromDate) {
            $query->whereDate('date', $fromDate);
        } elseif ($toDate) {
            $query->whereDate('date', $toDate);
        }

        $appointments = $query->with('package')->get();

        $totalAppointments = $appointments->count();
        $totalSales = $appointments->sum(function ($appointment) {
            return $appointment->package->price ?? 0;
        });

        $packages = $appointments->groupBy('package_id')->map(function ($group) {
            return [
                'name' => optional($group->first()->package)->name ?? 'N/A',
                'count' => $group->count(),
                'subtotal' => $group->sum(fn ($a) => $a->package->price ?? 0)
            ];
        })->values();

        return view('sales.dashboard', [
            'results' => [
                'total_appointments' => $totalAppointments,
                'total_sales' => $totalSales,
                'packages' => $packages
            ]
        ]);
    }

    public function showReport(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $results = $this->getSalesData($fromDate, $toDate);

        return view('sales.report', compact('results', 'fromDate', 'toDate'));
    }

    public function downloadReportAsPDF(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $results = $this->getSalesData($fromDate, $toDate);

        $pdf = Pdf::loadView('sales.report_pdf', compact('results', 'fromDate', 'toDate'));

        return $pdf->download('sales_report_' . $fromDate . '_to_' . $toDate . '.pdf');
    }

    private function getSalesData($fromDate, $toDate)
    {
        $query = Appointment::with('package')
            ->where('payment_status', 'paid');

        if ($fromDate && $toDate) {
            $query->whereBetween('date', [$fromDate, $toDate]);
        } elseif ($fromDate) {
            $query->whereDate('date', $fromDate);
        } elseif ($toDate) {
            $query->whereDate('date', $toDate);
        }

        $appointments = $query->get();

        $totalAppointments = $appointments->count();
        $totalSales = $appointments->sum(function ($appointment) {
            return $appointment->package->price ?? 0;
        });

        $packages = $appointments->groupBy('package_id')->map(function ($group) {
            return [
                'name' => optional($group->first()->package)->name ?? 'N/A',
                'count' => $group->count(),
                'subtotal' => $group->sum(fn ($a) => $a->package->price ?? 0)
            ];
        })->values();

        return [
            'total_appointments' => $totalAppointments,
            'total_sales' => $totalSales,
            'packages' => $packages
        ];
    }
}
