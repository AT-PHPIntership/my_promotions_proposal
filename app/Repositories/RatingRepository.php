<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository2;

class RatingRepository extends Repository2
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
