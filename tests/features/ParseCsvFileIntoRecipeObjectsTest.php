<?php

use App\Recipe;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParseCsvFileIntoRecipeObjectsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanParseCSVFileIntoRecipeObjects()
    {
        $recipes = factory(App\Recipe::class, 3)->make();

        $testFilePath = storage_path('app/test.csv');
        $actualFilePath = storage_path('app/recipes.csv');

        $fakeRecipe =
            [
                'id' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'box_type' => 'vegetarian',
                'title' => 'Fennel Crusted Pork with Italian Butter Beans',
                'slug' => 'fennel-crusted-pork-with-italian-butter-beans',
                'short_title' => '',
                'marketing_description' => 'A classic roast with a twist. The pork loin is marinated in rosemary, fennel seeds and chilli flakes then teamed with baked potato wedges and butter beans in tomato sauce. Enjoy within 5-6 days of delivery.',
                'calories_kcal' => 511,
                'protein_grams' => 11,
                'fat_grams' => 61,
                'carbs_grams' => 0,
                'bulletpoint1' => 'A roast with a twist',
                'bulletpoint2' => 'Low fat & high protein',
                'bulletpoint3' => 'With roast potatoes',
                'recipe_diet_type_id' => 'meat',
                'season' => 'all',
                'base' => 'beans/lentils',
                'protein_source' => 'pork',
                'preparation_time_minutes' => 45,
                'shelf_life_days' => 4,
                'equipment_needed' => 'Pestle & Mortar (optional)',
                'origin_country' => 'Great Britain',
                'recipe_cuisine' => 'british',
                'in_your_box' => 'pork tenderloin, potatoes, butter beans, garlic, fennel seeds, medium onion, chilli flakes, fresh rosemary, tomatoes, vegetable stock cube',
                'gousto_reference' => 55
            ];

        $headers = implode(',', array_keys($fakeRecipe));

        //$fakeRecipes = json_encode($fakeRecipes);

        File::put($testFilePath, $headers);


        File::append($testFilePath, implode(',', array_values($fakeRecipe)));

//        $filePath = $testFilePath;
//
//        $recipes = Recipe::createFromCsvFile($filePath);
//
//        dd($recipes->first());


    }
}
