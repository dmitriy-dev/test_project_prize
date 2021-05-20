<?php


namespace Core\Services\PrizeActions;


use Core\Clients\BankIntegration\IntegrationInterface;
use Core\Entities\Prize;

class SendToBankAction implements PrizeActionInterface
{
    private IntegrationInterface $bankClient;

    public function __construct(IntegrationInterface $bankClient)
    {
        $this->bankClient = $bankClient;
    }

    public function doAction(Prize $prize): void
    {
        $response = $this->bankClient->sendMoney($prize->user);

        if ($response->getCode() !== 200) {
            throw new \RuntimeException($response->getStatus());
        }

        $prize->user_id = null;
        $prize->save();
    }
}
