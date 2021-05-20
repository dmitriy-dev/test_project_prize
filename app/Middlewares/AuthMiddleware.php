<?php


namespace App\Middlewares;


use Core\App\Auth;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware {

    public function handle(Request $request): void
    {
        $request->user = Auth::gi()->user();

        if($request->user === null) {
            response()->redirect(url('login'));
        }
    }
}