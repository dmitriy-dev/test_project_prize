<?php


namespace Tests\Unit\Core\Services\PrizeActions;


use Core\Entities\Prize;
use Core\Entities\PrizeType;
use Core\Services\PrizeActions\CancelPrizeAction;
use Tests\TestCase;

class CancelPrizeActionTest extends TestCase
{
    public function testDoAction()
    {
        $prize = new Prize();
        $prize->name = 'Test';
        $prize->type = PrizeType::TYPE_BONUS;
        $prize->user_id = 1;

        $action = new CancelPrizeAction();
        $action->doAction($prize);

        self::assertNull($prize->user_id);
    }
}