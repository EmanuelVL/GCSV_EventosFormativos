<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index(){
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'nombreUsuario' => $data['name'],
            'correo' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function store(Request $request){
        $user = new Usuario();
        //dd($request);
        $request->validate([
            'nombre' => 'required|min:4|max:30',
            'email'=> 'required|email|unique:usuario,correo',
            'password' => 'required|min:3|confirmed'
        ]);
        
        //dd($request);

            
            $user->nombreUsuario = $request ->input('nombre');
            $user->apellidoUsuario =$request ->input('apellido');
            $user->correo = $request-> input('email');
            $user->password = bcrypt(request('password'));
            $user->esAdmin = 0;
            $user->esInstancia = 0;

            $user->save();
            
            return redirect('login');
       
       
        //return back()->withErrors(['email' => 'Los datos no son validos'])->withInput(request(['email']));
    }
}
