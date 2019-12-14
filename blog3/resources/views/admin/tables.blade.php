@extends('main.app')
@section('content')
    <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Tables</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user">Home</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block margin-bottom-sm">
                            <div class="title"><strong>用户列表</strong></div>
                            <form action="{{route('user')}}" method="get" class="form-validate mb-4 form-group ">
                                {{ csrf_field() }}
                                <button class="btn btn-primary">查询用户</button>
                                <input type="search" class="selected input-material col-3" name="name"
                                       placeholder="请输入要查询的姓名" value="{{$name?$name:''}}">
                                <input type="search" class="selected input-material col-3" name="email"
                                       placeholder="请输入要查询的邮箱" value="{{$email?$email:''}}">
                                <a href="{{route('add')}}" class="float-right"><span
                                        class="btn btn-primary ">新增用户</span></a>
                            </form>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><a href="{{route('user', ['name' => $name,'email'=>$email,'order'=>$order=='desc'?'asc':'desc','by'=>'id'])}}">id</a></th>
                                        <th>姓名</th>
                                        <th><a href="{{route('user', ['name' => $name,'email'=>$email,'order'=>$order=='desc'?'asc':'desc','by'=>'sex'])}}">性别</a></th>
                                        <th>邮箱</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th class="userId" scope="row">{{$user->id}}</th>
                                            <td class="userName">{{$user->name}}</td>
                                            <td class="userSex">{{$user->sex($user->sex)}}</td>
                                            <td class="userEmail">{{$user->email}}</td>
                                            <td>
                                                <a href="{{route("edit")}}?id={{$user->id}}">修改</a>
                                                <a class="del" data-toggle="modal" data-target=".bs-example-modal-sm"
                                                   data-id="{{$user->id}}" onclick="doDel(this)">删除</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if(!empty($name) || !empty($email)||!empty($order))
                                    {{ $users->appends(['name' => $name,'email'=>$email,'order'=>$order])->links() }}
                                @else
                                    {{ $users->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                    <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    <p class="no-margin-bottom">Copyright &copy; 2019.Company name All rights reserved.<a
                            target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
                </div>
            </div>
        </footer>
    </div>

@endsection
