<?php


namespace App\Repositories\Implementations;


use App\Models\User;
use App\Models\UserProfile;
use App\Repositories\Contacts\UserProfileRepository;
use File;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class EloquentUserProfile implements UserProfileRepository
{

    /** @var UserProfile */
    private $model;

    /**
     * @var Image
     */
    private $image;

    public function __construct(UserProfile $profile, Image $image)
    {
        $this->model = $profile;
        $this->image = $image;
    }

    public function createNewProfile(array $input, User $user)
    {
        $input['user_id'] = $user->id;

        return $this->model->create($input);
    }

    public function updateProfile(UserProfile $profile, array $request)
    {
        $profile->skills()->sync($request['skill']);
        $profile->smer_id = $request['smer_id'];
        $profile->save();

        return $profile;
    }

    public function handleAvatarImage(UserProfile $profile, UploadedFile $file)
    {
        $folderPath = public_path("avatars/{$profile->User->index}");
        if (!empty($profile->getRawAvatarName())) {
            File::delete("{$folderPath}/{$profile->getRawAvatarName()}");
        }
        if (!File::isDirectory($folderPath)) {
            File::makeDirectory($folderPath);
        }
        $newAvatarName = time() . '-' . $file->getClientOriginalName();
        Image::make($file->getRealPath())->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save("{$folderPath}/{$newAvatarName}");
        $profile->avatar = $newAvatarName;
        $profile->save();

        return $profile;
    }
}