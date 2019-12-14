<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    const SEX_UN = 2;//未知
    const SEX_BY = 0;//男性
    const SEX_GL = 1;//女性
//    const SEX_RY = 3;//人妖

    protected $table = 'users';
    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
//    public $timestamps = false;

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['name','email','password','sex'];

    public function sex($int=null){
        $arr = [
            self::SEX_BY => '男',
            self::SEX_GL=>'女',
            self::SEX_UN=>'未知',
//            self::SEX_RY=>'人妖',
        ];
        if ($int !== null){

            return array_key_exists($int,$arr)?$arr[$int]:$arr[self::SEX_UN];
        }else{
            return $arr;
        }

    }

}
