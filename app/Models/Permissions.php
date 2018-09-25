<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use App\Models\StaffsJobs;

class Permissions extends Model
{
    public static function authorize($departments, $rule){

        $allowed = 0;

        if(!is_array($departments)){
            $temp = $departments;
            $departments = array();
            $departments[0] = $temp;
        }

        $student_id = Auth::guard('admin')->user()->student_id;

        $jobs = StaffsJobs::where('student_id', $student_id)->get();
        foreach($jobs as $job) {
            foreach ($departments as $department) {
                if ($job->dept_id == $department) {
                    $allowed = 1;
                    break;
                }
            }
        }
        return $allowed;
    }
}
