<?php


namespace Core\Services;



use Core\Entities\User;

class UserBalanceService
{
    /**
     * @param User $user
     * @param float $amount
     */
    public function increaseBalance(User $user, float $amount): void
    {
        if (null === $user->balance) {
            $user->balance()->create([]);
            $user->refresh();
        }

        $user->balance->increaseBalance($amount);
    }
}
