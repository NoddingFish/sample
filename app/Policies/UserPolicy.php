<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    /**
     * 用户删除 只能是is_admin是管理员权限可以，并且不能删除自己
     * @param User $currentUser
     * @param User $user
     * @return bool
     * @author : XuRan
     * @Time : 2018/11/21 0021 上午 11:48
     */
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
