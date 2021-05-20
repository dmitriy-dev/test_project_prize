<?php


namespace Tests\Unit\Core\Services\PrizeActions;


use Core\Services\PrizeActions\CancelPrizeAction;
use Core\Services\PrizeActions\ConvertToBalanceAction;
use Core\Services\PrizeActions\PostPrizeAction;
use Core\Services\PrizeActions\PrizeActionFactory;
use Core\Services\PrizeActions\SendToBankAction;
use Tests\TestCase;

class PrizeActionFactoryTest extends TestCase
{
    public function testFactory()
    {
        self::assertInstanceOf(CancelPrizeAction::class, PrizeActionFactory::getAction('cancel'));
        self::assertInstanceOf(SendToBankAction::class, PrizeActionFactory::getAction('bank'));
        self::assertInstanceOf(ConvertToBalanceAction::class, PrizeActionFactory::getAction('balance'));
        self::assertInstanceOf(PostPrizeAction::class, PrizeActionFactory::getAction('post'));
    }
}