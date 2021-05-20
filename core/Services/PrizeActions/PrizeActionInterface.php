<?php


namespace Core\Services\PrizeActions;


use Core\Entities\Prize;

interface PrizeActionInterface
{
    /**
     * @param Prize $prize
     */
    public function doAction(Prize $prize): void;
}
