<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticCourseController extends Controller
{
    public function show($id){
        $arr = [];
        $course = Course::find($id);
        //все купленные курсы с общей выручкой
        $arr['bought'] = [];
        $arr['bought']['amount'] = $course->users->count();
        $arr['bought']['entirePrice'] = 
        $arr['bought']['amount'] * $course->price;

        //все купленные курсы с общей выручкой за месяц
        $arr['boughtForMonth'] = [];
        $month = date('m');
        $year = date('Y');
        $monthBegin = $year.'-'.$month.'-01 00:00:00';
        $progressForOneMonth = Progress::where([['created_at', '>', $monthBegin],
        ['course_id', '=', $id]])->get();
        $arr['boughtForMonth']['amount'] = $progressForOneMonth->count();
        $arr['boughtForMonth']['entirePrice'] = 
        $arr['boughtForMonth']['amount'] * $course->price;

        //все студенты данного курса
        $arr['users'] = [];
        $progress = Progress::where('course_id', '=', $id)->get();
        foreach($progress as $el){
            $temp = [];
            $user = $el->user;
            $temp['SNP'] = $user->name.' '.$user->surname.' '.$user->patronymic;
            $temp['entire_progress'] = $el->entire_progress;
            $temp['id'] = $user->id;
            $arr['users'][] = $temp;
        }
        return view('admin.statistic-course', ['arr' => $arr, 'course' => $course]);
    }
}
