<?php

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    public function creating(User $user)
    {
        //
    }


    public function updating(User $user)
    {
        //
    }


    public function saveing(User $user)
    {
        if (empty($this->avatar)) {
            $user->avatar = 'http://1t.click/bjVz';
        }
    }
}
