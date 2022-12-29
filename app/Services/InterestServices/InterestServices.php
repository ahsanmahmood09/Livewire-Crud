<?php

namespace App\Services\InterestServices;

use App\Repository\Interests\Interfaces\InterestRepositoryInterface;

class InterestServices
{
    protected $interestRepository;

    /**
     * UserServices  constructor.
     *
     * @param InterestRepositoryInterface $interestRepository
     */
    public function __construct(InterestRepositoryInterface $interestRepository)
    {
        $this->interestRepository = $interestRepository;
    }

    /**
     * @return mixed
     */
    public function getAllInterests()
    {
        return $this->interestRepository->all();
    }
}
