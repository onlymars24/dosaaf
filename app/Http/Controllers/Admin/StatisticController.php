<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function show(){
        $arr = [];
        $users = User::all();

        //количество пользователей
        $arr['usersAmount'] = $users->count();

        //количество новых пользователей
        $dateOneMonthAgo = date('Y-m-d H:i:s', strtotime("-1 month"));
        $arr['newUsersAmount'] = User::where(
            'created_at', '>', $dateOneMonthAgo
        )->count();

        //количество активных пользователей
        $dateOneDayAgo = date('Y-m-d H:i:s', strtotime("-1 day"));
        $arr['activeUsersAmount'] = User::where(
            'last_active', '>', $dateOneDayAgo
        )->count();

        //все купленные курсы с общей выручкой
        $arr['bought'] = [];
        $progress = Progress::all();
        $arr['bought']['amount'] = $progress->count();
        $arr['bought']['entirePrice'] = 0;
        foreach($progress as $el){
            $arr['bought']['entirePrice'] += $el->course->price;
        }
        $arr['newUsersAmount'] = User::where(
            'created_at', '>', $dateOneMonthAgo
        )->count();

        //все купленные курсы с общей выручкой за месяц
        $month = date('m');
        $year = date('Y');
        $monthBegin = $year.'-'.$month.'-01 00:00:00';
        $arr['boughtForMonth'] = [];
        $progressForOneMonth = Progress::where('created_at', '>', $monthBegin)->get();
        $arr['boughtForMonth']['amount'] = $progressForOneMonth->count();
        $arr['boughtForMonth']['entirePrice'] = 0;
        foreach($progressForOneMonth as $el){
            $arr['boughtForMonth']['entirePrice'] += $el->course->price;
        }
        
        //информация о каждом курсе
        $arr['courses'] = [];
        $courses = Course::all();
        foreach($courses as $course){
            $temp = [];
            $temp['course'] = $course;
            $temp['bought'] = $course->users->count();
            $temp['passed'] = Progress::where([
                ['course_id', '=', $course->id],
                ['passed', '=', 1]
            ])->count();
            $arr['courses'][] = $temp;
        }

        
        return view('admin.statistic', ['arr' => $arr]);
    }
}