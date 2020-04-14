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
            'ssh_key' => 'required|string',
        ]);

        $response = response()->json(['success'], 200);

        if ($validator->fails()) {
            $response = response()->json(['errors'=>$validator->errors()], 500);
        }

        return $response;
    }
}
