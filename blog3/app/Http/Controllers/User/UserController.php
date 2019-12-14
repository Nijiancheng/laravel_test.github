<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * 展示列表/有查询参数就查询
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session()->forget('edit-url');//清除进入编辑页面存储的url,防止从编辑页面返回上一页时的url一直存留
        $model = new UserModel;
        $arr = $request->all();
        if (!empty($arr['name'])) {
            $model = $model->where('name', 'like', '%' .$arr['name'] . '%');
        }
        if (!empty($arr['email'])) {
            $model = $model->where('email', 'like', '%' .$arr['email'] . '%');
        }
        if(!empty($arr['by'])){
            $model = $model->orderBy($arr['by'],$arr['order']);
        }else{
            $model = $model->orderBy('id','asc');
        }
        $res = $model->Paginate(5);
//        dump($res);
        return view('admin.tables', ["users" => $res, 'name' => $request->get('name'), 'email' => $request->get('email'),'order'=>$request->get('order'),'by'=>$request->get('by')]);
    }

    /**
     * 添加用户/get进入添加页面/post进入添加操作
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('get')) {//判读是get请求还是post请求
            $user = new UserModel();
            return view('admin.add', ['user' => $user]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|between:2,25|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|between:6,15',
            ]);
            $name = $request->get('name');
            $email = $request->get('email');
            $sex = $request->get('sex');
            $password = encrypt($request->get('password'));
            $res = UserModel::create(['name' => $name, 'email' => $email, 'password' => $password, 'sex' => $sex]);
            if (!empty($res)) {
                return redirect('/user');
            } else {
                return view('admin.add', ['user' => $res]);
            }
        }
    }

    /**
     * 修改数据/get 查询数据跳转到修改页面/post 修改用户数据操作
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   $arr = $request->all();
        $res = UserModel::find($arr['id']);//查找到要修改的用户数据对象
        if ($request->isMethod('get')) {
            if (!session()->has('edit-url')) {//判断session有没有存储编辑前的url,没有则将进入编辑前的url存储
                session()->put('edit-url', url()->previous());
            }
            return view('admin.edit', ['info' => $res]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|between:3,25|unique:users,name,' . $arr['id'],
                'email' => 'required|unique:users,email,' . $arr['id'],
            ]);

            $result = $res->update(['name' => $arr['name'], 'email' => $arr['email'], 'sex' => $arr['sex']]);
            $url = session()->get('edit-url');
            if (!empty($result)) {
                session()->forget('edit-url');//编辑成功则清除存储的url并跳转到那个页面
                return redirect($url);
            } else {
                return view('admin.edit', ['info' => $res]);//编辑失败则带着桑数据重新渲染编辑页面
            }
        }

    }

    /**
     * 删除用户/若是本人则无法删除
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->get('id');
        $user = UserModel::find($id);
        if ($user->name == session()->get('name')) {
            $info =
                [
                    "status" => false,
                    "info" => "您不能删除您本人的信息"
                ];
        } else {
            $deleted = $user->delete();
            if ($deleted) {
                $info =
                    [
                        "status" => true,
                        "info" => "删除成功",
                    ];
            } else {
                $info =
                    [
                        "status" => false,
                        "info" => "删除失败"
                    ];
            }
        }
        $result = json_encode($info);
        return $result;
    }
}
