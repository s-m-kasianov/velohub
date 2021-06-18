<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\FiltersService;

class CategoryController extends Controller
{
    public function __invoke(Request $request, string $slug, int $id, string $path = '')
    {
        $category = Category::where('id', $id)->where('is_active', true)->firstOrFail();

        $query = $category->products()
            ->leftJoin('variants', 'products.id', '=', 'variants.product_id')
            ->where('is_active', true);

        $filters = FiltersService::init($query, $request->filter)
            ->addSliderFilter('products.price', 'price', 'Price')
            ->addPlainFilter('products.brand', 'brand', 'Brand')
            ->addFiltersSet($category->features, 'products.features')
            ->addFiltersSet($category->parameters, 'variants.parameters')
            ->applyFilters()
            ->getFilters();

        $products = $query->select('variants.*', 'products.*')
            ->orderBy('products.' . $request->orderBy, $request->orderWay)
            ->paginate();

        $route = route('category', compact(['slug', 'id']));

        $meta = (object)[
            'title' => $category->title,
            'description' => $category->description,
            'keywords' => $category->keywords,
        ];

        return view('category', compact(['category', 'filters', 'products', 'route', 'meta']));
    }
}
