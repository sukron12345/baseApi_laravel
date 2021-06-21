<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::with('tags')
            ->latest()
            ->paginate(10);

        return response_api(
            Response::HTTP_OK,
            true,
            __('product.get_list'),
            $data
        );
    }
}
