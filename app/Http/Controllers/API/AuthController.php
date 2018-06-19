<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApiLoginRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ApiRegisterRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Auth\ActivatedNotification;
use App\Notifications\Auth\RegisteredNotification;
use App\Notifications\Auth\AuthenticatedNotification;

class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }

    /**
     * Create user
     *
     * @param ApiRegisterRequest $request
     * @return \Illuminate\Http\JsonResponse [string] message
     */
    public function register(ApiRegisterRequest $request)
    {
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'activated_token' => str_random(60)
        ]);

        // Save user
        if ($user->save()) {
            Notification::send($user, new RegisteredNotification($user));
        }

        $avatar = (new \Laravolt\Avatar\Avatar)->create($user->name)->getImageObject()->encode('png');
        Storage::put('public/avatars/'.$user->id.'/avatar.png', (string) $avatar);

        // Return response
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param ApiLoginRequest $request
     * @return \Illuminate\Http\JsonResponse [string] access_token
     */
    public function login(ApiLoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        $credentials['activated'] = 1;
        $credentials['deleted_at'] = null;

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        if ($token->save()) {
            Notification::send($user, new AuthenticatedNotification($user));
        }

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function activate($token)
    {
        $user = User::where('activated_token', $token)->first();

        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }

        $user->activated = true;
        $user->activated_token = '';

        if ($user->save()) {
            Notification::send($user, new ActivatedNotification($user));
        }

        return $user;
    }
}
