<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--    导入css样式   --}}
    <link rel="stylesheet" href="/users.css">
    <title>Document</title>
</head>
<body>
    <h1>信息管理中心</h1>
      <div class="show">

          <button onclick="addUser()">添加用户</button>
          <form action="/user/select" method="get">
              {{ csrf_field() }}
              <button>查询用户</button>
              <input type="search" class="selected" name="name" placeholder="请输入要查询的关键字">
          </form>
{{--          <a class="select" onclick="find()">查询用户</a>--}}
          <table cellpadding="10" cellspacing="0" border="1">
              <tr>
                  <th>id</th>
                  <th>name</th>
                  <th>email</th>
                  <th>action</th>
              </tr>
              @foreach ($users as $user)
                  <tr>
                      <td class="userId">{{$user->id}}</td>
                      <td class="userName">{{$user->name}}</td>
                      <td class="userEmail">{{$user->email}}</td>
                      <td>
                          <a class="edit" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" onclick="edit(this)">修改</a>
                          <a class="del" data-id="{{$user->id}}" onclick="doDel(this)">删除</a>
                      </td>
                  </tr>
              @endforeach

          </table>
          {{ $users->appends(['name' => $selects])->links() }}
      </div>
    <div class="action-box" onsubmit="return false">
        <form  class ="edit-form">
            <span>修改信息</span>
            <input type="hidden" class="id">
           <div class="input">
               <label for="">姓名</label>
               <input type="text" class="name">
           </div>
            <div class="input">
                <label for="">邮箱</label>
                <input type="email" class="email">
            </div>
            <div class="input">
                <button onclick="doEdit()">修改</button>
                <button onclick="hid()">取消</button>
            </div>
        </form>
        <form  class ="add-form" onsubmit="return false">
            <span>添加用户</span>
            <div class="input">
                <label>姓名</label>
                <input type="text" class="addName">
            </div>
            <div class="input">
                <label for="">邮箱</label>
                <input type="email" class="addEmail">
            </div>
            <div class="input">
                <button onclick="doAdd()">添加</button>
                <button onclick="hid()">取消</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="/js/user.js"></script>
</body>
</html>
<?php
