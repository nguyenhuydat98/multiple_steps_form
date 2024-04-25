# Multiple steps form

## Technical

- Language: `PHP(v8.2)`
- Frontend: `HTML / CSS / JavaScript / Ajax / Laravel blade`
- Framework: `Laravel(v11.5)`, `Bootstrap(v5.0.2)`

## Setup environment

```
git clone <url-clone-this-project>
```
```
cp .env.example .env
```
```
composer install
```
```
composer dump-autoload
```
```
php artisan key:generate
```


## Setup data

1. Run migrate

```
php artisan migrate
```

2. Create files `restaurants.json` and `meal_categories.json` in folder `database/seeders/data/`

```
php artisan db:seed
```

## Run the project

```
php artisan serve
```

## Open the form

- http://127.0.0.1:8000/order/step-1
