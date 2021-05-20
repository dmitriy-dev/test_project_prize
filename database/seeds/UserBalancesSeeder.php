<?php


use Carbon\Carbon;
use Core\Entities\User;
use Phinx\Seed\AbstractSeed;

class UserBalancesSeeder extends AbstractSeed
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
        $userBalance = $this->table('user_balances');
        $userBalance->insert([
            [
                'user_id'    => 1,
                'amount'     => 0,
                'created_at' => Carbon::now(),
            ],
        ])->save();

    }
}
