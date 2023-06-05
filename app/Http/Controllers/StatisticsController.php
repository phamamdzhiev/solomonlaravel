<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = DB::table('page_visits');
        $day = $statistics
            ->select('full_url', DB::raw('COUNT(*) as count'))
            ->whereBetween(
                'created_at',
                [now()->startOfDay(), now()->endOfDay()]
            )
            ->groupBy(['full_url'])
            ->distinct()
            ->orderByDesc('count')
            ->get();

        $total = $day->sum('count');
        $unique = $day->count();
        return view('admin.statistics.index', compact('day', 'total', 'unique'));
    }

    public function week()
    {
        $statistics = DB::table('page_visits');
        $week = $statistics
            ->select('full_url', DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy(['full_url'])
            ->orderByDesc('count')
            ->distinct()
            ->get();

        $total = $week->sum('count');
        $unique = $week->count();

        return view('admin.statistics.week', compact('week', 'total', 'unique'));
    }

    public function month()
    {
        $statistics = DB::table('page_visits');
        $month = $statistics
            ->select('full_url', DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->groupBy(['full_url'])
            ->orderByDesc('count')
            ->distinct()
            ->get();

        $total = $month->sum('count');
        $unique = $month->count();

        return view('admin.statistics.month', compact('month', 'total', 'unique'));
    }
}
