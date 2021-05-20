<?php


use Carbon\Carbon;
use Core\Entities\PrizeType;
use Phinx\Seed\AbstractSeed;

class PrizesSeeder extends AbstractSeed
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
        $prizes = $this->table('prizes');
        $prizes->insert([
            [
                'name' => 'Денежный приз',
                'value' => '10000',
                'type' => PrizeType::TYPE_MONEY,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Бонусный приз',
                'value' => '5400',
                'type' => PrizeType::TYPE_BONUS,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Предметный приз',
                'value' => null,
                'type' => PrizeType::TYPE_SUBJECT,
                'created_at' => Carbon::now(),
            ],
        ])->save();
    }
}
