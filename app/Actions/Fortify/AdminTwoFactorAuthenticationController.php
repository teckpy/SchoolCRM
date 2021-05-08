<?php

namespace App\Actions\Fortify;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Actions\Fortify\AdminEnableTwoFactorAuthentication;
use App\Actions\Fortify\AdminDisableTwoFactorAuthentication;
use Illuminate\Support\Collection;
use Laravel\Fortify\RecoveryCode;

class AdminTwoFactorAuthenticationController extends Controller
{
    /**
     * Enable two factor authentication for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Actions\AsminEnableTwoFactorAuthentication  $enable
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request, AdminEnableTwoFactorAuthentication $enable)
    {
         $enable($request->user());

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'two-factor-authentication-enabled');
    }

    /**
     * Disable two factor authentication for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Actions\AsdminDisableTwoFactorAuthentication  $disable
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(Request $request, AdminDisableTwoFactorAuthentication $disable)
    {
        $disable($request->user());

        return $request->wantsJson()
                    ? new JsonResponse('', 200)
                    : back()->with('status', 'two-factor-authentication-disabled');
    }


    public function two($user)
    {
        $user->forceFill([
            'two_factor_secret' => encrypt($this->provider->generateSecretKey()),
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return RecoveryCode::generate();
            })->all())),
        ])->save();
    }
}
