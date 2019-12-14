@extends('main.app')
@section('content')
    <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Basic forms</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Basic forms        </li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-11">
                        <div class="block">
                            <div class="title"><strong class="d-block">添加用户</strong><span class="d-block"></span></div>
                            <div class="block-body">
{{--                                @if ($errors->any())--}}
{{--                                    <div class="alert alert-danger">--}}
{{--                                        <ul>--}}
{{--                                            @foreach ($errors->all() as $error)--}}
{{--                                                <li>{{ $error }}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <form  action="/add" method = "post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="form-control-label">UserName</label>
                                        <input type="text" placeholder="请输入用户名" class="form-control" name="name" value="{{old('name')}}">
                                        <div class="danger">{{$errors->first('name')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input type="email" placeholder="请输入邮箱" class="form-control" name="email" value="{{old('email')}}">
                                        <div class="danger">{{$errors->first('email')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Password</label>
                                        <input type="password" placeholder="请输入密码" class="form-control" name="password" >
                                        <div class="danger">{{$errors->first('password')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">用户性别</label><br>
                                        @foreach($user->sex() as $int=>$val)
                                            <input type="radio"  class="" name="sex" value="{{$int}}" {{$int == 0?'checked':''}}> {{$val}}
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="添加" class="btn btn-primary">
                                    </div>
                                </form>
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
                    <p class="no-margin-bottom">Copyright &copy; 2019.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection
