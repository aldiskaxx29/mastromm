<?php

namespace App\Http\Controllers;

// use RealRashid\SweetAlert\Facades\Alert;
use Alert;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Image;
use Mews;


class AuthController extends Controller
{
    public function index(){
        // Alert::success('Congrats', 'You\'ve Successfully Registered');
        return view('auth/login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // salah if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
        if(Auth::attempt($request->only('username','password'))){
            if (Auth::user()->status == '1') {
                if(Auth::user()->level_id == 1){
                    // dd(Auth::user()->level_id);
                    session(['berhasil_login' => true]);
                    return redirect('/dashboard_admin');
                }
                if(Auth::user()->level_id == 2){
                    // dd(Auth::user()->level_id);
                    session(['berhasil_login' => true]);
                    return redirect('/dashboard_admin');
                }
                if(Auth::user()->level_id == 3){
                    // dd(Auth::user()->level_id);
                    session(['berhasil_login' => true]);
                    return redirect('/dashboard_admin');
                }
                elseif(Auth::user()->level_id == 4){
                    session(['berhasil_login' => true]);
                    return redirect('/dashboard');
                }  
                elseif(Auth::user()->level_id == 5){
                    session(['berhasil_login' => true]);
                    return redirect('/dashboard');
                }  
                elseif(Auth::user()->level_id == 6){
                    session(['berhasil_login' => true]);
                    return redirect('/dashboard');
                }  
            } else {
                Alert::error('Error', 'Akun Belum Di Aktifasi Oleh Admin Silahkan Hubungi Admin');
                return redirect('/login');
            }
            

        }else{
            Alert::error('Error', 'Username Atau Password Salah');
            return redirect('/login');
        }
    }

    public function regist(){
        // Alert::success('Congrats', 'You\'ve Successfully Registered');
        return view('auth/regist');
    }

    public function registrasi(Request $request){
        // dd($request->all());
        $request->validate([
            'nama' => 'required|alpha',
            'username' => 'required',
            'email' => 'required|email',
            'toko'  => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|min:12|numeric',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        //model
        $dataUser = [
            'nama' => $request->nama,
            'username' => $request->username,
            'level_id' => 4,
            'email' => $request->email,
            'toko' => $request->toko,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'password' => bcrypt($request->password),
            'foto_user' => 'default.png',
            // 'status' => 1,
        ];
        // dd($dataUser);die;
        User::create($dataUser);


        Alert::success('Success', 'Akun Berhasil Di Tambahkan');
        return redirect('login');
    }

    public function lupa_password(){
        return view('auth/lupa_password');
    }

    public function password_baru(Request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password1' => 'required|same:password2|min:6',
            'password2' => 'required|same:password1|min:6',
        ]);
        $user = User::where('username', $request->username)->first();
        if($user){
            $user = User::where('username', $request->username)->first();
            $user->password = bcrypt($request->password1);
            $user->update();
            Alert::success('Success', 'Password Berhasil  Di Ubah');
            return redirect('login');
        }
        else{
            Alert::error('Error', 'Username Tidak Terdaftar');
            return redirect('/lupa_password');
        }
        
    }

    public function profil(){
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('profil', compact('user'));
    }

    public function ubah_profil(Request $request, $id){
        // var_dump($request);die;
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'toko' => 'required',
            'username' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $user = User::find($id);
        $user->nama         = $request->nama;
        $user->email        = $request->email;
        $user->toko         = $request->toko;
        $user->username     = $request->username;
        $user->no_telepon   = $request->no_telepon;
        $user->alamat       = $request->alamat;

        if($request->hasfile('foto_user'))
        {   
            $file = $request->file('foto_user');
            $extension = $request->foto_user->getClientOriginalExtension();  //Get Image Extension
            $fileName =  uniqid().'.'.$extension;  //Concatenate both to get FileName (eg: file.jpg)
            // $file->move(public_path().'/profil/', $fileName);  
            // $data = $fileName; 
            $path = Image::make($file->getRealPath());
            $path->crop(500,500);
            $path->save(public_path('/profil/' . $fileName));
            $user->update(['foto_user'=>$fileName]);

        }

        $user->save();
        Alert::success('Berhasil', 'Akun Berhasil Di Ubah');
        return redirect('profile')->with('message','Berhasil Di Update');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

    public function reload(){

    }
}
