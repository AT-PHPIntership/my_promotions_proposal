<?php
namespace App\Repositories\City;

use App\Repositories\City\CityInterface as CityInterface;

use App\Models\City;

class CityRepository implements CityInterface
{
    
    public $city;
    
    /**
     * Create a new CityInterface instance.
     *
     * @param CityInterface $city city
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
    
    /**
     * Interface function get all city.
     *
     * @return all object city
     */
    public function getAll()
    {
        return $this->city->getAll();
    }
}
