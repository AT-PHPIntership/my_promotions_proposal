<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use App\Repositories\Contracts\RepositoryInterfaceRelation;
use Exception;

/**
 * Class Repository
 *
 * @package Bosnadev\Repositories\Eloquent
 */
abstract class RepositoryRelation implements RepositoryInterfaceRelation
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
     * Function find
     *
     * @param string $attribute attribute
     * @param int    $value     value
     * @param int    $id        id
     * @param array  $columns   columns
     *
     * @return mixed
     */
    public function findWhere($attribute, $value, $id, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->find($id, $columns);
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
