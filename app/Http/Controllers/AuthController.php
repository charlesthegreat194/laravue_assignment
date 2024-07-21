<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){

        // validate
            $fields= $request->validate([
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed']
            ]);


        // register
            $user = User::create($fields);
        // login
            Auth::login($user);
        // redirect
            return redirect()->route('login');



    }

    public function login(Request $request): RedirectResponse
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($fields)) {
            $request->session()->regenerate();

         

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email not found!',
            'password' => 'Incorrect Password!',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('signup');
    }

    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
        $userController = new UserController();

        $users =  $userController->getUsers();
        return view('dashboard', ['users'=>$users]);
    }

        // edit user
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            ]);
        
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
        
            return response()->json($user);
        }
        
        public function deleteUser($id)
        {
            $user = User::find($id);
            if($user){
                $user->delete();
                return response()->json([
                    'message' => 'Account Deleted Successfully ',
                    'code' => 200
                ]);
            } else{
                return response()->json([
                    'message' => "Account doesnt exist"
                ]);
            }
            
        }

    
}
