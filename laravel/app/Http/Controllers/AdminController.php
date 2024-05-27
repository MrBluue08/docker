<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Team;
use App\Models\Room;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function auth(){
        request()->validate([
            'mail' => 'required',
            'passwd' => 'required',
        ]);
        //Auth::guard('admin')->attempt(['adminMail' => $mail, 'adminPass' => $passwd])
        $mail = request()->input('mail');
        $passwd = request()->input('passwd');
        $admin = Admin::where('adminMail', $mail)->first();
        
        if($admin && Hash::check($passwd, $admin->adminPass)) {
            Auth::guard('admin')->login($admin);
            session(['adminAuth' => true]);
            session(['adminMail' => $admin->adminMail]);
            return redirect()->route('admin.index');
        }elseif(!$admin){
            $error = "mail";
            return redirect()->route('admin.login', compact("error"));
        }else{
            $error = "passwd";
            return redirect()->route('admin.login', compact("error"));
        }
    }

    public function login($fail = null){
        $error = $fail;
        return view("admin.adminLogIn", compact("error"));
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
    
    public function index()
    {
        $incomingRooms = Room::incomingRooms();
        $topFive=Team::topFive();
        return view("admin.indexAdmin", compact("topFive", "incomingRooms"));
    }
}
