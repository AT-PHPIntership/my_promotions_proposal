<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use Exception;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

 /**
  * Class Repository
  *
  * @package Bosnadev\Repositories\Eloquent
  */

abstract class Repository implements RepositoryInterface
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
      * @throws \App\Repositories\Exceptions
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
      * Function get all
      *
      * @param array $columns columns
      *
      * @return mixed
      */
    public function all($columns = array('*'))
    {
               return $this->model->get($columns);
    }

    /**
      * Function create
      *
      * @param array $data data
      *
      * @return mixed
      */
    public function create(array $data)
    {
               return $this->model->create($data);
    }

    /**
      * Function update
      *
      * @param array  $data      data
      * @param int    $id        id
      * @param string $attribute attribute
      *
      * @return mixed
      */
    public function update(array $data, $id, $attribute = "id")
    {
               return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
      * Function delete
      *
      * @param int $id id
      *
      * @return mixed
      */
    public function delete($id)
    {
               return $this->model->destroy($id);
    }

    /**
      * Function find
      *
      * @param int   $id      id
      * @param array $columns columns
      *
      * @return mixed
      */
    public function find($id, $columns = array('*'))
    {
               return $this->model->find($id, $columns);
    }

    /**
      * Funciton relationship
      *
      * @param string $relation relation
      * @param array  $columns  columns
      *
      * @return mixed
      */
    public function withRelationship($relation, $columns = '*')
    {
               return $this->model->with($relation)->get();
    }

    /**
      * Function makeModel
      *
      * @return \Illuminate\Database\Eloquent\Builder
      * @throws Exception
      */
    public function makeModel()
    {
               $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model->newQuery();
    }
}
