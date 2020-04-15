<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
//Provider
use App\Services\ProviderServices;
use App\Http\Requests\DnsRequest;
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
    protected $providerServices;

    public function __construct(
        ProfileServices $profileServices,
        SshKeyServices $sshKeyServices,
        ProviderServices $providerServices
    ) {
        $this->providerServices = $providerServices;
        $this->profileServices = $profileServices;
        $this->sshKeyServices = $sshKeyServices;
    }

    public function setting()
    {
        return view('settings');
    }

    public function createSsh(SshRequest $request)
    {
        return $this->sshKeyServices->createSshKey(
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

    public function findToken()
    {
        return $this->providerServices->findProvider(Auth::user());
    }

    public function createToken(DnsRequest $request)
    {
        return $this->providerServices->createProvider(Auth::user(), $request);
    }
}
