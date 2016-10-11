<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'id','created_at','updated_at','box_type','title','slug','short_title','marketing_description','calories_kcal','protein_grams','fat_grams','carbs_grams','bulletpoint1','bulletpoint2','bulletpoint3','recipe_diet_type_id','season','base','protein_source','preparation_time_minutes','shelf_life_days','equipment_needed','origin_country','recipe_cuisine','in_your_box','gousto_reference'
    ];

    protected $dateFormat = 'd/m/Y H:i:s';

    public static function createFromCsvFile($filePath)
    {
        $file = file($filePath);

        $rows = collect($file)->map(function($item, $key) {
           return str_getcsv($item);
        });

        $headers = $rows->shift();

        $keyValuePairs = [];
        foreach ($rows as $row) {
            $keyValuePairs[] = array_combine($headers, $row);
        }

        return self::hydrate($keyValuePairs);
    }
}
