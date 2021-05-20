<?php


namespace Core\Repositories;


use Core\Entities\Prize;

class PrizeRepository
{
    /**
     * @return Prize|null
     */
    public function getRandomPrize(): ?Prize
    {
        return Prize::whereNull('user_id')->inRandomOrder()->first();
    }
}
