<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\RegistrantProfiles;

use Auth;
use DB;

class QualifiedController extends Controller
{
    public function index()
    {
        $data['qualifies']['IT']    = $this->queryQualifies('Information Technology');
        $data['qualifies']['ENG']   = $this->queryQualifies('Engineering');
        $data['qualifies']['BA']    = $this->queryQualifies('Business Administration');
        return view('admin/registration/registrant/list_qualifies')->with($data);
    }

    public function show()
    {

    }

    public function setConfirm($id, Request $request)
    {
        DB::table('qualified')->where('id', $id)->update(['confirm' => $request->confirmStatus]);
        return DB::table('qualified')->where('id', $id)->select('id','confirm')->get();
    }

    private function queryQualifies($faculty)
    {
        return DB::select("SELECT registrant_profiles.id, firstname, lastname, nickname, phone, 
            IFNULL(faculties.name, 'Information Technology') as faculty, 
            m1.name as 'first', m2.name as 'second', m3.name as 'third', 
            CASE `type`
                WHEN '1' THEN \"ตัวจริง\"
                WHEN '2' THEN \"ตัวสำรอง\"
            END AS 'type', sum(score) as score, gpax, school_name, school_major, profile_picture, confirm
            FROM qualified
            JOIN registrant_profiles ON registrant_profiles.id = qualified.id
            LEFT JOIN registrant_contacts ON registrant_contacts.id = qualified.id
            LEFT JOIN registrant_answers ON registrant_answers.id = qualified.id
            LEFT JOIN registrant_majors ON registrant_majors.id = qualified.id
            LEFT JOIN schools ON schools.school_id = registrant_profiles.school_id
            LEFT JOIN faculties ON faculties.id = registrant_majors.faculty
            LEFT JOIN majors ON majors.id = registrant_majors.first
            LEFT JOIN `majors` m1 on `registrant_majors`.`first` = m1.`id`
            LEFT JOIN `majors` m2 on `registrant_majors`.`second` = m2.`id` 
            LEFT JOIN `majors` m3 on `registrant_majors`.`third` = m3.`id` 
            GROUP BY registrant_profiles.id
            HAVING faculty = '$faculty'
            ORDER BY faculty DESC, type ASC, sort ASC, score DESC, gpax DESC
        ");
    }
}