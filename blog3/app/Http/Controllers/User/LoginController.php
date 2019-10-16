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
    public function login(Request $request){
        $name = $request->get('loginUsername');
        $pwd = $request->get('password');
        $res = UserModel::where(['name'=>$name,'password'=>$pwd])->first();
        if($res){
            return redirect('/admin');
        }else{
            return redirect('/toReg');
        }
    }

    /**
     * 注册
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function reg(Request $request)
    {
        $request->validate([
            'name' => 'required|between:3,25|unique:users',
            'email' => 'required|email|unique:users',
            'password'=>'required|between:6,15',
        ]);
        $name = $request->get('name');
        $email =  $request->get('email');
        $password =  $request->get('password');
        $res = UserModel::create(['name' => $name,'email' =>$email,'password'=>$password]);
        if ($res) {
            return redirect('/toLogin');
        } else {
            return view('/toReg');
        }

    }
}
