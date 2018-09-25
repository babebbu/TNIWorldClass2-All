<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect(Request $request, $section)
    {
	    $request->session()->put('section', $section);
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(Request $request)
    {
	    $section = $request->session()->get('section');
	    $provideUser = Socialite::driver('facebook')->user(); 
	    
        if($section == 'staff') {
        	return redirect('staff/register')->with('provideUser', $provideUser);
        }
    }
}
