<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Category;
use App\Services\FrontService;
use Illuminate\View\View;

class FrontController extends Controller
{
    //
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        // dd($data); 
        return view('front.index', $data);
    }

    public function details(Shoe $shoe) // model binding
    {
        return view('front.details', compact('shoe'));
    }

    public function category(Category $category): View
    {
        return view('front.category', compact('category'));
    }
}
