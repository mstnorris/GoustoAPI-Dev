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

| Operation | Method | URI | Arguments | Options | Expected Output |
| --- | --- | --- | --- | --- | --- | --- |
| Fetch all Recipes | GET | recipes | NONE | NONE | JSON representation of all recipes |
| Fetch a Recipe by ID | GET | recipes/{id} | integer | NONE | JSON representation of selected recipe |
| Fetch all recipes for a specific cuisine (should paginate) Rate an existing recipe between 1 and 5 | GET | recipes?cuisine={cuisine} | NONE | NONE | JSON representation of selected recipe |
| Update an existing recipe | PATCH | recipes/{id} | integer | NONE | JSON representation of all recipes |
| Store a new Recipe | POST | recipes | NONE | NONE | JSON representation of all recipes |