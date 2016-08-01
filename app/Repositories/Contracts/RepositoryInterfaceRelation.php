<?php
namespace App\Repositories\Contracts;

interface RepositoryInterfaceRelation
{
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
     * @return mixed
     */
    public function search(array $models, $table, $attrPro, $attrBus, $value, $perPage = 15);
    
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
    public function searchAdvance(array $models, $tableBus, $tablePivot, $attrPro, $attrBus, $attrPivot, $value, $valuePivot, $perPage = 15);
}
