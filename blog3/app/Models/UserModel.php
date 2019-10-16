<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    protected $table = 'users';
//    /**
//     * 指示是否自动维护时间戳
//     *
//     * @var bool
//     */
//    public $timestamps = false;
    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['name','email','password'];
}
