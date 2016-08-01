<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use App\Repositories\Contracts\RepositoryInterfaceGroup;
use Exception;

/**
 * Class Repository
 *
 * @package Bosnadev\Repositories\Eloquent
 */
abstract class RepositoryGroup implements RepositoryInterfaceGroup
{
    /**
     * App, Model
     *
     * @var App
     * @var Model
     */
    private $app;
    protected $model;

    /**
     * Construct
     *
     * @param App $app app
     *
     * @throws \App\Repositories\Exceptions\RepositoryException
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * Function group by
     *
     * @param array  $columns columns
     * @param string $groupby groupby
     * @param string $orderby orderby
     * @param string $sort    sort
     *
     * @return mixed
     */
    public function groupBy($columns, $groupby, $orderby = 'id', $sort = 'desc')
    {
        return $this->model->selectRaw($columns)->groupBy($groupby)->orderBy($orderby, $sort)->get();
    }

    /**
     * Eager load the relationships for the models.
     *
     * @param array          $models    models
     * @param string         $table     table
     * @param string         $attribute attribute
     * @param integer/string $value     value
     * @param integer        $perPage   perPage
     *
     * @return array
     */
    public function eagerLoadRelations(array $models, $table, $attribute, $value, $perPage = 15)
    {
        return $this->model->with($models)->whereHas($table, function ($query) use ($value, $attribute) {
            $query->where($attribute, $value);
        })->paginate($perPage);
    }

    /**
     * Function search.
     *
     * @param array          $models  models
     * @param string         $table   table
     * @param string         $attrPro attrPro
     * @param string         $attrBus attrBus
     * @param integer/string $value   value
     * @param integer        $perPage perPage
     *
     * @return array
     */
    public function search(array $models, $table, $attrPro, $attrBus, $value, $perPage = 15)
    {
        return $this->model->where($attrPro, 'like', $value)->with($models)->orWhereHas($table, function ($query) use ($value, $attrBus) {
            $query->where($attrBus, 'like', $value);
        })->paginate($perPage);
    }

    /**
     * Function search advance.
     *
     * @param array          $models     models
     * @param string         $tableBus   tableBus
     * @param string         $tablePivot tablePivot
     * @param string         $attrPro    attrPro
     * @param string         $attrBus    attrBus
     * @param string         $attrPivot  attrPivot
     * @param integer/string $value      value
     * @param integer/string $valuePivot valuePivot
     * @param integer        $perPage    perPage
     *
     * @return mixed
     */
    public function searchAdvance(array $models, $tableBus, $tablePivot, $attrPro, $attrBus, $attrPivot, $value, $valuePivot, $perPage = 15)
    {
        return $this->model->where($attrPro, 'like', $value)->with($models)->orWhereHas($tableBus, function ($query) use ($attrBus, $value, $tablePivot, $attrPivot, $valuePivot) {
                                    $query->where($attrBus, 'like', $value)->orWhereHas($tablePivot, function ($q) use ($attrPivot, $valuePivot) {
                                        $q->where($attrPivot, '=', $valuePivot);
                                    });
        })->paginate($perPage);
    }

    /**
     * Function check followed.
     *
     * @param object  $relation   relation
     * @param integer $idUser     idUser
     * @param integer $idBusiness idBusiness
     *
     * @return mixed
     */
    public function checkFollowed($relation, $idUser, $idBusiness)
    {
        $check = $this->model->find($idUser)->$relation->find($idBusiness);
        if (is_null($check)) {
            return false;
        }
        return true;
    }

    /**
     * Function detach followed.
     *
     * @param integer $idUser     idUser
     * @param integer $idBusiness idBusiness
     *
     * @return mixed
     */
    public function detachFollowed($idUser, $idBusiness)
    {
        return $this->model->find($idUser)->followedBusinesses()->detach($idBusiness);
    }

    /**
     * Function attach followed.
     *
     * @param integer $idUser     idUser
     * @param integer $idBusiness idBusiness
     *
     * @return mixed
     */
    public function attachFollowed($idUser, $idBusiness)
    {
        return $this->model->find($idUser)->followedBusinesses()->attach($idBusiness);
    }

    /**
     * Function count with condition.
     *
     * @param string         $attribute attribute
     * @param integer/string $value     value
     *
     * @return mixed
     */
    public function count($attribute, $value)
    {
        return $this->model->where($attribute, $value)->count();
    }

    /**
     * Function makeModel
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            //return Exception
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }
}
