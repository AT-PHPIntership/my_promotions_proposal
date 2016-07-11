<?php
namespace App\Repositories\Contracts;

interface RepositoryInterface
{
        /**
         * Function get all
         *
         * @param array $columns columns
         *
         * @return mixed
         */
    public function all($columns = array('*'));

     /**
      * Function create
      *
      * @param array $data data
      *
      * @return mixed
      */
    public function create(array $data);

     /**
      * Function update
      *
      * @param array $data data
      * @param int   $id   id
      *
      * @return mixed
      */
    public function update(array $data, $id);

     /**
      * Function delete
      *
      * @param int $id id
      *
      * @return mixed
      */
    public function delete($id);

     /**
      * Function find
      *
      * @param int   $id      id
      * @param array $columns columns
      *
      * @return mixed
      */
    public function find($id, $columns = array('*'));

     /**
      * Funciton replaytionship
      *
      * @param string $relation columns
      * @param array  $columns  columns
      *
      * @return mixed
      */
    public function withRelationship($relation, $columns = '*');
}
