<?php

namespace App\Library;

use Illuminate\Http\Request;
use App\Http\Requests;

use DB;
use App\Models\FacebookRegistrants;
use App\Models\RegistrantProfiles;
use App\Models\RegistrantContacts;
use App\Models\RegistrantMedicals;
use App\Models\RegistrantMajors;
use App\Models\RegistrantAnswers;

use App\Interfaces\ResourcesManager;

class RegistrantManager implements ResourcesManager
{
    public static function index() {
        /*return DB::table('registrant_profiles')
                ->leftJoin('facebook_registrants', 'registrant_profiles.facebook_id', '=', 'facebook_registrants.facebook_id')
                ->leftJoin('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
                ->leftJoin('majors', 'registrant_majors.first', '=', 'm1.id')
                ->leftJoin('majors', 'registrant_majors.second', '=', 'm2.id')
                ->whereNotNull('registrant_profiles.facebook_id')
                ->where('firstname', '!=', '')
                ->get();*/
        return DB::select('
            select registrant_profiles.id, concat(firstname, " ", lastname) "fullname", nickname, m1.name "first", m2.name "second", m3.name "third", profile_picture, lock_worldclass, phone, school_name
            from `registrant_profiles` 
            left join `facebook_registrants` on `registrant_profiles`.`facebook_id` = `facebook_registrants`.`facebook_id` 
            left join `registrant_contacts` on `registrant_profiles`.`id` = `registrant_contacts`.`id`
            left join `registrant_majors` on `registrant_profiles`.`id` = `registrant_majors`.`id` 
            left join `schools` on `registrant_profiles`.`school_id` = `schools`.`school_id`
            left join `majors` m1 on `registrant_majors`.`first` = m1.`id`
            left join `majors` m2 on `registrant_majors`.`second` = m2.`id` 
            left join `majors` m3 on `registrant_majors`.`third` = m3.`id` 
            where `registrant_profiles`.`facebook_id` is not null and firstname != ""
            order by registrant_profiles.id desc
        ');
        /*return DB::table('registrant_profiles')
                ->select('*')
                ->get();*/
    }
    public function create($request){
        $fbAccount = new FacebookRegistrants();

        $profile = new RegistrantProfiles();
        $registrant['contact'] = new RegistrantContacts();
        $registrant['medical'] = new RegistrantMedicals();
        $registrant['major']   = new RegistrantMajors();
        $registrant['answer']  = new RegistrantAnswers();
        //var_dump($request['id']);
        $fbAccount->facebook_id = (isset($request['facebook_id'])) ? $request['facebook_id'] : $request['sakura_facebook_id'];
        $fbAccount->camp        = (isset($request['facebook_id'])) ? 1 : 2;
        $fbAccount->name        = $request['facebook_name'];

        if($fbAccount->save()){
            $profile->facebook_id = (isset($request['facebook_id'])) ? $request['facebook_id'] : null;
            $profile->sakura_facebook_id = (isset($request['sakura_facebook_id'])) ? $request['sakura_facebook_id'] : null;
            $profile->citizen = $request['citizen'];
            $profile->save();

            $account = $profile->where('citizen', $request['citizen'])->first()->id;

            foreach($registrant as $entity){
                $entity->id = $account;
                $entity->save();
            }

            return $account;
        }
    }
    public static function read($id) {
        return DB::table('registrant_profiles')
                ->join('schools', 'registrant_profiles.school_id', '=', 'schools.school_id')
                ->join('provinces as schoolProvince', 'schools.school_province', '=', 'schoolProvince.province_id')
                ->join('registrant_contacts', 'registrant_profiles.id', '=', 'registrant_contacts.id')
                ->join('provinces as registrantProvince', 'registrant_contacts.province', '=', 'registrantProvince.province_id')
                ->select('registrant_profiles.*', 'schools.*', 'schoolProvince.province_name as school_province', 'registrant_contacts.*', 'registrantProvince.province_name as province')
                ->where('registrant_profiles.id', '=', $id)
                ->first();
    }
    public static function getRegistrantByFacebook($facebook_id){
        //echo $facebook_id;
        $registrant = FacebookRegistrants::where('facebook_id', $facebook_id)->first();
        if($registrant){
            return DB::table('registrant_profiles')
                ->select('id')
                ->where('facebook_id', $facebook_id)
                ->orWhere('sakura_facebook_id', $facebook_id)
                ->first()->id;
        }
        else{
            return 0;
        }
    }
    public static function getRegistrantByCitizen($citizen_id){
        //echo $citizen_id;
        $registrant = RegistrantProfiles::where('citizen', $citizen_id)->first();
        if($registrant){
            return DB::table('registrant_profiles')
                ->select('id')
                ->where('citizen', $citizen_id)
                ->first()->id;
        }
        else{
            return 0;
        }
    }
    public static function getFacebookIDByRegistrantID($id){
        $registrant = RegistrantProfiles::where('id', $id)->first();
        if($registrant){
            return DB::table('registrant_profiles')
                ->select('facebook_id')
                ->where('id', $id)
                ->first()
                ->id;
        }
        else{
            return 0;
        }
    }

    public static function update($id) {
        return "Update";
    }

    public static function drop($id) {
        return "Delete (Drop)";
    }
}

?>