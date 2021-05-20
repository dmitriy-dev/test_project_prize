<?php


namespace Core\Services\PrizeActions;


use Core\Entities\Prize;
use Core\Services\UserBalanceService;
use Illuminate\Support\Facades\DB;

class ConvertToBalanceAction implements PrizeActionInterface
{
    private UserBalanceService $userBalanceService;

    public function __construct(UserBalanceService  $userBalanceService)
    {
        $this->userBalanceService = $userBalanceService;
    }

    public function doAction(Prize $prize): void
    {
        DB::transaction(function () use ($prize) {
            $this->userBalanceService->increaseBalance($prize->user, (float)$prize->value);
            $prize->user_id = null;
            $prize->save();
        });
    }
}
