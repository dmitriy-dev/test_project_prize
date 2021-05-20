<?php


namespace Core\Services;


use Core\Entities\User;
use Core\Entities\Prize;
use Core\Services\PrizeActions\PrizeActionFactory;

class PrizeService
{
    /**
     * @param Prize $prize
     * @param User $user
     */
    public function associateWithUser(Prize $prize, User $user): void
    {
        $prize->user()->associate($user);

        try {
            $prize->saveOrFail();
        } catch (\Throwable $exception) {
            throw new \DomainException('Error associating prize with user', $exception->getCode(), $exception);
        }
    }

    /**
     * @param Prize $prize
     * @param string $action
     */
    public function actionWithPrize(Prize $prize, string $action): void
    {
        $prizeAction = PrizeActionFactory::getAction($action);
        $prizeAction->doAction($prize);
    }

    /**
     * @param User $user
     * @return Prize
     */
    public function getRandomPrize(User $user): Prize
    {

    }
}
