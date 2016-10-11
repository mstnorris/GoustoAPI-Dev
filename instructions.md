# Gousto API

## Contents

1. [Gousto API Repository](https://github.com/mstnorris/GoustoAPI-Dev)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [API Documentation](instructions.md)
5. [Report](report.md) 

## Instructions (API Endpoints)

### Version 1

Prepend all URIs with `/api/v1` for version 1 of the api.

### Fetch all recipes

| Method | URI | Arguments | Options | Expected Output |
| --- | --- | --- | --- | --- | --- |
| GET | recipes | NONE | NONE | JSON representation of all recipes |

### Fetch a recipe by id

| Method | URI | Arguments | Options | Expected Output |
| --- | --- | --- | --- | --- | --- |
| GET | recipes/{id} | integer | NONE | JSON representation of selected recipe |

### Fetch all recipes for a specific cuisine (should paginate) Rate an existing recipe between 1 and 5

| Method | URI | Arguments | Options | Expected Output |
| --- | --- | --- | --- | --- | --- |
| GET | recipes?cuisine={cuisine} | NONE | NONE | JSON representation of selected recipe |

### Update an existing recipe

| Method | URI | Arguments | Options | Expected Output |
| --- | --- | --- | --- | --- | --- |
| PATCH | recipes/{id} | integer | NONE | JSON representation of all recipes |

### Store a new recipe

| Method | URI | Arguments | Options | Expected Output |
| --- | --- | --- | --- | --- | --- |
| POST | recipes | NONE | NONE | JSON representation of all recipes |