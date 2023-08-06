<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('clients.product');
    }

    public function store(ProductRequest $request)
    {
      dd($request);
    }



}
