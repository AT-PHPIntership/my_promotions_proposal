<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository as Category;

class CategoryController extends Controller
{
    /**
     * Category
     *
     * @var Category
     */
    private $category;

    /**
     * Construct a CategoryController
     *
     * @param int $category category
     */
    public function __construct(Category $category)
    {
         $this->category = $category;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = $this->category->all();
        return view('frontend.dashboard.index')->with($data);
    }
}
