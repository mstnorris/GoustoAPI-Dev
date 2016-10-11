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

| Operation | Method | URI | Arguments |
| --- | --- | --- | --- | --- |
| Fetch all Recipes | GET | recipes | NONE |
| Fetch a Recipe by ID | GET | recipes/{id} | integer |
| Fetch all recipes for a specific cuisine (should paginate) Rate an existing recipe between 1 and 5 | GET | recipes?cuisine={cuisine} | string |
| Update an existing recipe | PATCH | recipes/{id} | integer |
| Store a new Recipe | POST | recipes | NONE |