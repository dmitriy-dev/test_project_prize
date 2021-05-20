#Результат выполнения тестового задания

##Migrations
###Create new migration
`vendor/bin/phinx create MyNewMigration`

###Run migrations
`vendor/bin/phinx migrate`

###Rollback migrations
`vendor/bin/phinx rollback`

###Create new seed
`vendor/bin/phinx seed:create MyNewSeeder`

###RUN seeds
`vendor/bin/phinx seed:run`


##Run tests
`vendor/bin/phpunit --bootstrap vendor/autoload.php tests`