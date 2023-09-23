<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SocialLoginRequest;

class UserController extends Controller
{

    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
        // $this->middleware('permission:storeSubscribe', ['only' => 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {

        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->storeUser($validatedData);

            return response()->success($request, $data, 'User Register Successfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('sora_error_log')->error('Register Error' . $e->getMessage());
            return response()->error($request, null, $e->getMessage(), 500, $startTime);
        }
    }



    public function socialLogin(SocialLoginRequest $request)
    {
        $startTime = microtime(true);

        try {
            $user = User::where('provider', $request->provider)
                ->where('key', $request->key)
                ->where('name', $request->name)
                ->first();

            if ($user == null) {

                $validatedData = $request->validated();
                $user = $this->service->socialLogin($validatedData);
            }


            if ($user) {

                Auth::login($user);
                $success['id'] = $user->id;
                $success['name'] = $user->name;
                $success['email'] = $user->email;
                $success['token'] = $user->createToken('User API')->plainTextToken;
                $userRoles = $user->getRoleNames();
                $success['role'] = $userRoles->first();
                $success['permission'] = $user->getPermissionsViaRoles()->pluck('name');

                return response()->success($request, $success, 'User Login Successful', 200, $startTime, 1);
            } else {

                return response()->error($request, null, 'User Not Found', 404, $startTime);
            }
        } catch (Exception $e) {
            Log::channel('sora_error_log')->error('Social Login Error: ' . $e->getMessage());
            return response()->error($request, null, 'Internal Server Error', 500, $startTime);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
