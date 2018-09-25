<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Staffs;
use App\Models\FacebookStaffs;
use App\Models\Departments;
use App\Models\StaffsJobs;
use DB;

class StaffController extends Controller
{
    public function unauthorized ()
    {
        return view('staff/auth');
    }
    public function register (Request $request)
    {
        $provideUser = $request->session()->get('provideUser');

        $registered = FacebookStaffs::find($provideUser->getId());

        if ($registered) {
            return redirect('staff/profile')->with('facebook_id', $provideUser->getId());
        }

        $fb_account = new FacebookStaffs();
        $fb_account->facebook_id     = $provideUser->getId();
        $fb_account->name            = $provideUser->getName();
        $fb_account->email           = $provideUser->getEmail();
        $fb_account->avatar          = $provideUser->getAvatar();
        $fb_account->avatar_original = $provideUser->getAvatar('original');

        $request->session()->put('fb_account', $fb_account);

        $data['departments'] = Departments::all();
        $data['facebook'] 	 = $fb_account;

        return view('staff/register', $data);
    }
    public function store (Request $request)
    {
        $fb_account = $request->session()->get('fb_account');
        $fb_account->save();

        $staff = new Staffs();
        $staff->student_id         = $request->input('student_id');;
        $staff->facebook_id        = $fb_account->facebook_id;
        $staff->firstname          = $request->input('firstname');
        $staff->lastname           = $request->input('lastname');
        $staff->nickname           = $request->input('nickname');
        $staff->email              = $request->input('email');
        $staff->mobile             = $request->input('mobile');
        $staff->shirt_size         = $request->input('shirt_size');
        $staff->congenital_disease = $request->input('congenital_disease');
        $staff->food_allergies     = $request->input('food_allergies');
        $staff->save();

        if($request->input('jobs')) {
            foreach ($request->input('jobs') as $dept_id) {
                $jobs 			  = new StaffsJobs();
                $jobs->student_id = $staff->student_id;
                $jobs->dept_id 	  = $dept_id;
                $jobs->save();
            }
        }

        return view('staff/register_success');
    }
    public function profile (Request $request) 
    {
        $facebook_id 		 = $request->session()->get('facebook_id');
        $data['staff'] 		 = Staffs::where('facebook_id', $facebook_id)->first();
        $staff = Staffs::where('facebook_id', $facebook_id)->first();
        $data['staffjob'] = StaffsJobs::all();
        $data['departments'] = Departments::all();

        return view('staff/profile', $data);
    }
    public function allData()
    {
    	$data['staff'] 		 = Staffs::all();
        $data['staffjob'] = StaffsJobs::all();
        $data['departments'] = Departments::all();
    	
    	return view('staff/show',$data);
    }
    public function edit(Request $request)
    {
      $staff1 = Staffs::where('student_id',"=",$request->input('student_id'))->update(
        
        ['student_id' => $request->input('student_id'),
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'nickname' => $request->input('nickname'),
        'email' => $request->input('email'),
        'mobile' => $request->input('mobile'),
        'shirt_size' => $request->input('shirt_size'), 
        'food_allergies' => $request->input('food_allergies'),
        'congenital_disease' => $request->input('congenital_disease')]
        );

   	  $delete = StaffsJobs::where('student_id','=',$request->input('student_id'))->delete();
      foreach($request->input('jobs') as $dept_id)
      {
      	$jobs = new StaffsJobs();
      	$jobs->student_id = $request->input('student_id');
      	$jobs->dept_id = $dept_id;
      	$jobs->save();
      }
      
     
        return redirect('staff');
        /*
        ['firstname' => $request->input('firstname')],
        ['lastname' => $request->input('lastname')],
        ['nickname' => $request->input('nickname')],
        ['email' => $request->input('email')],
        ['mobile' => $request->input('mobile')],
        ['shirt_size' => $request->input('shirt_size')],        
        ['congenital_disease' => $request->input('congenital_disease')],
        ['food_allergies' => $request->input('food_allergies')]
         $i = 0;
      
            foreach ($request->input('jobs') as $dept_id) {
                 echo $dept_id.' ';
                 $i++;
            }
       echo $i; */
    }
}
