# Gousto API

## Contents

1. [Gousto API Repository](https://github.com/mstnorris/GoustoAPI-Dev)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [API Documentation](instructions.md)
5. [Report](report.md) 

## Instructions

### Version 1

Prepend all URIs with `/api/v1` for version 1 of the api.

### API Operations & Endpoints

| Operation | Method | URI | Arguments & Data |
| --- | --- | --- | --- | --- |
| Fetch all Recipes | GET | recipes | NONE |
| Fetch a Recipe by ID | GET | recipes/{id} | integer |
| Fetch all recipes for a specific cuisine (should paginate) | GET | recipes?cuisine={cuisine} | string |
| Rate an existing recipe between 1 and 5 | POST | recipes/{id} | integer (form-data) **key**=rating **value**={integer} |
| Update an existing recipe | PATCH | recipes/{id} | integer (x-www-form-urlencoded) |
| Store a new Recipe | POST | recipes | Data for a new Recipe (see `$fillable` property in Recipe.php model) |

### Fetch all Recipes

**GET** */recipes*

```json
[
  {
    "id": 1,
    "created_at": "30/06/2015 17:58:00",
    "updated_at": "30/06/2015 17:58:00",
    "box_type": "vegetarian",
    "title": "Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad",
    "slug": "sweet-chilli-and-lime-beef-on-a-crunchy-fresh-noodle-salad",
    "short_title": "",
    "marketing_description": "Here we've used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if you're a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be",
    "calories_kcal": "401",
    "protein_grams": "12",
    "fat_grams": "35",
    "carbs_grams": "0",
    "bulletpoint1": "",
    "bulletpoint2": "",
    "bulletpoint3": "",
    "recipe_diet_type_id": "meat",
    "season": "all",
    "base": "noodles",
    "protein_source": "beef",
    "preparation_time_minutes": "35",
    "shelf_life_days": "4",
    "equipment_needed": "Appetite",
    "origin_country": "Great Britain",
    "recipe_cuisine": "asian",
    "in_your_box": "",
    "gousto_reference": "59"
  },
  {
    "id": 10,
    "created_at": "05/07/2015 17:58:00",
    "updated_at": "05/07/2015 17:58:00",
    "box_type": "gourmet",
    "title": "Pork Katsu Curry",
    "slug": "pork-katsu-curry",
    "short_title": "",
    "marketing_description": "Comprising all the best bits of the classic American number and none of the mayo, this is a warm & tasty chicken and bulgur salad with just a hint of Scandi influence. A beautifully summery medley of flavours and textures",
    "calories_kcal": "511",
    "protein_grams": "11",
    "fat_grams": "62",
    "carbs_grams": "0",
    "bulletpoint1": "",
    "bulletpoint2": "",
    "bulletpoint3": "",
    "recipe_diet_type_id": "meat",
    "season": "all",
    "base": "",
    "protein_source": "pork",
    "preparation_time_minutes": "45",
    "shelf_life_days": "4",
    "equipment_needed": "Appetite",
    "origin_country": "Great Britain",
    "recipe_cuisine": "mexican",
    "in_your_box": "",
    "gousto_reference": "56"
  }
]
```

### Fetch a Recipe by ID

**GET** */recipes/{id}*

```json
{
  "id": 3,
  "created_at": "30/06/2015 17:58:00",
  "updated_at": "30/06/2015 17:58:00",
  "box_type": "vegetarian",
  "title": "Umbrian Wild Boar Salami Ragu with Linguine",
  "slug": "umbrian-wild-boar-salami-ragu-with-linguine",
  "short_title": "",
  "marketing_description": "This delicious pasta dish comes from the Italian region of Umbria. It has a smoky and intense wild boar flavour which combines the earthy garlic, leek and onion flavours, while the chilli flakes add a nice deep aroma. Enjoy within 5-6 days of delivery.",
  "calories_kcal": "609",
  "protein_grams": "17",
  "fat_grams": "29",
  "carbs_grams": "0",
  "bulletpoint1": "",
  "bulletpoint2": "",
  "bulletpoint3": "",
  "recipe_diet_type_id": "meat",
  "season": "all",
  "base": "pasta",
  "protein_source": "pork",
  "preparation_time_minutes": "35",
  "shelf_life_days": "4",
  "equipment_needed": "Appetite",
  "origin_country": "Great Britain",
  "recipe_cuisine": "british",
  "in_your_box": "",
  "gousto_reference": "1"
}
```

### Fetch all recipes for a specific cuisine (should paginate)

**GET** */recipes?cuisine={cuisine}&page={integer}*

```json
{
  "total": 4,
  "per_page": 2,
  "current_page": 2,
  "last_page": 2,
  "next_page_url": null,
  "prev_page_url": "/?page=1",
  "from": 3,
  "to": 4,
  "data": {
    "4": {
      "id": 5,
      "created_at": "30/06/2015 17:58:00",
      "updated_at": "30/06/2015 17:58:00",
      "box_type": "vegetarian",
      "title": "Fennel Crusted Pork with Italian Butter Beans",
      "slug": "fennel-crusted-pork-with-italian-butter-beans",
      "short_title": "",
      "marketing_description": "A classic roast with a twist. The pork loin is marinated in rosemary, fennel seeds and chilli flakes then teamed with baked potato wedges and butter beans in tomato sauce. Enjoy within 5-6 days of delivery.",
      "calories_kcal": "511",
      "protein_grams": "11",
      "fat_grams": "62",
      "carbs_grams": "0",
      "bulletpoint1": "A roast with a twist",
      "bulletpoint2": "Low fat & high protein",
      "bulletpoint3": "With roast potatoes",
      "recipe_diet_type_id": "meat",
      "season": "all",
      "base": "beans/lentils",
      "protein_source": "pork",
      "preparation_time_minutes": "45",
      "shelf_life_days": "4",
      "equipment_needed": "Pestle & Mortar (optional)",
      "origin_country": "Great Britain",
      "recipe_cuisine": "british",
      "in_your_box": "pork tenderloin, potatoes, butter beans, garlic, fennel seeds, medium onion, chilli flakes, fresh rosemary, tomatoes, vegetable stock cube",
      "gousto_reference": "55"
    },
    "6": {
      "id": 7,
      "created_at": "02/07/2015 17:58:00",
      "updated_at": "02/07/2015 17:58:00",
      "box_type": "vegetarian",
      "title": "Courgette Pasta Rags",
      "slug": "courgette-pasta-rags",
      "short_title": "",
      "marketing_description": "Kick-start the new year with some get-up and go with this lean green vitality machine. Protein-packed chicken and mineral-rich kale are blended into a smooth, nut-free version of pesto; creating the ultimate composition of nutrition and taste",
      "calories_kcal": "524",
      "protein_grams": "12",
      "fat_grams": "22",
      "carbs_grams": "0",
      "bulletpoint1": "",
      "bulletpoint2": "",
      "bulletpoint3": "",
      "recipe_diet_type_id": "meat",
      "season": "all",
      "base": "",
      "protein_source": "chicken",
      "preparation_time_minutes": "40",
      "shelf_life_days": "4",
      "equipment_needed": "Appetite",
      "origin_country": "Great Britain",
      "recipe_cuisine": "british",
      "in_your_box": "",
      "gousto_reference": "59"
    }
  }
}
```

### Rate an existing recipe between 1 and 5

**POST (form-data)** */recipes/{id}*

```json
{
  "recipe": {
    "id": 3,
    "created_at": "30/06/2015 17:58:00",
    "updated_at": "30/06/2015 17:58:00",
    "box_type": "vegetarian",
    "title": "Umbrian Wild Boar Salami Ragu with Linguine",
    "slug": "umbrian-wild-boar-salami-ragu-with-linguine",
    "short_title": "",
    "marketing_description": "This delicious pasta dish comes from the Italian region of Umbria. It has a smoky and intense wild boar flavour which combines the earthy garlic, leek and onion flavours, while the chilli flakes add a nice deep aroma. Enjoy within 5-6 days of delivery.",
    "calories_kcal": "609",
    "protein_grams": "17",
    "fat_grams": "29",
    "carbs_grams": "0",
    "bulletpoint1": "",
    "bulletpoint2": "",
    "bulletpoint3": "",
    "recipe_diet_type_id": "meat",
    "season": "all",
    "base": "pasta",
    "protein_source": "pork",
    "preparation_time_minutes": "35",
    "shelf_life_days": "4",
    "equipment_needed": "Appetite",
    "origin_country": "Great Britain",
    "recipe_cuisine": "british",
    "in_your_box": "",
    "gousto_reference": "1"
  },
  "rating": {
    "rating": "3"
  }
}
```

### Update an existing recipe

**PATCH (x-www-form-urlencoded)** */recipes/{id}*

```json
{
  "id": 3,
  "created_at": "30/06/2015 17:58:00",
  "updated_at": "30/06/2015 17:58:00",
  "box_type": "vegetarian",
  "title": "Updated Title",
  "slug": "umbrian-wild-boar-salami-ragu-with-linguine",
  "short_title": "",
  "marketing_description": "This delicious pasta dish comes from the Italian region of Umbria. It has a smoky and intense wild boar flavour which combines the earthy garlic, leek and onion flavours, while the chilli flakes add a nice deep aroma. Enjoy within 5-6 days of delivery.",
  "calories_kcal": "609",
  "protein_grams": "17",
  "fat_grams": "29",
  "carbs_grams": "0",
  "bulletpoint1": "",
  "bulletpoint2": "",
  "bulletpoint3": "",
  "recipe_diet_type_id": "meat",
  "season": "all",
  "base": "pasta",
  "protein_source": "pork",
  "preparation_time_minutes": "35",
  "shelf_life_days": "4",
  "equipment_needed": "Appetite",
  "origin_country": "Great Britain",
  "recipe_cuisine": "british",
  "in_your_box": "",
  "gousto_reference": "1"
}
```

### Store a new Recipe

**POST** */recipes*