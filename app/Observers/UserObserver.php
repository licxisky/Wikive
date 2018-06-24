<?php
/**
 * Created by PhpStorm.
 * User: LiCxi
 * Date: 2018/6/24
 * Time: 22:13
 */

namespace App\Observers;


use App\User;

class UserObserver
{
    public function creating(User $user) {
        if(empty($user->password)) {
            $user->password = bcrypt('default');
        }
        if(empty($user->remember_token)) {
            $user->remember_token = str_random(10);
        }
    }
}