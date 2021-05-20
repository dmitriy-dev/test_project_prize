<?php


use Carbon\Carbon;
use Phinx\Seed\AbstractSeed;
use Ramsey\Uuid\Uuid;

class UsersSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $users = $this->table('users');
        $users->insert([
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => password_hash('123456', PASSWORD_BCRYPT),
                'token' => Uuid::uuid4()->toString(),
                'created_at' => Carbon::now(),
            ],
        ])->save();
    }
}
