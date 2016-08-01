<?php

namespace App\Repositories;

use App\Repositories\Eloquent\RepositoryRelation;

class RelationRepository extends RepositoryRelation
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Promotion';
    }
}
