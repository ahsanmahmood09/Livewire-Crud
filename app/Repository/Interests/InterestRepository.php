<?php

namespace App\Repository\Interests;

use App\Models\Interest;
use App\Repository\Base\BaseRepository;
use App\Repository\Interests\Interfaces\InterestRepositoryInterface;

class InterestRepository extends BaseRepository implements InterestRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param  Interest $interest
     */
    public function __construct(Interest $interest)
    {
        parent::__construct($interest);
    }
}
