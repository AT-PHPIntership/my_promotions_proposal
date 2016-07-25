<?php
namespace App\Repositories\Contracts;

interface RepositoryInterface2
{
    /**
     * Funciton groupBy
     *
     * @param array  $columns columns
     * @param string $groupby groupby
     * @param string $orderby orderby
     * @param string $sort    sort
     *
     * @return mixed
     */
    public function groupBy($columns, $groupby, $orderby = 'id', $sort = 'desc');
}
