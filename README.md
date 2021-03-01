# ASICS Coding Challenge

Author: Matthew Kuper

Date: 01-03-2021

## Architectural choices

### Laravel
I started with a fresh Laravel 8 installation using PHP 7.4. To make reviewing easy I left the `app` folder (and almost all framework files) untouched and used the `src` folder represent the ASICS application and namespace. I only added the ServiceProvider.

More important, I also made this decision to separate the Framework and ASICS-related code. This to make the application more 'standalone' and less dependent on the framework (using the good parts when needed). It creates a mindset focused on your own architecture, not the Laravel approach. It also makes upgrading easier.

### CQRS Lite & Hexagonal architecture

I choose an approach that takes some inspiration from CQRS
It basically is doing either a command or a query. This approach is combined with a layered hexagonal architecture. Some notes here:

- Instead of a single Infrastructure folder, I use UI and Infrastructure. UI being the incoming traffic (Http, Console, Messages), Infrastructure the outgoing traffic to things like data sources, mail etc.
- Instead of clustering by subject (Http, Console for UI and Persistence, Mail etc. for Infrastructure) I group classes by it's domain as much as possible. This to make the folder structure recognizable in every layer.

I like to focus on feature specific code, building what is needed to make the feature work. Therefore I took a Command Bus (Command/Handler) approach, where I use Laravel's job dispatcher as command bus for the occasion.
I could have used the Dispatchable trait to make the commands dispatchable, but took the longer approach so show understanding of IoC container and how to make certain parts of the application testable.

The domain layer is simple at the moment, but would be home to any business rule about any logic.
There are currently not many invariants I implemented or tested, but this approach makes it easy to do so and test in isolation.


### Decoupling
I took some approaches to show SOLID skills and make the application scalable

- The DatasourceReaderManager can be swapped out by any reader, or have multiple readers to support multiple files.
- The transformers can be replaced or more can be added to support additional transformations or operations

### Infrastructure

There is not much needed to get started. I did not implement a database, message brokers, caching and other infrastructural approaches.

I used Laravel's available solutions for this: The Job Dispatcher as (synchronous and local) command bus as (also synchronous and local) event bus.
I did not abstract those pieces away, but with a simple contract it can be swapped out later by more advanced messaging infrastructure.

## Testing

I did not fully test all code, but I tried to show some testing approaches for Unit, Integration and Feature testing. Generally I aimed to show my approach to different tests and prove you can do well without mocking everything out.
This is also true for the Domain layer tests where I treat the Dataset and its dependencies as 1 unit (so including the transformers).

## Frontend
I chose typescript as a frontend language because it offers more type strict benefits, but in the end did not have enough time to refactor/abstract to more components.
I used the Tailwind CSS framework so no time was lost giving the SPA a decent enough look.

## Sacrifices & room for improvement
In this short period of time I had to make some sacrifices on completeness and quality.:

- Validation (arrays): I move a lot of arrays around. Skipping most validation/structure validation or the use of DTO's
- No simple Docker command. See instructions below
enthusiasm and craftsmanship honor.

From the root project folder
1. Run `composer install` from `./api`
2. Run `cp .env.example` from `./api`
3. Run `php artisan key:generate`
2. Run `php artisan serve` to spin up a php webserver exposing the backend
3. Run `yarn` from ./spa
4. Run `yarn serve` from `./spa` to run the server that serves the frontend
5. Visit localhost:8080 to view the application

pro tip: the client will try to reach the api on `127.0.0.1:8000`. 

