<?php
namespace App\Repositories\Business;

interface BusinessInterface
{
    /**
     * Function list all business
     *
     * @return void
     */
    public function getAll();

    /**
     * Function find a business
     *
     * @param int $id id
     *
     * @return void
     */
    public function find($id);

    /**
     * Function update status a business
     *
     * @param int $id id
     *
     * @return void
     */
    public function updateStatus($id);
}
