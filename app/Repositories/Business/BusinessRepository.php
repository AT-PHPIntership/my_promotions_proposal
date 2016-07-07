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
        return $this->business->all();
    }

    /**
     * Find a business
     *
     * @param int $id id
     *
     * @return void
     */
    public function find($id)
    {
        return $this->business->findOrFail($id);
    }

    /**
     * Update status a business
     *
     * @param int $id id
     *
     * @return void
     */
    public function updateStatus($id)
    {
        $business = $this->find($id);
        $business->status = config('app.actived');
        $business->save();
    }
}
