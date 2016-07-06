<?php
namespace App\Repositories\Business;

use App\Repositories\Business\BusinessInterface as BusinessInterface;
use App\Models\Business;

class BusinessRepository implements BusinessInterface
{
    public $business;
    
    /**
     * Construct a BusinessRepository
     *
     * @param int $business business
     */
    public function __construct(Business $business)
    {
        $this->business = $business;
    }

    /**
     * List all business
     *
     * @return void
     */
    public function getAll()
    {
        return $this->business->getAll();
    }

    /**
     * Show a business
     *
     * @param int $id id
     *
     * @return void
     */
    public function show($id)
    {
        return $this->business->showBusiness($id);
    }
}
