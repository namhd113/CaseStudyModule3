<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Table;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $username = $request->inputUsername;
        $password = $request->inputPassword;

        // Kiểm tra thông tin đăng nhập
        if ($username == 'admin' && $password == '123456') {

            //Nếu thông tin đăng nhập chính xác, Tạo một Session lưu trữ trạng thái đăng nhập
            $request->session()->push('login', true);

            // Đi đến route show.blog, để chuyển hướng người dùng đến trang blog
            return redirect()->route('admin.showDashboard');

        }

        // Nếu thông tin đăng nhập không chính xác, gán thông báo vào Session
        $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
        $request->session()->flash('login-fail', $message);

        //Quay trở lại trang đăng nhập
        return view('admin_login');
    }
    public function logout(Request $request)
    {
        // Xóa Session login, đưa người dùng về trạng thái chưa đăng nhập
        $request->session()->flush();
        return view('layout');
    }
}
