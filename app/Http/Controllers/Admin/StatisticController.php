<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function testStatistic(){
    	$mostjoin = DB::select('CALL `GetMostJoinedTest`();');
    	return view('admin.statistic.test_statistic',compact('mostjoin'));
    }
}
