<?php


namespace Tests\Unit\Core\Services\PrizeActions;


use Core\Clients\BankIntegration\ResponseStructure;
use Core\Clients\BankIntegration\SomeBankClient;
use Core\Entities\Prize;
use Core\Entities\User;
use Core\Services\PrizeActions\SendToBankAction;
use Tests\TestCase;

class SendToBankActionTest extends TestCase
{
    public function testDoAction()
    {
        $response = new ResponseStructure();
        $response->setCode(100);
        $response->setStatus('error');

        $mock = $this->createMock(SomeBankClient::class);
        $mock->method('sendMoney')->willReturn($response);

        $this->expectException(\RuntimeException::class);

        $user = new User();
        $prize = new Prize();
        $prize->user()->associate($user);

        (new SendToBankAction($mock))->doAction($prize);
    }
}