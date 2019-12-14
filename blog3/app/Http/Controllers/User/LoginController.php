<?php


namespace App\Http\Controllers\User;

use App\Models\UserModel;
use Illuminate\Http\Request;

class LoginController
{
    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {

            return view('admin.login');
        }
        $name = $request->get('loginUsername');
        $pwd = $request->get('password');
        $res = UserModel::where(['name' => $name])->first();
        if ($res) {
            if ($pwd == decrypt($res->password)) {
                session()->put('name', $name);
                return redirect('/admin');
            } else {

                return view('admin.login')->withErrors(['密码错误,请重试']);
            }
        } else {
            return redirect('/reg');
        }
    }

    /**
     * 注册
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function reg(Request $request)
    {
        if ($request->isMethod('get')) {
            $user = new UserModel();
            return view('admin.register',['user'=>$user]);
        }
        $request->validate([
            'name' => 'required|between:2,25|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:6,15',
        ]);
        $name = $request->get('name');
        $email = $request->get('email');
        $sex = $request->get('sex');
        $password = encrypt($request->get('password'));
        $res = UserModel::create(['name' => $name, 'email' => $email, 'password' => $password,'sex'=>$sex]);
        if ($res) {
            return redirect('/login');
        } else {
            return redirect('/reg');
        }

    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect('login');
    }
}
