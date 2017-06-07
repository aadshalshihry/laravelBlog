# laravelBlog
It is a try out for laravel.

# Installation

```
git clone https://github.com/aadshalshihry/laravelBlog.git

```

# Dependencies
* The following list shows what dependencies are using the in the project.
1. Bower
2. Dingo
3. Sass
4. Susy
> Note: Susy is isntalled by bower
5. Sweet Alert

# Settup

* Run the composer update to install the required package.
```
composer update
```
* Migrate and Seed the database
```
php artisan migrate --seed
```
> Note: sometime you can't migrate and seed the db at the same time.
> Please migrate and then seed each table separately

* Run the server
```
php artisan serve
```
