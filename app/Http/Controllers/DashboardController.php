<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        //$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(1));
        //$analyticsData2 = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
        //$analyticsData3 = Analytics::fetchMostVisitedPages(Period::days(30));
        //$analyticsData4 = Analytics::fetchTopReferrers(Period::days(30));
        //$analyticsData5 = Analytics::fetchUserTypes(Period::days(30));
        //$analyticsData6 = Analytics::fetchTopBrowsers(Period::days(30));, 'analyticsData' => $analyticsData, 'analyticsData2' => $analyticsData2, 'analyticsData3' => $analyticsData3, 'analyticsData4' => $analyticsData4, 'analyticsData5' => $analyticsData5, 'analyticsData6' => $analyticsData6
        return view('dashboard.index', ['title' => 'dashboard']);
    }
    public function viewanalytich(Request $request)
    {
        //if ($request->from && $request->to) {
            //$date1 = $request->from;
            //$date2 = $request->to;
        //}
        //$startDate = Carbon::createFromFormat('Y-m-d', $date1);
        //$endDate = Carbon::createFromFormat('Y-m-d', $date2);
        //$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::create($startDate, $endDate),);
        //$analyticsData2 = Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate, $endDate));
        //$analyticsData3 = Analytics::fetchMostVisitedPages(Period::create($startDate, $endDate));
        //$analyticsData4 = Analytics::fetchTopReferrers(Period::create($startDate, $endDate));
        //$analyticsData5 = Analytics::fetchUserTypes(Period::create($startDate, $endDate));
        //$analyticsData6 = Analytics::fetchTopBrowsers(Period::create($startDate, $endDate));, 'analyticsData' => $analyticsData, 'analyticsData2' => $analyticsData2, 'analyticsData3' => $analyticsData3, 'analyticsData4' => $analyticsData4, 'analyticsData5' => $analyticsData5, 'analyticsData6' => $analyticsData6
        return view('dashboard.index', ['title' => 'dashboard']);
    }
}
