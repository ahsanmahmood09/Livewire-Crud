<?php

namespace App\Services\UserServices;

use App\Repository\Users\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
     * @param  array  $columns
     * @param  array  $with
     * @param  string  $orderBy
     * @param  string  $sortBy
     * @return Collection
     */
    public function allUsers(
        array $columns = ['*'],
        array $with = [],
        string $orderBy = 'id',
        string $sortBy = 'asc'
    )
    {
        return $this->userRepository->all($columns, $with, $orderBy, $sortBy);
    }

}