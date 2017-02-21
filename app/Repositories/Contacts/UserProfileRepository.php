<?php


namespace App\Repositories\Contacts;


use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\UploadedFile;

interface UserProfileRepository
{
    public function createNewProfile(array $input, User $user);

    public function updateProfile(UserProfile $profile, array $request);

    public function handleAvatarImage(UserProfile $profile, UploadedFile $file);
}