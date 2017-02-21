<?php


namespace App\Repositories\Implementations;


use App\Models\User;
use App\Repositories\Contacts\UserRepository;
use Illuminate\Database\Query\Builder;

class EloquentUser implements UserRepository
{
    /** @var User|Builder */
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function createNewUser(array $input)
    {
        return $this->model->create(
            [
                'index' => $input['index'],
                'email' => $input['email'],
                'name' => $input['name'],
                'surename' => $input['surename'],
                'password' => bcrypt($input['password'])
            ]
        );
    }

    public function isEmailInUse($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function updateUser(User $user, array $request)
    {
        $user->name = $request['name'];
        $user->surename = $request['surename'];
        if (!empty($request['password'])) {
            $user->password = bcrypt($request['password']);
        }
        $user->save();

        return $user;
    }
}