<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(){
         $user=User::all();
         return response()->json($user);
    }

    public function store(){
        $user=User::create(request()->all());
        return response()->json($user,201);
    }

    public function show($id){
        $user=User::find($id);
        return response()->json($user,200);


    }
    public function update($id){
        $user=User::find($id);
        $user->update(request()->all());
        return response()->json($user,201);

    }
    public function destroy($id)
    {
        $user=User::destroy($id);
        return response()->json(null,204);


    }
    public function login()
    {
        $attributes=request()->validate([
            'email'=>['required', 'email'],
            'password'=>['required']

        ]);

        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>'Sorry this credientisal not found'
            ]);

        }

        request()->session()->regenerate();

        echo "User Succefully Login ";

    }

    public  function logout(){
        Auth::logout();
        echo 'user succefully logout';
    }
}
