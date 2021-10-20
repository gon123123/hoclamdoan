<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests; // co th chữ S
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function index()
    {
        echo "dang nhap";
        return view('admin_login');
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password; // md5($request->admin_password) bảo mật hơn , trên DB cũng chọn md5 

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first(); // lay 1 user
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', "mật khẩu hoặc tài khoản bị sai");
            return Redirect::to('/admin');
        }
    }

    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
}
