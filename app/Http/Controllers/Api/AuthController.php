<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client;
use App\Role;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller{
    public function login(UserLoginRequest $request){
        $passwordGrantClient = Client::where('password_client', 1)->first();
        $http = new \GuzzleHttp\Client();

        $response = $http->post(route('passport.token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $passwordGrantClient->id,
                'client_secret' => $passwordGrantClient->secret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '*',
            ],
        ]);

        return response()->json(json_decode((string) $response->getBody(), true));
    }

    public function register(UserRegisterRequest $request){

        $gender = $request->gender;

        if($gender == 'muško'){
            $image = 'random_image.png';
        }else{
            $image = 'random2_image.png';
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'spol' => $gender,
            'image' => $image,
            'password' => Hash::make($request->password),
        ]);

        if(substr($request->email, -13) == "@fpmoz.sum.ba"){
            $studentUserID = DB::table('roles')->where('slug', 'student')->get('id')->first();
            $user->roles()->attach($studentUserID);
        }else{
            $externalUserID = DB::table('roles')->where('slug', 'external_user')->get('id')->first();
            $user->roles()->attach($externalUserID);
        }


        if(!$user){
            return response()->json(["success" => false, "message" => "registration failed"],  500);
        }

        return response()->json(["success" => true, "message" => substr($request->email, -6, )]);
    }

}