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
     * @param integer/string $paginate  paginate
     *
     * @return mixed
     */
    public function eagerLoadRelations(array $models, $table, $attribute, $value, $paginate = true, $perPage = 15);

    /**
     * Function check followed.
     *
     * @param object  $relation   relation
     * @param integer $idUser     idUser
     * @param integer $idBusiness idBusiness
     *
     * @return mixed
     */
    public function checkFollowed($relation, $idUser, $idBusiness);

    /**
     * Function detach followed.
     *
     * @param integer $idUser     idUser
     * @param integer $idBusiness idBusiness
     *
     * @return mixed
     */
    public function detachFollowed($idUser, $idBusiness);

    /**
     * Function attach followed.
     *
     * @param integer $idUser     idUser
     * @param integer $idBusiness idBusiness
     *
     * @return mixed
     */
    public function attachFollowed($idUser, $idBusiness);

    /**
     * Function count with condition.
     *
     * @param string         $attribute attribute
     * @param integer/string $value     value
     *
     * @return mixed
     */
    public function count($attribute, $value);
}
