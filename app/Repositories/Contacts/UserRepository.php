<?php


namespace App\Repositories\Contacts;


use App\Models\User;

interface UserRepository
{
    public function createNewUser(array $input);

    public function isEmailInUse($email);

    public function updateUser(User $user, array $request);
}