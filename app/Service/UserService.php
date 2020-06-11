<?php


namespace App\Service;


use App\Models\User;

class UserService
{
    public function getAllUsers()
    {
        return User::with(['skills', 'work'])
            ->searchName();
    }
}
