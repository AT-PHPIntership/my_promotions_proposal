<?php

namespace App\Repositories;

use App\Repositories\Eloquent\RepositoryGroup;

class RatingRepository extends RepositoryGroup
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Rating';
    }
}
