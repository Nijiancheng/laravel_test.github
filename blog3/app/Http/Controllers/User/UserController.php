<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
//use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr = UserModel::Paginate(5);
        return view('admin.tables',["users" => $arr,'selects' => '']);
    }



    /**
     * 跳转到修改页面获取需要修改用户的数据
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toEdit($id){
        $res  = UserModel::find($id);
        return view('admin.edit',['info'=>$res]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
           return redirect('/user');
        } else {
            return view('admin.add');
        }

    }

//    /**
//     * Display the specified resource.
//     *
//     * @return array
//     */
//    public function show()
//    {
//        $res = (new UserModel())->show();
//        return $res;
//    }

    public function select(Request $request)
    {
        $name   = $request->get('name');
        $res = UserModel::where('name', "like","%".$name."%")
            ->orderBy('id', 'desc')
            ->Paginate(5);
        return  view('admin.tables', ["users" => $res, 'selects' => $name]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|between:3,25|unique:users,name,'.$request->get('id'),
            'email' => 'required|unique:users,email,'.$request->get('id'),
        ]);
//        unique:users,email 没用起来??
//        Validator::make($data,[
//            'name' => 'required|between:3,25|unique:user,name|',
//            'email' => [
//                'required',
//                Rule::unique('users')->ignore($request->get('id')),
//            ],
//        ]);
        $id =$request->get('id');
        $name =$request->get('name');
        $email =$request->get('email');
        $res = UserModel::find($id);
        $result = $res->update(['name'=>$name,'email'=>$email]);
        if ($result ) {
            return redirect('/user');
        } else {
            return view('admin.edit',['info'=>$res]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
//        var_dump($id);
//        $deleted = (new UserModel())->del($id);
        $deleted = UserModel::destroy($id);
        if ($deleted > 0) {
            $info =
                [
                    "status" => true,
                    "info" => "删除成功"
                ];
        } else {
            $info =
                [
                    "status" => false,
                    "info" => "删除失败"
                ];
        }
        $result = json_encode($info);
        return $result;

    }
}
