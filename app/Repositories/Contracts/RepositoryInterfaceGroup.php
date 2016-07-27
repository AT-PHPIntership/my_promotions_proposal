<?php
namespace App\Repositories\Contracts;

interface RepositoryInterfaceGroup
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

    /**
     * Eager load the relationships for the models.
     *
     * @param array          $models    models
     * @param string         $table     table
     * @param string         $attribute attribute
     * @param integer/string $value     value
     * @param integer        $perPage   perPage
     *
     * @return mixed
     */
    public function eagerLoadRelations(array $models, $table, $attribute, $value, $perPage = 15);
}
