## installing Laravel:
  - *befor install laravel you should install composer first*
  - *instaling laravel run this:*
  - `composer create-project laravel/laravel preoject_name`
  
## All commond of laravel :
- php artisan
  
 ### work flow:
 - create route - create controller - create model - migration - migrate it ...
  
  
## Create Contorller :
  - php artisan make:controller controllerName
  
## migration in laravel:
  - php artisan make:migration create_note_table
  -  php artisan migrate 
  

 ## Create Model:
  - php artisan make:model ModelName
## Create model and migrations both:

  - php artisan make:model About -m 

 ## Routes using Resource :
  
  - php artisan make:controller AboutController -r
  -  -r will create all the actions for the route like : show, update, delete , .....
  
  ## Migrations:
  - create migrations: php artisan make:migration crate_table_name
  - update to database: php artisan migrate
  - remove the last table from db: 
  - php artisan migarte:rollback
  - add new collumn to table :
  - php artisan make:migration add_image_to_tableName

  ## customization:
  - go to laravel website , starter kit page
  - copy: -
  - run : compuser require laravel/breaze --dev
  - php artisan breaze:install
    - it will add login and register too
    - and it will redirect you to dashboard page
  - sites for tamplates
    - startbootstrap/themes
    - write in search: tailwind templates
  ## Larvel Factory
  - to fill the rows in db, using faker class of laravel
  - php artisan make:factory NameFactory --model=modelName
  ## Larevel seeder
   - to have some allready data in db:
   -  php artisan make:seeder UserSeeder --model=User
   -  to run:php artisan db:seed --class=UserSeeder
   -  in databaseSeeder.php
   -   public function run()
    
    
        Post::factory(10)->create();
        $this->call(
            [
                UserSeeder::class
            ]
        )
  
 ## ---------------------------------- --------------

  ## laravel Customization reviews
   
  *installing the blad like breeze as templete,
    it will create use one Auth system*

1. istall the breeze:
   `composer require laravel/breeze --dev`
2. istall Node.js ( npm )
3. run `php artisan breeze:install`
4. run `php artisan migrate`
5. run the project
  

  ## Laravel Factory and  Seeder

*we use laravel Factroy to add multiple data to db, as fack data*
* Create the Factory
  * `php artisan make:factory FactoryName --model=ModelName `
    
### You can add fack data for clos:
  * ` 'title' => fake()->sentence(),`
  * `'content' => fake()->paragraph(),`
  * `'image' => 'portfilio.png', `
  
### for run the Factroy you should seeder for it
  * `Mode::factroy(number of rows)->create();`
  * ` php artisan db:seed` *this will run the seeder*
  
## usign the paginaaion in laravel
* *use the link in the footer of table* 
  * < tfoot > `{{$posts->links()}}` < /tfoot>

## Larave softDelete Restore and Trush 

  ### Larvel Soft Delete  
  * *if we wanto to add for excited table run the commond for creatting new col in DB* 
      *  `php artisan make:migration add_soft_delete_to_tableName` 
      * in new migration add schema :
        *  `table->softDelets();`
        * `php artisan migrate`
      * Add in Model:
        *  `use SoftDeletes;`

  ### Trush
  * in contrller create trush function*
    * `return view(trush,Post::onlyTrushed()->get())`
  ### Force Delete
  * *create route and restor function*
    * `$post = Post::withTrashed()->where('id')->first()`
    * `$post->forceDelete()`

  ### Restore
  * *create route and restor function*
    * `$post = Post::withTrashed()->where('id')->first()`
    * `$post->restore()`

## Laravel Tinker 
* *it is use to intract with db directly from cmd larvel*
  * for use thinker, run in cmd :
    * `php artisan tinker`
  * then can commond like :
    - this will trancate our table in DB:
    *  `Post::trancate()` 

## Laravel Query Builder:
 * *if we have already table in db, not created by laravel migration, and want to get data from it we use Qurey Builder*
   * like : 
     * `DB::table('tableName')->get()`
     * it will reture data with out using model
   * *can be use many class*
     * `DB::table('tableName')->where('id',3)->get()`
   * *to select a specific col*
     * `DB::table('tableName')->pluck('title')`
  - it have many functions for diffrent purposes.
  
  ## laravel Middlewares:
   *  *createing middlware:*
   *  `php artisan make:middleware SettingMiddleware`
   
  ## Laravel Eloquent 
  ### one-to-one relationship
   - *two way to have create relationship*f
   1. *if you want to have relationship in db, between tables ,by using laravel*
   - *in migration you can write:*
   -  ` $table->unsignedBigInteger('user_id');`
   -  `$table->foreign('user_id')->references('id')->on('users');`
  2. *creating relationship in model of learavel,not in db between tablesl*
   -  *in user model:*
   -  `public function profile(){`
   -  `return $this->hasOne(Profile::class,'refrence col name','user id name');`
   -  `}`
   - Note : *if the refrence col name is user_id and user id name col is id you can ignoore it writing here*
   -
   -

   -