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
    |--------|-----|-----------|---------|-----------------|
    | GET    | recipes   | 2         | 3       | 4               |
    | POST   | 5   | 6         | 7       | 8               |
    | PATCH  | 9   | 10        | 11      | 12              |

`recipes`

### Fetch a recipe by id

`recipes/{id}`

### Fetch all recipes for a specific cuisine (should paginate) Rate an existing recipe between 1 and 5

`recipes?cuisine={cuisine}`

### Update an existing recipe
### Store a new recipe