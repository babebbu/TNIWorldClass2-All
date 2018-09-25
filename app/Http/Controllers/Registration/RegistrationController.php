<?php

namespace App\Http\Controllers\Registration;
header('Access-Control-Allow-Origin: *');

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FacebookRegistrants;
use App\Library\RegistrantManager;
use App\Models\RegistrantProfiles;
use App\Models\RegistrantContacts;
use App\Models\RegistrantMajors;
use App\Models\RegistrantMedicals;
use App\Models\RegistrantAnswers;
use App\Models\Schools;
//use App\Models\Provinces;

use DB;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        return view('public/registration');
    }

    public function authen(Request $request)
    {
        $all = $request->all();
        $facebook_id = $request->input('facebook_id');
        //var_dump($facebook_id);
        $sakura_facebook_id = $request->input('sakura_facebook_id');
        $facebook_name = $request->input('facebook_name');
        $citizen = $request->input('citizen');
        $registrant = RegistrantManager::getRegistrantByCitizen($citizen);
        //var_dump($registrant);
        // BE CAREFUL! STRING CAN NOT BE RETURN. ONLY OBJECT, ARRAY AND NUMERIC CAN BE RETURN
        if($registrant) {
            // CHECK AND UPDATE FACEBOOK ID AND SAKURA FACEBOOK ID HERE
            // USE ID OR CITIZEN ID TO QUERY BOTH CAMP FACEBOOK AND CHECK FOR NULLABLE
            $registrantProfile = RegistrantProfiles::find($registrant);
            $fbQueryID = (isset($facebook_id)) ? $facebook_id : $sakura_facebook_id;
            $fbAccount = FacebookRegistrants::where('facebook_id', $fbQueryID)->first();
            if(!$fbAccount) {
                $fbAccount = new FacebookRegistrants();
                $fbAccount->facebook_id = (isset($facebook_id)) ? $facebook_id : $sakura_facebook_id;
                $fbAccount->name = $facebook_name;
                $fbAccount->camp = (isset($facebook_id)) ? 1 : 2;
                $fbAccount->save();

                if (isset($facebook_id)) $registrantProfile->facebook_id = $facebook_id;
                if (isset($sakura_facebook_id)) $registrantProfile->sakura_facebook_id = $sakura_facebook_id;
                $registrantProfile->save();
            }
        }
        else{
            // Register new account, Then return registrant_profile->id
            $registrantManager = new RegistrantManager();
            if($registrantManager->create($all)){
                $registrant =  RegistrantManager::getRegistrantByCitizen($citizen);

            }
            
        }
            $data['profile'] = RegistrantProfiles::select('*')
            ->leftJoin('schools','registrant_profiles.school_id','=','schools.school_id')
            ->leftJoin('provinces','schools.school_province','=','provinces.province_id')
            ->where('id',$registrant)->first();
            $data['contact'] = RegistrantContacts::where('id',$registrant)
            ->leftJoin('provinces','registrant_contacts.province','=','provinces.province_id')
            ->first();
            $data['major']   = RegistrantMajors::where('id',$registrant)->first();
            $data['medical'] = RegistrantMedicals::where('id',$registrant)->first();

            $data['question'] = DB::table('questions')->select('*')->get();
            $data['answer']  = RegistrantAnswers::where('id',$registrant)->first();

            // Set Birthdate to a correct format
            $birthdate = $data['profile']['birthdate']; // String YYYY-MM-DD
            $birthdate = explode('-', $birthdate); // Split by slash [0 => YYYY, 1 => MM, 2 => DD]
            $data['profile']['birthdate'] = $birthdate[2].'/'.$birthdate[1].'/'.$birthdate[0]; // DD/MM/YYYY
            $data['provinces'] = DB::table('provinces')->select('province_name')->get();
            $data['knowus'] = DB::table('registrant_know_us')->where('id',$registrant)->select('*')->get();
            $data['answer'] = DB::table('registrant_answers')->where('id',$registrant)->select('*')->get();
            return $data;
    }

    /**
     * Use this method to identify the request to protect some threats
     * @param $id : integer
     * @param $facebook_id : integer or string
     */
    public function identifyRequest($request){
        //$registrant =  RegistrantManager::getRegistrantByFacebook($facebook_id);
    }

    /*public function getRegistrantProfile(){
        $data['profile'] = RegistrantProfiles::select('*')
            ->leftJoin('schools','registrant_profiles.school_id','=','schools.school_id')
            ->leftJoin('provinces','schools.school_province','=','provinces.province_id')
            ->where('id',$registrant)->first();
        $data['contact'] = RegistrantContacts::where('id',$registrant)->first();
        $data['major']   = RegistrantMajors::where('id',$registrant)->first();
        $data['medical'] = RegistrantMedicals::where('id',$registrant)->first();
        $data['answer']  = RegistrantAnswers::where('id',$registrant)->first();
        return $data;
    }*/

    public function checkSchool(Request $request)
    {

        if($request->input('school')!=null)
        {
            $schools = DB::table('schools')->select('school_name')->get();
            $Show = array() ;
            $number=0;
            foreach($schools as $school)
            {
                $end1 =  strlen($request->input('school')) ;
                for($i = 0 ; $i<strlen($school->school_name);$i++)
                {
                
                    if($end1 > strlen($school->school_name))
                    break;

                    //var_dump(substr($school->school_name,$i,$end1)); echo ' ';
                    //var_dump($request->input('school')); echo '<br>';

                    if(substr($school->school_name,$i,$end1) == $request->input('school'))
                    {
                        $Show[$number++] = $school->school_name;
                        break;
                    }
                }
            }
        $data['school'] = $Show;
        return $data;
         }
        return "";
    }

    public function create(Request $request)
    {
        
    }

    public function show($id, $facebook_id)
    {

    }

    public function edit($id)
    {
        //
    }

    /**
     * Overload Method Routing
     * Route Mode : Static (Manual Code)
     * @param Request $request
     */
    public function update(Request $request)    
    {
        header('Access-Control-Allow-Origin: *');
        /**
         * $step : integer <= Define by POST request
         */
        $checkDatabase = DB::table('registrant_profiles')
                            ->where('facebook_id',$request->input('facebook_id'))
                            ->orWhere('sakura_facebook_id',$request->input('facebook_id'))
                            ->select('*')
                            ->get();
        if($checkDatabase){
	        $step = $request->input('step');
	        /**
	         * Static Route for each step, use switch case
	         */
	        switch ($step) {
	            case 2 : $this->updateProfile($request); break;
	            case 3 : $this->updateContact($request); break;
	            case 4 : $this->updateMedical($request); break;
	            case 5 : $this->updateMajor($request); break;
	            case 6 : $this->updateFacultyQuiz($request); break;
	            case 7 : $this->updateEmotionalQuiz($request); break;
	        }
	    }
        return 1;
    }
    public function updateProfile($request)
    {
        header('Access-Control-Allow-Origin: *');
        // Retrieve Tables
        $provinces = DB::table('provinces')->select('*')->get();
        $schools   = DB::table('schools')->select('*')->get();

        // Construct Attributes
        $value_province = "";
        $school_id = "";

        // Find and Set Province Value
        foreach ($provinces as $province) {
            if(trim($province->province_name," ") == trim($request->input('school_province')," ")){
                $value_province = $province->province_id;
                break;
            }
        }

        // Find and Set School Value
        foreach ($schools as $school) {
            if($school->school_name == $request->input('school')){
                $school_id = $school->school_id;
                break;
            }
        }

        // If School not found on database, Insert it as a new row
        if ($school_id == "") {
            $create = new Schools();
            $create->school_name = $request->input('school');
            $create->school_province = $value_province;
            $create->save();
        }

            $updateSchool = DB::table('registrant_profiles')
            ->where('id',$request->input('id'))
            ->update(['school_id'=>$school_id]);


        // Set Birthdate to a correct format
        $birthdate = $request->input('birthdate'); // String DD/MM/YYYY
        $birthdate = explode('/', $birthdate); // Split by slash [0 => DD, 1 => MM, 2 => YYYY]
        $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0]; // YYYY-MM-DD

        // Set Citizen ID
        $citizen = $request->input('citizen');
        $citizen = str_replace('-', '', $citizen);
        $citizen = str_replace(' ', '', $citizen);

        // Update
        $profile = DB::table('registrant_profiles')
            ->where('id',$request->input('id'))
            ->update([
                'title'         => $request->input('title') ,
                'firstname'     => $request->input('firstname'),
                'lastname'      => $request->input('lastname'),
                'nickname'      => $request->input('nickname'),
                'gender'        => $request->input('gender'),
                'birthdate'     => $birthdate,
                'ethnicity'     => $request->input('ethnicity'),
                'nationality'   => $request->input('nationality'),
                'religious'     => $request->input('relogious'),
                'quota'         => $request->input('quota'),
                'school_major'  => $request->input('school_major'),
                'gpax'          => $request->input('gpax')
            ]);

        // Return Query State
        return $profile;
    }
    private function updateContact($request)
    {
        header('Access-Control-Allow-Origin: *');
        $provinces = DB::table('provinces')->select('*')->get();
        // Construct Attributes
        $value_province = "";
        $school_id = "";

        // Find and Set Province Value
        foreach ($provinces as $province) {
            if(trim($province->province_name," ") == trim($request->input('province')," ")){
                $value_province = $province->province_id;
                break;
            }
        }

        $contact = DB::table('registrant_contacts')
        ->where('id',$request->input('id'))
        ->update([
            'address'               => $request->input('address'),
            'district'              => $request->input('district'),
            'province'              => $value_province,
            'postal'                => $request->input('postal'),
            'phone'                 => $request->input('phone'),
            'email'                 => $request->input('email'),
            'blog'                  => $request->input('blog'),
            'parent_name'           => $request->input('parent_name'),
            'parent_relationship'   => $request->input('parent_relationship'),
            'parent_phone'          => $request->input('parent_phone')
            ]);
    }
    private function updateMedical($request)
    {
        header('Access-Control-Allow-Origin: *');
        if($request->input('worldclass') == 20)
        {
        $know = DB::table('registrant_know_us')->where('id',$request->input('id'))->delete();
        $knows = DB::table('registrant_know_us')
        ->insert(array(
            array('id' => $request->input('id'),  'how' => $request->input('know1')),
            array('id' => $request->input('id'),  'how' => $request->input('know2')),
            array('id' => $request->input('id'),  'how' => $request->input('know3')),
            array('id' => $request->input('id'),  'how' => $request->input('know4')),
            array('id' => $request->input('id'),  'how' => $request->input('know5')),
            array('id' => $request->input('id'),  'how' => $request->input('know6')),
            array('id' => $request->input('id'),  'how' => $request->input('know7')),
            array('id' => $request->input('id'),  'how' => $request->input('other')),
            ));
        }
        $medicine = DB::table('registrant_medicals')
        ->where('id',$request->input('id'))
        ->update([
            'bloodtype'             => $request->input('bloodtype'),
            'foodallergy'           => $request->input('foodallergy'),
            'congenital_disease'    => $request->input('congenital_disease'),
            'medicine'              => $request->input('medicine')
            ]);
    }
    private function updateMajor($request)
    {

        $major = DB::table('registrant_majors')
        ->where('id',$request->input('id'))
        ->update([
            'faculty'           =>  $request->input('faculty'),
            'first'             =>  $request->input('first'),
            'second'            =>  $request->input('second'),
            'third'             =>  $request->input('third')
            ]);
    }
    private function updateEmotionalQuiz($request)
    {
        var_dump($request->all());
        
        $emo = DB::table('registrant_answers')
        ->where('id',$request->input('id'))
        ->whereIn('question_id',['EMO-1','EMO-2'])
        ->delete();
        
        $emoInsert = DB::table('registrant_answers')
        ->where('id',$request->input('id'))
        ->insert(array(
            array('id' => $request->input('id') , 'question_id' => 'EMO-1' , 'answer' => $request->input('question_1')),
            array('id' => $request->input('id') , 'question_id' => 'EMO-2' , 'answer' => $request->input('question_2'))
            ));
    }
    private function updateFacultyQuiz($request)
    {
        var_dump($request->all());
       $drop = DB::table('registrant_answers')
        ->where('id',$request->input('id'))
        ->where('question_id','<>','EMO-1')
        ->where('question_id','<>','EMO-2')
        ->where('question_id','<>','INT-2')
        ->delete();
        if($request->input('Faculty') == "ENG")
        {
            $insert = DB::table('registrant_answers')
                ->insert(array(
                array('id' => $request->input('id') , 'question_id' => 'ENG-1' , 'answer' => $request->input('question1')),
                array('id' => $request->input('id') , 'question_id' => 'ENG-2' , 'answer' => $request->input('question2')),
                array('id' => $request->input('id') , 'question_id' => 'ENG-3' , 'answer' => $request->input('question3'))
                ));
        }
        else if ($request->input('Faculty') == "INT")
        {
            $insert = DB::table('registrant_answers')
                ->insert(array(
                array('id' => $request->input('id') , 'question_id' => 'INT-1' , 'answer' => $request->input('question1')),
                array('id' => $request->input('id') , 'question_id' => 'INT-3' , 'answer' => $request->input('question3'))
                ));
        }
        else if ($request->input('Faculty') == "BUS")
        {
            $insert = DB::table('registrant_answers')
                ->insert(array(
                array('id' => $request->input('id') , 'question_id' => 'BUS-1' , 'answer' => $request->input('question1')),
                array('id' => $request->input('id') , 'question_id' => 'BUS-2' , 'answer' => $request->input('question2'))
                ));
        }
    }

    public function destroy($id)
    {
        //
    }
    public function updateSakura(Request $request)
    {   
        $fbAccount = new FacebookRegistrants();
        $fbAccount->facebook_id = $request->input('facebook_id');
        $fbAccount->name        = $request->input('facebook_name');

        // Set Birthdate to a correct format
        $birthdate = $request->input('birthdate'); // String DD/MM/YYYY
        $birthdate = explode('/', $birthdate); // Split by slash [0 => DD, 1 => MM, 2 => YYYY]
        $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0]; // YYYY-MM-DD

        // Set Citizen ID
        $citizen = $request->input('citizen');
        $citizen = str_replace('-', '', $citizen);
        $citizen = str_replace(' ', '', $citizen);
        

        //
        $provinces = DB::table('provinces')->select('*')->get();
        $schools   = DB::table('schools')->select('*')->get();

        // Construct Attributes
        $value_province = "";
        $school_id = "";

        // Find and Set Province Value
        foreach ($provinces as $province) {
            if(trim($province->province_name," ") == trim($request->input('school_province')," ")){
                $value_province = $province->province_id;
                break;
            }
        }

        // Find and Set School Value
        foreach ($schools as $school) {
            if($school->school_name == $request->input('school')){
                $school_id = $school->school_id;
                break;
            }
        }

        // If School not found on database, Insert it as a new row
        if ($school_id == "") {
            $create = new Schools();
            $create->school_name = $request->input('school');
            $create->school_province = $value_province;
            $create->save();
        }
        else {
            $updateSchool = DB::table('registrant_profiles')
            ->where('id',$request->input('id'))
            ->update(['school_id'=>$school_id]);
        }
        //Set Profile
        $profile                = new RegistrantProfiles();
        $profile->title         = $request->input('title');
        $profile->firstname     = $request->input('lastname');
        $profile->lastname      = $request->input('lastname');
        $profile->nickname      = $request->input('nickname');
        $profile->gender        = $request->input('gender');
        $profile->birthdate     = $request->input('birthdate');
        $profile->ethnicity     = $request->input('ethnicity');
        $profile->nationality   = $request->input('nationality');
        $profile->religious     = $request->input('relogious');
        $profile->citizen       = $citizen;
        $profile->quota         = $request->input('quota');
        $profile->school_major  = $request->input('school_major');
        $profile->gpax          = $request->input('gpax');
        //profile picture ทำไม่เป็น อิอิ เทพซ่า 5555 // ทำให้แล้ว เคนะ กูเมพกว่า 555+
        $profile->registered_camp = 2;
        $fbAccount->save();

        $contact = new RegistrantContacts();
        $contact->id = $profile->id;
        $contact->address = $request->input('address');
        $contact->district = $request->input('district');
        $contact->province = $request->input('province');
        $contact->postal = $request->input('postal');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->blog = $request->input('blog');
        $contact->parent_name = $request->input('parent_name');
        $contact->parent_relationship = $request->input('parent_relationship');
        $contact->parent_phone = $request->input('parent_phone');
        $contact->save();

        $medical = new RegistrantMedicals();
        $medical->id = $profile->id;
        $medical->bloodtype = $request->input('bloodtype');
        $medical->foodallergy = $request->input('foodallergy');
        $medical->congenital_disease == $request->input('congenital_disease');
        $medical->medicine = $request->input('medicine');
        $medical->save();
        $profile->save();
    }

    public function uploadProfilePic(Request $request){
        $file = $request->file('profile-pic');
        $data['errorMessage'] = '';
        $checkMimeType = false;
        $allowMimeType = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];
        foreach($allowMimeType as $mime){
            $checkMimeType = $checkMimeType || ($file->getMimeType() == $mime);
        }
        if(!$checkMimeType){
            $data['errorMessage'] .= "ไฟล์ภาพต้องเป็น JPG, PNG หรือ GIF เท่านั้น<br>";
        }
        if($file->getClientSize() > 2100000){
            $data['errorMessage'] .= "ไฟล์ภาพต้องไม่ใหญ่กว่า 2MB";
        }

        // Return If Error
        if($data['errorMessage']){
            return $data['errorMessage'];
        }

        $name = $request->input('registrant_id').'-'.$request->input('facebook_id').'-'.date("Ymd_His").'-'.$file->getClientOriginalName();
        $file->move('/home/worldclass/laravel/datastore/registrants/profile_pictures', $name);

        $registrant = RegistrantProfiles::find($request->input('registrant_id'));
        $registrant->profile_picture = $name;
        $registrant->save();

        return "<status>success</status>";
    }

    public function getProfilePicture($id, $facebook_id){
        // Security Validation, Preventing Bad Arguments
        if(!$id) abort(404);

        $registrant = RegistrantProfiles::find($id);
        if($registrant->facebook_id != $facebook_id) abort(404);

        // Concatenating Path
        $file = base_path()."/datastore/registrants/profile_pictures/$registrant->profile_picture";

        // Open File
        if(file_exists($file) && $registrant->profile_picture) {
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($fileInfo, $file);
            finfo_close($fileInfo);
            header("Content-Type: $mime");
            readfile($file);
        }
        else{
            $file = base_path()."/public_html/images/profile.png";
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($fileInfo, $file);
            finfo_close($fileInfo);
            header("Content-Type: $mime");
            readfile($file);
        }
    }
     public function getQuestionPicture($id, $facebook_id){
        // Security Validation, Preventing Bad Arguments
        if(!$id) abort(404);

        $registrant = RegistrantProfiles::find($id);
        if($registrant->facebook_id != $facebook_id) abort(404);

        // Concatenating Path
        $file = base_path()."/datastore/registrants/profile_pictures/$registrant->profile_picture";

        // Open File
        if(file_exists($file) && $registrant->profile_picture) {
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($fileInfo, $file);
            finfo_close($fileInfo);
            header("Content-Type: $mime");
            readfile($file);
        }
        else{
            $file = base_path()."/public_html/images/profile.png";
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($fileInfo, $file);
            finfo_close($fileInfo);
            header("Content-Type: $mime");
            readfile($file);
        }
    }
    public function uploadQuestionMT (Request $request)
    {
        $file = $request->file('question-pic');
        $data['errorMessage'] = '';
        $checkMimeType = false;
        $allowMimeType = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif','application/pdf','application/zip', 'application/x-compressed-zip', 'video/mp4', 'audio/mp4'];
        foreach($allowMimeType as $mime){
            $checkMimeType = $checkMimeType || ($file->getMimeType() == $mime);
        }
        if(!$checkMimeType){
            $data['errorMessage'] .= "ไฟล์ภาพต้องเป็น JPG, PNG หรือ GIF เท่านั้น<br>";
        }
        if($file->getClientSize() > 11000000){
            $data['errorMessage'] .= "ไฟล์ภาพต้องไม่ใหญ่กว่า 10MB";
        }

        // Return If Error
        if($data['errorMessage']){
            return $data['errorMessage'];
        }

        $name = $request->input('question_registrant_id').'-'.$request->input('question_facebook_id').'-'.date("Ymd_His").'-'.$file->getClientOriginalName();
        $file->move('/home/worldclass/laravel/datastore/registrants/mt_portfolio', $name);
        $drop = DB::table('registrant_answers')
            ->where('id',$request->input('question_registrant_id'))
            ->where('question_id','INT-2')
            ->delete();
        $update = DB::table('registrant_answers')
                    ->insert(['id'          => $request->input('question_registrant_id'),
                             'question_id'  => 'INT-2',
                             'answer'       => $name
                             ]);
        // Update Registrants_Answers, Replacing the commented lines below with your fabulous code
        /*$registrant = RegistrantProfiles::find($request->input('registrant_id'));
        $registrant->profile_picture = $name;
        $registrant->save();*/

        return "<status>success</status>";
    }
    public function getQuestion()
    {
        $data['questions'] = DB::table('questions')
        ->select('*')
        ->get();
        return $data;
    }
    public function getFacultyQuiz(Request $request)
    {
       // var_dump($request->all());
        $data['answer'] = DB::table('registrant_answers')
            ->where('id',$request->input('id'))
            ->where('question_id','!=','EMO-1')
            ->where('question_id','!=','EMO-2')
            ->select('*')
            ->get();
        $data['major'] = DB::table('registrant_majors')
            ->where('id',$request->input('id'))
            ->select('*')
            ->get();
          //  var_dump($data);

    return $data;
        
    }
    public function getProvince()
    {
        $data['province'] = DB::table('provinces')
        ->select('*')
        ->get();  
        return $data;   
    }
    public function MTQuest(Request $request)
    {
        $data['quest'] = DB::table('registrant_answers')
                        ->where('id',$request->input('id'))
                        ->where('question_id','INT-2')
                        ->select('*')
                        ->get();
                        return $data;
    }
    public function checkAll(Request $request)
    {
        $data['profile'] = RegistrantProfiles::select('*')
            ->leftJoin('schools','registrant_profiles.school_id','=','schools.school_id')
            ->leftJoin('provinces','schools.school_province','=','provinces.province_id')
            ->where('id',$request->input('registrantID'))->first();
            $data['contact'] = RegistrantContacts::where('id',$request->input('registrantID'))
            ->leftJoin('provinces','registrant_contacts.province','=','provinces.province_id')
            ->first();
            $data['major']   = RegistrantMajors::where('id',$request->input('registrantID'))->first();
            $data['medical'] = RegistrantMedicals::where('id',$request->input('registrantID'))->first();
            $fac = strtolower($data['major']->faculty).'%';
            
            $data['question_chao'] = DB::table('questions')
                                        ->where('question_id','EMO-1')
                                        ->orWhere('question_id','EMO-2')
                                        ->select('*')->get();
            $data['question_Faculty'] = DB::table('questions')
                                        ->where('question_id','like',$fac)
                                        ->select('*')->get();

            $data['answer']  = RegistrantAnswers::where('id',$request->input('registrantID'))->first();
            $birthdate = $data['profile']['birthdate']; // String YYYY-MM-DD
            $birthdate = explode('-', $birthdate); // Split by slash [0 => YYYY, 1 => MM, 2 => DD]
            $data['profile']['birthdate'] = $birthdate[2].'/'.$birthdate[1].'/'.$birthdate[0]; // DD/MM/YYYY
            $data['knowus'] = DB::table('registrant_know_us')->where('id',$request->input('registrantID'))->select('*')->get();
            $data['answer_chao'] = DB::table('registrant_answers')->where('id',$request->input('registrantID'))
        														  ->whereIn('question_id',['EMO-1','EMO-2'])
                                                                  ->select('*')->get();

            $data['answer_Faculty'] = DB::table('registrant_answers')->where('id',$request->input('registrantID'))
                                                                    ->where('question_id','like',$fac)
                                                                    ->select('*')
                                                                    ->get();
            return $data; 
    }

    public function confirm(Request $request)
    {
        $confirm = DB::table('registrant_profiles')
                    ->where('id',$request->input('id'))
                    ->update(['lock_worldclass' =>10]);
    }

    public function checkQualify(Request $request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;

        $registrant = RegistrantProfiles::where('firstname', $firstname)->where('lastname', $lastname)
            ->join('qualified', 'qualified.id', '=', 'registrant_profiles.id')
            ->join('schools', 'schools.school_id', '=', 'registrant_profiles.school_id')
            ->leftJoin('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
            ->leftJoin('faculties', 'faculties.id', '=', 'registrant_majors.faculty')
            ->select('firstname','lastname', 'nickname', 'type', 'school_name', 'faculties.name_th as faculty', 'first')
            ->first();
        return $registrant;
    }
    
}
