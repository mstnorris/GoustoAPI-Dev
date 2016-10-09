# Gousto API

## Contents

1. [Gousto API Repository](https://github.com/mstnorris/GoustoAPI-Dev)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [API Documentation](instructions.md)
5. [Report](report.md) 

## Report

### How to use your solution

See [Instructions](instructions.md)

### Your reasons for your choice of web application framework

I chose to use Laravel as that is what I have been working with for the last four years. It is a great framework that allows for rapid application development because of the built-in features which makes it ideal for tasks such as this one.

### Explain how your solution would cater for different API consumers that require different recipe data e.g. a mobile app and the front-end of a website

- The API generates JSON formatted output which can be consumed by Gousto's own web front-end, and any mobile apps whether that be first party or third party.
- The API could be protected using authentication and tokens, and although I'm not taking advantage of this as it was not listed in the requirements, it can easily be set up (please see the section below). 

### Anything else you think is relevant to your solution

My solution meets the listed requirements fully, however I would not consider it 'production ready' as it does not address the following.

#### Persistence

##### Updating a Recipe

When a recipe is updated, the changes are not persisted as this was not a requirement. It is usually something that would be carried out with a database of some description. However the API does make reasonable effort to validate the request.

##### Rating a Recipe

Although the API end point responds to a rating request for a recipe, the data is not persisted in any way. As above, reasonable efforts are made to validate the request such that:

- The field is required
- The value passed is an integer
- The integer is between 1 and 5 (inclusive)

#### Front-End

No first-party front-end

#### Authentication & Authorisation

Currently anyone can access the API; retrieve recipe information, update a recipe, and create new recipes.

#### API Rate Throttling, Caching, and Lack of Database

- No measures have been taken to protect the API from abuse; such as too many requests
- The issue of persistence above would be taken care of if the API would interact with a database.

#### Validation

I made informed decisions as to what the validations rules should be when updating/creating a recipe based on the provided data. I have since commented them out for 'ease-of-use' of this demo. Please see the validation rules in the [RecipeController](https://github.com/mstnorris/GoustoAPI-Dev/blob/master/app/Http/Controllers/API/v1/RecipeController.php#L44).

#### Lack of Search & Other Filters

As well as filtering by cuisine, it would be good to filter on al of the data points that a recipe contains; dietary requirements, calorie count etc. Also full-text search on the title and description etc would provide for a better user experience.