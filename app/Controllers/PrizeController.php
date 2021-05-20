<?php


namespace App\Controllers;

use Core\App\Auth;
use Core\Repositories\PrizeRepository;
use Core\Services\PrizeService;

class PrizeController extends Controller
{
    private PrizeService    $prizeService;
    private PrizeRepository $prizeRepository;

    public function __construct()
    {
        $this->prizeService    = new PrizeService();
        $this->prizeRepository = new PrizeRepository();
    }

    public function getPrize(): void
    {
        $prize = $this->prizeRepository->getRandomPrize();

        if (null === $prize) {
            flash('errors', 'Приз не найден!');
            response()->redirect(request()->getReferer());
        }

        $this->prizeService->associateWithUser($prize, Auth::gi()->user());

        flash('success', 'Вы получили приз: ' . $prize->name);

        response()->redirect(request()->getReferer());
    }
}