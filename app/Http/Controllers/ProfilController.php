<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index(){
        $userLogin = Admin::find(session("LoggedAdmin")->id);
        return view ('dashboard.profile.profileadmin', [
            "UserLogin" => $userLogin
        ]);
        
    }

    public function edit(){
        // $id= ['LoggedUserInfo'=> Admin::Where('id', '=', session('LoggedAdmin'))->first()];
        $id_user= session("LoggedAdmin")->id;
        $admin = Admin::find($id_user);
        return view ('dashboard.profile.editprofile', [
            "title" => "Profile", 
            "admin" => $admin
        ]);
    }

    public function update(Request $request){
        if(session()->has("LoggedAdmin")){
            $id_login= session("LoggedAdmin")->id;

            //validation
            $validatedData = $request->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required'
            ]);

            //storing data
            if($validatedData){
                $admin = Admin::find($id_login);

                $admin->Name=$request->name;
                $admin->Username=$request->username;
                $admin->Email=$request->email;
            }
            
            if($admin->save()){
                return redirect("/dashboard/profile")->with('success', 'Profil berhasil diperbarui');
            }else{
                return redirect("/dashboard/editprofile")->with('fail', 'profil gagal diperbarui');
            }
        }
    }

    public function editpass(){
        return view ('dashboard.profile.editpass', [
            "title" => "Edit Password"
        ]);
    }
    public function updatepass(Request $request){
        
        // retreiving data
        $user = Admin::find(session("LoggedAdmin")->id);

        // checking last password
        if(Hash::check($request->password_lama,$user->Password)){
            if($request->newpassword == $request->newpassword_confirmation){
                $user->Password = $request->newpassword;
                if($user->save()){
                    return redirect("/dashboard/editpass")->with('updatesuccess', 'Kata sandi berhasil diperbarui');
                }else{
                    return redirect("/dashboard/editpass")->with('updatefail', 'Kata sandi gagal diperbarui');
                }
            }else{
                return redirect("/dashboard/editpass")->with('updatefail', 'Kata sandi baru tidak sama');
            }
        }else{
            return redirect("/dashboard/editpass")->with('updatefail', 'Kata sandi lama tidak sama');
        }

       
    }
}
