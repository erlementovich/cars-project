<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function update(User $user)
    {
        return $user->isAdmin();
    }
}
