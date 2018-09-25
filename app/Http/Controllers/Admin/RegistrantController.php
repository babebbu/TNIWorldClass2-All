<?php

namespace App\Http\Controllers\Admin;

use App\Models\RegistrantAnswers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Library\RegistrantManager;
use App\Models\RegistrantProfiles;
use App\Models\Permissions;
use App\Models\StaffsJobs;

use Auth;
use DB;

class RegistrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrants = RegistrantManager::index();
        return view('admin/registration/registrant/show_all_registrants', ['registrants' => $registrants]);
    }

    public function facebookGallery(){
        $registrants = RegistrantManager::index();
        return view('admin/registration/registrant/facebook_gallery', ['registrants' => $registrants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Library\RegistrantManager $registration
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RegistrantManager $registration)
    {
        if($registration->create($request)) {
            return "Successfully created " . $request->get('name');
        }
        else {
            return "Fail";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Library\RegistrantManager $registration
     * @return \Illuminate\Http\Response
     */
    public function show($id, RegistrantManager $registration)
    {
        /*if($registrant = $registration->read($id)){
            return view('admin/registration/registrant/show_registrant_profile', [
                'registrant' => $registrant
            ]);
        }
        else {
            return redirect(404);
        }*/

        $data['registrant'] = $this->getRegistrantGeneralInfo($id);
        return view('admin/registration/registrant/show_registrant_profile')->with($data);
    }

    public function showRegistrantProfilePicture($img)
    {
        // Security Validation, Preventing Bad Arguments
        if($img[0] == '.' || $img[0] == '/') return redirect('404');

        // Concatenating Path
        $file = base_path()."/datastore/registrants/profile_pictures/$img";

        // Open File
        if(file_exists($file)) {
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($fileInfo, $file);
            finfo_close($fileInfo);
            header("Content-Type: $mime");
            readfile($file);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function jubjub(){
        $registrants = RegistrantProfiles::where('profile_picture', '!=', '')->where('firstname', '!=', '')->orderBy('gender', 'M')->get();
        return view('admin/registration/registrant/jubjub', ['registrants' => $registrants]);
    }

    public function gradeRegistrantByFacultyIndex(Request $request){
        if(!Permissions::authorize([200,101,10,5,1], '1010'))
            return view('admin/401');
        $student_id = Auth::guard('admin')->user()->student_id;
        $faculty = $student_id[3];
        switch($faculty){
            case 1: $faculty = 'ENG'; break;
            case 2: $faculty = 'INT'; break;
            case 3: $faculty = 'BUS'; break;
        }

        $data['registrants'] = RegistrantProfiles::join('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
                                ->where('firstname', '!=', '')
                                ->whereNotNull('facebook_id')
                                ->where('registrant_majors.faculty', 'LIKE', $faculty)
                                //->where('registrant_profiles.lock_worldclass', 10)
                                //->orderBy('registrant_profiles.id', 'DESC')
                                ->orderBy('registrant_profiles.id', 'ASC')
                                ->get();
        return view('admin/registration/registrant/show_all_registrant_by_faculty')->with($data);
    }

    public function gradeRegistrantByEmoIndex(Request $request){
        $data['registrants'] = RegistrantProfiles::join('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
            ->where('firstname', '!=', '')
            ->whereNotNull('facebook_id')
            //->orderBy('registrant_profiles.id', 'DESC')
            ->where('registrant_profiles.lock_worldclass', 10)
            ->orderBy('registrant_profiles.id', 'ASC')
            ->get();
        return view('admin/registration/registrant/show_all_registrant_by_emo')->with($data);
    }

    public function gradeRegistrantByFacultyProfile($registrant_id){
        if(!Permissions::authorize([200,101,10,5,1], '1010'))
            return view('admin/401');
        $student_id = Auth::guard('admin')->user()->student_id;
        $faculty = $student_id[3];
        switch($faculty){
            case 1: $faculty = 'ENG'; break;
            case 2: $faculty = 'INT'; break;
            case 3: $faculty = 'BUS'; break;
        }
        $data['registrant'] = RegistrantProfiles::join('registrant_contacts', 'registrant_profiles.id', '=', 'registrant_contacts.id')
                                ->join('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
                                ->join('schools', 'registrant_profiles.school_id', '=', 'schools.school_id')
                                ->join('facebook_registrants', 'registrant_profiles.facebook_id', '=', 'facebook_registrants.facebook_id')
                                ->where('registrant_profiles.id', $registrant_id)
                                ->first();
        $data['answers'] = RegistrantAnswers::join('questions', 'registrant_answers.question_id', '=', 'questions.question_id')
                            ->where('registrant_answers.id', '=', $registrant_id)
                            ->where('registrant_answers.question_id', 'LIKE', "$faculty%")
                            ->get();
        $data['where'] = 'faculty';
        return view('admin/registration/registrant/show_registrant_answers')->with($data);
    }

    public function gradeRegistrantByEmoProfile($registrant_id){
        $data['registrant'] = RegistrantProfiles::join('registrant_contacts', 'registrant_profiles.id', '=', 'registrant_contacts.id')
            ->join('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
            ->join('schools', 'registrant_profiles.school_id', '=', 'schools.school_id')
            ->join('facebook_registrants', 'registrant_profiles.facebook_id', '=', 'facebook_registrants.facebook_id')
            ->where('registrant_profiles.id', $registrant_id)
            ->first();
        $data['answers'] = RegistrantAnswers::join('questions', 'registrant_answers.question_id', '=', 'questions.question_id')
            ->where('registrant_answers.id', '=', $registrant_id)
            ->where('registrant_answers.question_id', 'LIKE', 'EMO%')
            ->get();
        $data['where'] = 'emo';
        return view('admin/registration/registrant/show_registrant_answers')->with($data);
    }

    public function getMTFile($id, $filename){
        // Security Validation, Preventing Bad Arguments
        if($filename[0] == '.' || $filename[0] == '/') return redirect('404');

        // Concatenating Path
        $file = base_path()."/datastore/registrants/mt_portfolio/$filename";

        // Open File
        if(file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit();
        }
    }

    public function updateScore($where, $id, Request $request){
        $score = $request->except('_token'); // It is $request->all()->except('_token');
        foreach($score as $key => $value){
            if(substr($key,0,8) != 'comment-') {
                if(!$value && !is_numeric($value)) $value = -1;
                RegistrantAnswers::where('id', $id)->where('question_id', $key)->update(['score' => $value]);
            }
            else if(substr($key,0,8) == 'comment-'){
                RegistrantAnswers::where('id', $id)->where('question_id', substr($key,8))->update(['comment' => $value]);
            }
        }
        return redirect("admin/registrants/grade/$where");
    }

    public function showSakuraIT(){
        // Department, Rule ID
        if(!Permissions::authorize([200,101,10,5,1], '1010'))
            return view('admin/401');
        $data['registrants'] = DB::select('SELECT *, hiw.profile_picture as profile_picture FROM `HiwDekIT` hiw JOIN registrant_profiles rp ON rp.id = hiw.id where rp.facebook_id is null ORDER BY hiw.gpax DESC');
        return view('admin/registration/registrant/sakura_it')->with($data);
    }
    
    public function updateSakuraIT($id, Request $request){
        if(!Permissions::authorize([200,101,10,5,1], '1010'))
            return view('admin/401');
        DB::table('HiwDekIT')->where('id', $id)->update(['approved' => $request->input('approved')]);
        return redirect('admin/registrants/grade/sakura-it');
    }

    public function ITsummary(){
        $data['registrants']['confirmed'] = DB::select("
            select *, (SELECT sum(score) FROM registrant_answers WHERE id = registrant_profiles.id AND score >= 0) as totalScore 
            from `registrant_profiles` 
            inner join `registrant_majors` on `registrant_profiles`.`id` = `registrant_majors`.`id` 
            inner join `schools` on `registrant_profiles`.`school_id` = `schools`.`school_id` 
            inner join `provinces` on `schools`.`school_province` = `provinces`.`province_id`
            inner join `registrant_answers` on `registrant_profiles`.`id` = `registrant_answers`.`id`
            group by `registrant_profiles`.`id`
            having `firstname` != '' 
            and `facebook_id` is not NULL 
            and `registrant_majors`.`faculty` = 'INT'
            and totalScore >= 0
            and nickname not in ('Babe', 'Farality')
            order by totalScore desc
            ");
        $data['registrants']['unconfirmed'] = DB::select("
            select *
            from `registrant_profiles` 
            inner join `registrant_majors` on `registrant_profiles`.`id` = `registrant_majors`.`id` 
            inner join `schools` on `registrant_profiles`.`school_id` = `schools`.`school_id` 
            inner join `provinces` on `schools`.`school_province` = `provinces`.`province_id`
            where `firstname` != '' 
            and `facebook_id` is not NULL 
            and `registrant_majors`.`faculty` = 'INT'
            and `registrant_profiles`.`lock_worldclass` = 0
            and nickname not in ('Babe', 'Farality')
            order by `registrant_profiles`.`id` asc
        ");
        $data['registrants']['sakura'] = DB::table('HiwDekIT')
            ->where('registrant_profiles.gpax', '>=', '3.5')
            ->where('approved', '0')
            ->join('registrant_profiles', 'HiwDekIT.id', '=', 'registrant_profiles.id')
            ->join('registrant_contacts', 'HiwDekIT.id', '=', 'registrant_contacts.id')
            ->select('registrant_profiles.id',
                'registrant_profiles.firstname',
                'registrant_profiles.lastname',
                'registrant_profiles.nickname',
                'registrant_contacts.phone',
                'HiwDekIT.school_name',
                'HiwDekIT.school_major',
                'HiwDekIT.province_name',
                'HiwDekIT.profile_picture as profile_picture',
                'approved'
            )
            ->whereNull('facebook_id')
            ->orderBy('approved', 'DESC')
            ->get();
        $data['registrants']['sakuraApproved'] = DB::table('HiwDekIT')->where('registrant_profiles.gpax', '>=', '3.5')
            ->join('registrant_profiles', 'HiwDekIT.id', '=', 'registrant_profiles.id')
            ->join('registrant_contacts', 'HiwDekIT.id', '=', 'registrant_contacts.id')
            ->select('registrant_profiles.id',
                'registrant_profiles.firstname',
                'registrant_profiles.lastname',
                'registrant_profiles.nickname',
                'registrant_contacts.phone',
                'HiwDekIT.school_name',
                'HiwDekIT.school_major',
                'HiwDekIT.province_name',
                'HiwDekIT.profile_picture as profile_picture',
                'approved'
            )
            ->whereNull('facebook_id')
            ->where('approved', 1)
            ->orderBy('approved', 'DESC')
            ->get();
        $data['registrants']['countSakuraApproved'] = count($data['registrants']['sakuraApproved']);
        return view('admin/registration/registrant/it_summary')->with($data);
    }

    public function ENGsummary(){
        $data['registrants'] = DB::table('ENG')->get();
        return view('admin/registration/registrant/eng_summary')->with($data);
    }
    
    public function ENGsetQualify($id, Request $request){
        $registrant = DB::table('ENG')->where('id', $id)->update(['qualified' => $request->qualify]);
        return redirect('/admin/registrants/eng-summary');
    }

    private function getRegistrantGeneralInfo($registrant_id){
        return RegistrantProfiles::join('registrant_contacts', 'registrant_profiles.id', '=', 'registrant_contacts.id')
            ->join('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
            ->join('schools', 'registrant_profiles.school_id', '=', 'schools.school_id')
            ->join('facebook_registrants', 'registrant_profiles.facebook_id', '=', 'facebook_registrants.facebook_id')
            ->where('registrant_profiles.id', $registrant_id)
            ->first();
    }
}
