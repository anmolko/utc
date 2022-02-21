<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductPrimaryCategory;

class AutoCompleteController extends Controller
{
    function fetch(Request $request)
    {
        if($request->get('query')){
            $query = $request->get('query');
            $search_product_data = Product::with(['primaryCategory','secondaryCategory'])
                            ->where('status','active')
                            ->where('name', 'LIKE', '%' . $query . '%')
                            ->take(6)->get();
            $random_product_data = Product::with(['primaryCategory','secondaryCategory'])
                            ->where('status','active')
                            ->orderBy(\DB::raw('RAND()'))
                            ->take(6)->get();

            $search_primary_data = ProductPrimaryCategory::where('name', 'LIKE', '%' . $query . '%')->get();
            $primary_data = ProductPrimaryCategory::get();
            
            return view('frontend.pages.products.auto_suggestion', compact('random_product_data','search_product_data','search_primary_data','primary_data'));
        }
    }
}
