<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(User $user)
    {
        return UserResource::collection($user->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return UserResource
     */
    public function show($id): UserResource
    {
        return new UserResource(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return UserResource
     */
    public function update(Request $request, $id): UserResource
    {
        $user = User::query()->findOrFail($id)->update($request->all());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::query()->where('email', $request->email)->first();

       if($user && Hash::check($request->password, $user->password))
         {
            $token = $user->createToken('myapp')->plainTextToken;
            return response()->json($token);
         }
            else
            {
                return response()->json(['error'=>'Unauthorised'], 401);
            }
    }
    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['token' => $token], 200);
    }
    public function getUser(Request $request)
    {
        return new UserResource($request->user());
    }
    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        $token = $request->user()->currentAccessToken();
        $token->delete();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
