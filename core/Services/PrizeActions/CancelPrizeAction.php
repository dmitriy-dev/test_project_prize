<?php


namespace Core\Services\PrizeActions;


use Core\Entities\Prize;

class CancelPrizeAction implements PrizeActionInterface
{
    public function doAction(Prize $prize): void
    {
        $prize->user_id = null;
        $prize->save();
    }
}
