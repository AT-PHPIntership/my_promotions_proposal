<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use App\Repositories\Contracts\RepositoryInterface2;
use Exception;

/**
 * Class Repository
 *
 * @package Bosnadev\Repositories\Eloquent
 */
abstract class Repository2 implements RepositoryInterface2
{
    /**
     * App
     *
     * @var App
     */
    private $app;
    /**
     * Model
     *
     * @var Model
     */
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
