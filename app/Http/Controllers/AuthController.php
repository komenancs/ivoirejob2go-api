<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponser;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    use ApiResponser;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return $this->getErrorResponse(Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        }


        if (! $token = auth()->attempt($validator->validated())) {
            return $this->getErrorResponse(Response::HTTP_UNAUTHORIZED, "Unauthorized");
        }
        return $this->createNewToken(Auth::user()->createToken('token')->plainTextToken);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|string|email|max:100|unique:users',
                'surname' => 'required|string',
                'password' => 'required|string|confirmed|min:6',
                'telephone' => 'nullable|string',
                'nom_entreprise' => 'nullable|string',
                'poste_occupe' => 'nullable|string',
                'photo' => 'nullable|mimes:jpg,bmp,png',
                'linkedin' => 'nullable|url',
                'twitter' => 'nullable|url',
                'instagram' => 'nullable|url',
                'date_verification_email' => 'nullable|date',
                'role_id' => 'nullable|interger',
                'localisation_id'  => 'nullable|integer',
                'remember_token' => 'nullable|datetime',
                'email_verified_at' => 'nullable|datetime',
            ]);
        if($validator->fails()){
            return $this->getErrorResponse(Response::HTTP_BAD_REQUEST, $validator->errors());
        }
        if ($request->hasFile('photo')){
            $photo = $request->file('photo')->storeAs('user_photos', Utils::slugify($request->photo->getClientOriginalName()) . "." . $request->photo->getClientOriginalExtension());
        }
        $validated = array_merge(
            $validator->safe()->except(['photo']),
            ['password' => bcrypt($request->password), 'photo' => $photo ?? null]
        );
        //dd($validated);
        $user = User::create($validated);
        return (new UserResource($user))->additional($this->getResponseTemplate(Response::HTTP_OK, "User successfully registered"));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return $this->getSuccessResponse(null, Response::HTTP_OK, "User successfully signed out");
    }
    /**
     * Refresh a token.
     */
    public function refresh() {
        return $this->createNewToken(auth('api')->refresh());
    }

    /**
     * Get the authenticated User.
     */
    public function userProfile() {
        return (new UserResource(auth()->user()))->additional($this->getResponseTemplate(Response::HTTP_OK));
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     */
    protected function createNewToken($token){
        return ( new UserResource(auth()->user()))->additional(
            array_merge(
                $this->getResponseTemplate(Response::HTTP_OK),
                array(
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60,)
                )
        ); 
    }
}
