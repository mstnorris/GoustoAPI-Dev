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
    public function testCanViewAllRecipes()
    {
        $this->json('GET', '/api/v1/recipes')
            ->seeJsonContains([
                'id' => 1, 'title' => 'Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad'
            ])
            ->seeJsonContains([
                'id' => 10, 'title' => 'Pork Katsu Curry'
            ])
            ->dontSeeJson([
                'id' => 11, 'title' => "This title doesn't exist"
            ]);
    }

    public function testCanViewASingleRecipe()
    {
        $this->json('GET', '/api/v1/recipes/1')
            ->seeJsonContains([
                'id' => 1, 'title' => 'Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad'
            ])
            ->dontSeeJson([
                'id' => 11, 'title' => "This title doesn't exist"
            ]);
    }

    public function testCanViewRecipesByCuisine()
    {
        $this->json('GET', '/api/v1/recipes?cuisine=british')
            ->seeJsonContains([
                "total" => 4,
                "per_page" => 2,
                "current_page" => 1,
                "last_page" => 2,
                "next_page_url" => "/?page=2",
                "prev_page_url" => null,
                "from" => 1,
                "to" => 2
            ])
            ->seeJsonContains([
                'id' => 3, 'title' => 'Umbrian Wild Boar Salami Ragu with Linguine'
            ])
            ->seeJsonContains([
                'id' => 4, 'title' => 'Tenderstem and Portobello Mushrooms with Corn Polenta'
            ])
            ->dontSeeJson([
                "total" => 10,
                "per_page" => 4,
                "current_page" => 3,
                "last_page" => 7,
                "next_page_url" => "/?page=4",
                "prev_page_url" => "/?page=8",
                "from" => 3,
                "to" => 6
            ])
            ->dontSeeJson([
                'id' => 5, 'title' => 'Fennel Crusted Pork with Italian Butter Beans'
            ])
            ->dontSeeJson([
                'id' => 7, 'title' => 'Courgette Pasta Rags'
            ]);

        $this->json('GET', '/api/v1/recipes?cuisine=british&page=2')
            ->seeJsonContains([
                "total" => 4,
                "per_page" => 2,
                "current_page" => 2,
                "last_page" => 2,
                "next_page_url" => null,
                "prev_page_url" => "/?page=1",
                "from" => 3,
                "to" => 4
            ])
            ->seeJsonContains([
                'id' => 5, 'title' => 'Fennel Crusted Pork with Italian Butter Beans'
            ])
            ->seeJsonContains([
                'id' => 7, 'title' => 'Courgette Pasta Rags'
            ])
            ->dontSeeJson([
                "total" => 5,
                "per_page" => 3,
                "current_page" => 7,
                "last_page" => 6,
                "next_page_url" => "/?page=2",
                "prev_page_url" => null,
                "from" => 1,
                "to" => 2
            ])
            ->dontSeeJson([
                'id' => 3, 'title' => 'Umbrian Wild Boar Salami Ragu with Linguine'
            ])
            ->dontSeeJson([
                'id' => 4, 'title' => 'Tenderstem and Portobello Mushrooms with Corn Polenta'
            ]);
    }

    public function testCanRateARecipe()
    {
        $this->json('POST', '/api/v1/recipes/1', ['rating' => 3])
            ->seeJsonStructure([
                'recipe',
                'rating' => [
                    'rating'
                ]
            ])
            ->seeJsonContains([
                'id' => 1
            ])
            ->dontSeeJson([
                'id' => 3
            ]);

        $this->json('POST', '/api/v1/recipes/1', ['rating' => 'notAnInteger'])
            ->seeJsonStructure([
                'error_code',
                'errors' => [
                    'rating' => []
                ]
            ])
            ->seeJsonContains([
                'error_code' => 422,
                'errors' => [
                    'rating' => [
                        "The rating must be an integer.",
                        "The rating must be between 1 and 5."
                    ]
                ]
            ]);

        $this->json('POST', '/api/v1/recipes/what', ['rating' => 3])
            ->seeJsonContains(["That recipe can't be found"]);

        $this->json('POST', '/api/v1/recipes/11', ['rating' => 3])
            ->seeJsonContains(["That recipe can't be found"]);
    }

    public function testCanUpdateAnExistingRecipe()
    {
        $this->json('PATCH', '/api/v1/recipes/1', ['title' => 'This is the updated title'])
            ->seeJsonContains([
                'id' => 1, 'title' => 'This is the updated title'
            ])
            ->dontSeeJson([
                'title' => "Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad"
            ]);

        $this->json('PATCH', '/api/v1/recipes/1', ['title' => null])
            ->seeJsonStructure([
                'error_code',
                'errors' => [
                    'title' => []
                ]
            ])
            ->seeJsonContains([
                'error_code' => 422,
                'errors' => [
                    'title' => [
                        "The title field is required."

                    ]
                ]
            ]);
    }

    public function testCanStoreANewRecipe()
    {
        $this->json('POST', '/api/v1/recipes', ['title' => 'This is a new title'])
            ->seeJsonContains([
                'title' => 'This is a new title'
            ])
            ->dontSeeJson([
                'title' => "This title doesn't exist"
            ]);

        $this->json('POST', '/api/v1/recipes', ['title' => null])
            ->seeJsonStructure([
                'error_code',
                'errors' => [
                    'title' => []
                ]
            ])
            ->seeJsonContains([
                'error_code' => 422,
                'errors' => [
                    'title' => [
                        "The title field is required."

                    ]
                ]
            ]);
    }
}
