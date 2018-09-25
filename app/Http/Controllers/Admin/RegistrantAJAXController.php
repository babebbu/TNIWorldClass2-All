<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Library\RegistrantManager;

class RegistrantAJAXController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrants = RegistrantManager::index();
        return $registrants;
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
    public function wtf()
    {
        //echo "<pre>".var_export($request->all(), true)."</pre>";
        $registrants = RegistrantManager::index();
        return $registrants;
        /*if($registration->create($request)) {
            return "Successfully created " . $request->get('name');
        }
        else {
            return "Fail";
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Library\RegistrantManager $registration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($registrant = RegistrantManager::read($id)){
            return view('admin/registration/registrant/show_registrant_profile', [
                'registrant' => $registrant
            ]);
        }
        else {
            return redirect(404);
        }
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
}
