<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Recipe;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Validator;

class RecipeController extends Controller
{
    protected $recipes = null;

    public function __construct()
    {
        $this->recipes = Recipe::createFromCsvFile(storage_path('app/recipes.csv'));
    }

    public function returnResponse($data, $statusCode = 200)
    {
        return response($data, $statusCode, ['Content-Type' => 'application/json']);
    }

    protected function paginate($items, $itemsPerPage = 2)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentPagesItems = $items->slice(($currentPage - 1) * $itemsPerPage, $itemsPerPage);

        return new LengthAwarePaginator($currentPagesItems, count($items), $itemsPerPage);
    }

    public function index()
    {
        $cuisine = request('cuisine');

        $recipes = $cuisine ? $this->paginate($this->recipes->where('recipe_cuisine', '=', $cuisine)) : $this->recipes;

        return $this->returnResponse($recipes);
    }

    public function show($id)
    {
        $recipe = $this->recipes->find($id);

        if ( ! $recipe ) {
            return $this->returnResponse("That recipe can't be found", 404);
        }

        return $this->returnResponse($recipe, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
//            'created_at' => 'required|date',
//            'updated_at' => 'required|date',
//            'box_type' => 'required',
            'title' => 'required',
//            'slug' => 'required',
//            'short_title' => '',
//            'marketing_description' => 'required',
//            'calories_kcal' => 'required|integer',
//            'protein_grams' => 'required|integer',
//            'fat_grams' => 'required|integer',
//            'carbs_grams' => 'required|integer',
//            'bulletpoint1' => 'required',
//            'bulletpoint2' => 'required',
//            'bulletpoint3' => 'required',
//            'recipe_diet_type_id' => 'required',
//            'season' => 'required',
//            'base' => 'required',
//            'protein_source' => 'required',
//            'preparation_time_minutes' => 'required|integer',
//            'shelf_life_days' => 'required|integer',
//            'equipment_needed' => 'required',
//            'origin_country' => 'required',
//            'recipe_cuisine' => 'required',
//            'in_your_box' => 'required',
//            'gousto_reference' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $data = [
                'error_code' => 422,
                'errors' => $validator->errors()->getMessages()
            ];
            return response()->json($data, 422);
        }

        return new Recipe($request->all());
    }

    public function update($id, Request $request)
    {
        $recipe = $this->recipes->find($id);

        if ( ! $recipe ) {
            return $this->returnResponse("That recipe can't be found", 404);
        }

        $validator = Validator::make($request->all(), [
//            'created_at' => 'required|date',
//            'updated_at' => 'required|date',
//            'box_type' => 'required',
            'title' => 'required',
//            'slug' => 'required',
//            'short_title' => '',
//            'marketing_description' => 'required',
//            'calories_kcal' => 'required|integer',
//            'protein_grams' => 'required|integer',
//            'fat_grams' => 'required|integer',
//            'carbs_grams' => 'required|integer',
//            'bulletpoint1' => 'required',
//            'bulletpoint2' => 'required',
//            'bulletpoint3' => 'required',
//            'recipe_diet_type_id' => 'required',
//            'season' => 'required',
//            'base' => 'required',
//            'protein_source' => 'required',
//            'preparation_time_minutes' => 'required|integer',
//            'shelf_life_days' => 'required|integer',
//            'equipment_needed' => 'required',
//            'origin_country' => 'required',
//            'recipe_cuisine' => 'required',
//            'in_your_box' => 'required',
//            'gousto_reference' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $data = [
                'error_code' => 422,
                'errors' => $validator->errors()->getMessages()
            ];
            return response()->json($data, 422);
        }

        collect($request->all())->each(function($item, $key) use ($recipe) {
           $recipe->{$key} = $item;
        });

        return $this->returnResponse($recipe, 200);
    }

    public function rate($id, Request $request)
    {
        $recipe = $this->recipes->find($id);

        if ( ! $recipe ) {
            return $this->returnResponse("That recipe can't be found", 404);
        }

        $rating = $request->only('rating');

        $validator = Validator::make($rating, [
            'rating' => 'required|integer|between:1,5',
        ]);

        if ($validator->fails()) {
            $data = [
                'error_code' => 422,
                'errors' => $validator->errors()->getMessages()
            ];
            return response()->json($data, 422);
        }

        $data = [
            'recipe' => $recipe,
            'rating' => $rating
        ];

        return $this->returnResponse($data, 200);
    }
}
