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
                <li class="breadcrumb-item active">Tables        </li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block margin-bottom-sm">
                            <div class="title"><strong>用户列表</strong></div>
                            <form action="/user/select" method="get">
                                {{ csrf_field() }}
                                <input type="search" class="selected" name="name" placeholder="请输入要查询的关键字">
                                <button>查询用户</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th class="userId" scope="row">{{$user->id}}</th>
                                            <td class="userName">{{$user->name}}</td>
                                            <td class="userEmail">{{$user->email}}</td>
                                            <td>
                                                <a href="/edit/{{$user->id}}">修改</a>
                                                <a class="del" data-id="{{$user->id}}" onclick="doDel(this)">删除</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                @if($selects)
                                    {{ $users->appends(['name' => $selects])->links() }}
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
                    <p class="no-margin-bottom">Copyright &copy; 2019.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection
