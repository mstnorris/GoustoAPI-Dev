# Gousto API

## Contents

1. [Gousto API Repository](https://github.com/mstnorris/GoustoAPI-Dev)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [API Documentation](instructions.md)
5. [Report](report.md) 

## readme

### Scenario

Gousto’s technical infrastructure includes an API Gateway. The gateway offers a number of recipe operations. Recipes contain a lot of information such as cuisine, customer ratings & comments, stock levels and diet types.

Your task is to design, develop and deliver to us your version of a set of recipe operations. Your solution should meet our functional and nonfunctional requirements below.

### Functional Requirements
Your API must offer the following operations:

- Fetch a recipe by id
- Fetch all recipes for a specific cuisine (should paginate) Rate an existing recipe between 1 and 5
- Update an existing recipe
- Store a new recipe

Don’t include any client code e.g. HTML
The service should provide a set of RESTful JSON based routes

### Non-functional Requirements

- The service must be built using a modern web application framework
- The code should be ‘production ready’ and maintainable
- The service should use the accompanying CSV as the primary data source, which can be loaded into memory (please don't use a database). Feel free to generate additional test data based on the same scheme if it helps.

### Please also ensure the following

- Finished task should be submitted via email as a ZIP or GZIP attachment or alternatively via a public GitHub Repository
- Submission should include a README file explaining
    - How to use your solution
    - Your reasons for your choice of web application framework
    - Explain how your solution would cater for different API consumers that require different recipe data e.g. a mobile app and the front-end of a website
    - Anything else you think is relevant to your solution