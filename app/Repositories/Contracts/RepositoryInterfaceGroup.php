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
     * Funciton groupByHaving
     *
     * @param array  $columns   columns
     * @param string $groupby   groupby
     * @param string $field     field
     * @param string $attribute attribute
     * @param string $orderby   orderby
     * @param string $sort      sort
     *
     * @return mixed
     */
    public function groupByHaving($columns, $groupby, $field, $attribute, $orderby = 'id', $sort = 'desc');

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

    /**
     * Function search.
     *
     * @param array          $models   models
     * @param string         $table    table
     * @param string         $attrPro  attrPro
     * @param string         $attrBus  attrBus
     * @param integer/string $value    value
     * @param string         $operator operator
     * @param integer        $perPage  perPage
     *
     * @return mixed
     */
    public function search(array $models, $table, $attrPro, $attrBus, $value, $operator = '=', $perPage = 15);
}
