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

I chose to use Laravel as that is what I have been working with for the last four years. It is a great framework that allows for rapid application development because of the built-in features. 

### Explain how your solution would cater for different API consumers that require different recipe data e.g. a mobile app and the front-end of a website

The API generates JSON formatted output which 

### Anything else you think is relevant to your solution

My solution meets the listed requirements fully, however I would not consider it 'production ready' as it doesn't address the following issues.

#### Authentication & Authorisation

Currently anyone can access the API; retrieving recipe information, updating a recipe, and creating new recipes.

#### Validation

I made informed decisions as to what the validations rules should be when updating/creating a recipe. I have since commented them out for 'ease-of-use' of this demo. Please see the validation rules in the (RecipeController)[https://github.com/mstnorris/GoustoAPI-Dev/blob/master/app/Http/Controllers/API/v1/RecipeController.php#L44]

#### Lack of Database

#### Lack of Search