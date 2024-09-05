### How to install

1. copy .env.example to .env

``cp .env.example .env``

2. Run Docker Compose to start the containers:

```docker-compose up```

3. Enter the jobqueue-api-php-apache-dev-1 container:

```docker exec -it jobqueue-api_php-apache-dev_1 bash```
4. Inside the container, run the following commands:

``` cd app/ ```

``` composer install ```

``` php artisan key:generate ```

``` php artisan migrate ```

5. To run the queue worker, execute:
``` php artisan queue:work ```
6. To run the tests, execute:
   ``` php artisan test ```
### Testing the API
You can test the ```/api/submit``` endpoint using tools like Postman or cURL. Here's an example of the JSON payload:

```
{
"name": "John Doe",
"email": "john.doe@example.com",
"message": "This is a test message."
}
```
