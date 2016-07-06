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
     * Function show a business
     *
     * @param int $id id
     *
     * @return void
     */
    public function show($id);
}
