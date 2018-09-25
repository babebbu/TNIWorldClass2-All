<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admin;
use App\Models\RegistrantProfiles;
use App\Models\RegistrantMajors;
use DB;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admin'] = DB::table('admins')
                    ->join('staffs', 'admins.student_id', '=', 'staffs.student_id')
                    ->select('admins.username', 'staffs.firstname', 'staffs.lastname')
                    ->where('admins.username', '=', Auth::guard('admin')->user()->username)
                    ->get()[0];
        $data['totalRegistrants'] = count(RegistrantProfiles::whereNotNull('facebook_id')->where('firstname', '!=', '')->get());
        $data['confirmRegistrants'] = count(RegistrantProfiles::whereNotNull('facebook_id')->where('lock_worldclass', '!=', '0')->get());
        $data['boys'] = count(RegistrantProfiles::whereNotNull('facebook_id')->where('firstname', '!=', '')->where('gender', '=', 'M')->get());
        $data['girls'] = count(RegistrantProfiles::whereNotNull('facebook_id')->where('firstname', '!=', '')->where('gender', '=', 'F')->get());

        $data['faculty']['it'] = count(
            RegistrantProfiles::leftJoin('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
                ->select('registrant_majors.faculty')
                ->whereNotNull('facebook_id')
                ->where('firstname', '!=', '')
                ->where('faculty', '=', 'INT')
                ->get()
        );
        $data['faculty']['eng'] = count(
            RegistrantProfiles::leftJoin('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
                ->select('registrant_majors.faculty')
                ->whereNotNull('facebook_id')
                ->where('firstname', '!=', '')
                ->where('faculty', '=', 'ENG')
                ->get()
        );
        $data['faculty']['ba'] = count(
            RegistrantProfiles::leftJoin('registrant_majors', 'registrant_profiles.id', '=', 'registrant_majors.id')
                ->select('registrant_majors.faculty')
                ->whereNotNull('facebook_id')
                ->where('firstname', '!=', '')
                ->where('faculty', '=', 'BUS')
                ->get()
        );
        $data['majors'] = RegistrantMajors::select(DB::raw('faculty, first as name, count(first) as total'))
                            ->groupBy('first')->havingRaw('first IS NOT NULL')
                            ->orderBy(DB::raw('faculty, first'))
                            ->get();
        return view('admin/dashboard')->with($data);
    }
    public function viewProfile($id){
        return view('admin/user/profile');
    }
    public function showAllUsers()
    {
        $data['users'] = Admin::all();
        return view('admin/user/show_all_users', $data);
    }
    public function editUser($id)
    {
        return view('admin/user/edit');
    }
    public function deleteUser($id)
    {

    }
}
