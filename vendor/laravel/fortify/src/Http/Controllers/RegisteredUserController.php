<?php

namespace Laravel\Fortify\Http\Controllers;

use App\Models\Organisation;
use App\Models\Manager;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;

/* Changed by Yuris to support Organisation assigment via URL */

class RegisteredUserController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the registration view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\RegisterViewResponse
     */
    public function create(Request $request): RegisterViewResponse
    {
        #dd($request->input('t'));
        return app(RegisterViewResponse::class);
    }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store(Request $request,
                          CreatesNewUsers $creator): RegisterResponse
    {
        $login_token = $request->input('login_token');
        $inputs = $request->all();
        $org_id = null;
        if ($login_token) {
            $org = Organisation::where('login_token',$login_token)->get();
            if (count($org) > 0) {
                $org_id = $org[0]->Organisation_ID;
            }
        }
        $inputs['organisation_id'] = $org_id;
        #dd($inputs);
        event(new Registered($user = $creator->create($inputs)));

        #Update user with Org_ID
        if ($org_id) {
            $manager = Manager::findOrFail($user->id);
            $data['organisation_id'] = $org_id;
            $manager->update($data);
        }
        $this->guard->login($user);

        return app(RegisterResponse::class);
    }
}
