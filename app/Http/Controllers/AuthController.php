<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('etudiant');
                        // ->withSuccess('Signed in');
        }
  
        return redirect("/")->withSuccess('Vérifier les information de connection');
    }

    public function inscriptionForm()
    {
        return view('auth.registration');
    }
      
    public function inscription(Request $request)
    {  
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        // dd($request);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/")->withSuccess('Inscription reussie');
    }

    public function create(array $data)
    {
      return User::create([
        'nom' => $data['nom'],
        'prenom' => $data['prenom'],
        'telephone' => $data['telephone'],
        'adresse' => $data['adresse'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function loggout() {
 
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}