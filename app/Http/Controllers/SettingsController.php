<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestSsh;

class SettingsController extends Controller
{
    public function setting()
    {
        return view('settings');
    }

    public function settingSshPost(RequestSsh $request)
    {
        dd(
            $request->input('ssh_name'),
            $request->input('ssh_pub_key')
        );
    }
}
