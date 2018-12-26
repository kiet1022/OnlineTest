<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function testStatistic(){
    	$mostjoin = DB::select('CALL `GetMostJoinedTest`();');
    	$createdTest = DB::select('call GetNumberOfTestCreatedByMonth(?,?);', [10, 12]);
    	$numberOfJoinedByYear = DB::select('call GetNumberOfJoinedTestByYear(2016,2018)');
    	return view('admin.statistic.test_statistic',compact('mostjoin','createdTest','numberOfJoinedByYear'));
    }
    public function getNumberOfTestByMonth(Request $re){
    	try {
    		$beginMonth = $re->beginMonth;
    		$endMonth = $re->endMonth;
    		$static = DB::select('call GetNumberOfTestCreatedByMonth(?,?);', [$beginMonth, $endMonth]);
    		$result['success'] = true;
    		$result['response'] = $static;
    		return response()->json($result);
    	} catch (Exception $e) {
    		$result['success'] = false;
    		$result['error'] = $e->getMessage();
    		return response()->json($result);
    	}
    	
    }
    public function getNumberOfJoinedTestByYear(Request $re){
    	try {
    		$beginYear = $re->beginYear;
    		$endYear = $re->endYear;
    		$static = DB::select('call GetNumberOfJoinedTestByYear(?,?);', [$beginYear, $endYear]);
    		$result['success'] = true;
    		$result['response'] = $static;
    		return response()->json($result);
    	} catch (Exception $e) {
    		$result['success'] = false;
    		$result['error'] = $e->getMessage();
    		return response()->json($result);
    	}
    }

    public function getNumberOfJoinedTestByMonth(Request $re){
    	try {
    		$year = $re->year;
    		$beginMonth = $re->beginMonth;
    		$endMonth = $re->endMonth;
    		$static = DB::select('call GetNumberOfJoinedTestByMonth(?,?,?);', [$year,$beginMonth, $endMonth]);
    		$result['success'] = true;
    		$result['response'] = $static;
    		return response()->json($result);
    	} catch (Exception $e) {
    		$result['success'] = false;
    		$result['error'] = $e->getMessage();
    		return response()->json($result);
    	}
    }
}
