<?php


namespace Core\Clients\BankIntegration;


use Core\Entities\User;

/**
 * Interface IntegrationInterface
 * @package Core\BankIntegration
 */
interface IntegrationInterface
{
    /**
     * @param User $user
     * @return ResponseStructure
     */
    public function sendMoney(User $user): ResponseStructure;
}
