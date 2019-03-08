<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InstallController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function install_form() {
        return view('installer.form');
    }

    public function install(Request $request) {

        $validate = $this->validate($request, [
            'host' => 'required|string',
            'port' => 'required',
            'database' => 'required|string',
            'username' => 'required|string'
        ]);

        $fields = [$request->input('host'), $request->input('port'), $request->input('database'), $request->input('username'), $request->input('password')];

        $keys = ['DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];
        $env = file_get_contents(base_path(".env"));
        
        foreach($keys as $key)
        {
            foreach($fields as $field)
            {
                $data = str_replace($key . "=" . env($key), $key . "=" . $field, $env);
                file_put_contents(base_path(".env"), $data);
            }
        }
        
        $result = DB::unprepared(File::get(base_path() . '/public/database/database.sql'));
        DB::unprepared('CREATE DATABASE IF NOT EXISTS ' . $request->input('database'));

        if ($result) {
            return redirect()->route('install.form')
                            ->with(['message_success' => 'The application has been successfully installed, start using it!']);
        } else {
            return redirect()->route('install.form')
                            ->with(['message_error' => 'Something went wrong... try again']);
        }
    }

}
