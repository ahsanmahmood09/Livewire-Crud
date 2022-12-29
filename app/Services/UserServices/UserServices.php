<?php

namespace App\Services\UserServices;

use App\Repository\Users\Interfaces\UserRepositoryInterface;

class UserServices
{
    protected $userRepository;

    /**
     * UserServices  constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param  int  $perPage
     * @param  string  $searchByEmail
     * @param  array  $with
     * @return mixed
     */
    public function getAllUsersPaginatedResults(
        int    $perPage,
        string $searchByEmail,
        array  $with = []
    )
    {
        $users = $this->userRepository->newModelInstance()::query();

        if (!blank($searchByEmail)) {
            $users->where('email', 'like', '%' . $searchByEmail . '%');
        }

        return $users->with($with)->paginate($perPage);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneUserById(int $id)
    {
        return $this->userRepository->findBy(['id' => $id], ['interests']);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createUser(array $attributes)
    {
        return $this->userRepository->insert($attributes);
    }

    /**
     * @param  array  $attributes
     * @param  int  $id
     * @return mixed
     */
    public function updateUser(array $attributes, int $id)
    {
        return $this->userRepository->update($attributes, $id);
    }
}
