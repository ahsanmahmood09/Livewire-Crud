<?php

namespace App\Services\UserServices;

use App\Repository\Users\Interfaces\UserRepositoryInterface;

class UserServices
{
    protected $userRepository;

    /**
     * UserServices  constructor.
     *
     * @param  UserRepositoryInterface  $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param  int  $perPage
     * @param  string  $searchByName
     * @param  array  $with
     * @return mixed
     */
    public function getAllUsersPaginatedResults(
        int $perPage,
        string $searchByName,
        array $with = []
    )
    {
        $users = $this->userRepository->newModelInstance()::query();

        if (! blank($searchByName)) {
            $users->where('name', 'like', '%'.$searchByName.'%');
        }

        return $users->with($with)->paginate($perPage);
    }

    /**
     * @param  int  $id
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }
}
