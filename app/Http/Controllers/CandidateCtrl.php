<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\DbCtrl;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CandidateCtrl extends Controller
{

    protected $rules = [
        'name' => 'required|max:100',
        'email' => 'required|email|unique:candidates,email|max:100',
        'url' => 'required|url',
        'cover_letter' => 'required|min:100|max:1000',
        'attachment' => 'required|max:5120|mimetypes:application/pdf',
        'captcha' => 'required|captcha',
        'like_working' => 'required|boolean'
    ];

    protected $table = 'candidates';

    public function postHandle()
    {

        //  Validation starts


        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        // Validation ends

        $values = Input::all();

        unset($values['attachment']);
        unset($values['captcha']);
        unset($values['_token']);


        // File upload starts

        $file = Input::file('attachment');

        if (is_a($file, UploadedFile::class)) {

            $ext = $file->getClientOriginalExtension();

            $fileName = DbCtrl::getNewId($this->table) . '.' . $ext;

            Storage::put('uploads/' . $fileName, file_get_contents($file));

            $values['attachment'] = $fileName;

        }

        // File upload ends


        // get ip address
        $values['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $values['created_at'] = Carbon::now();
        $values['updated_at'] = Carbon::now();


        // Save in database

        $inserted = DB::table($this->table)->insert($values);

        if ($inserted) {
            return redirect('/')
                ->with('message', 'Successfully submitted...!');
        } else {
            return redirect('/')
                ->withInput()
                ->with('message', 'Something went wrong. Try again...!');
        }


    }

}
