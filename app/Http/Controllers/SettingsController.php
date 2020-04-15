<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
//Profile
use App\Http\Requests\ProfileRequest;
use App\Services\ProfileServices;
//SshKey
use App\Services\SshKeyServices;
use App\Http\Requests\DeleteSshRequests;
use App\Http\Requests\SshRequest;

class SettingsController extends Controller
{
    protected $sshKeyServices;
    protected $profileServices;

    public function __construct(
        ProfileServices $profileServices,
        SshKeyServices $sshKeyServices
    ) {
        $this->profileServices = $profileServices;
        $this->sshKeyServices = $sshKeyServices;
    }

    public function setting()
    {
        return view('settings');
    }

    public function createSsh(SshRequest $request)
    {
        return $this->sshKeyServices->newSshKey(
            Auth::user(),
            $request
        );
    }

    public function findSsh()
    {
        return $this->sshKeyServices->findSsh(Auth::user());
    }

    public function deleteSsh(DeleteSshRequests $deleteSshRequests)
    {
        return $this->sshKeyServices->deleteSsh(
            Auth::user(),
            $deleteSshRequests->id
        );
    }

    public function findProfile()
    {
        return $this->profileServices->findProfile(Auth::user());
    }

    public function updateProfile(ProfileRequest $profileRequest)
    {
        return $this->profileServices->updateProfile(Auth::user(), $profileRequest);
    }
}
