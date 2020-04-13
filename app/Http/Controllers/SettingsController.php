<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function setting()
    {
        return view('settings');
    }

    public function settingSshPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ssh_name' => 'numeric|max:255',
            'ssh_pub_key' => 'string',
        ]);

        $response = 'success';

        if ($validator->fails()) {
          $response = response()->json($validator->messages(), 500);
        }
dd($validator->messages());
        return $response;
    }
}
