<?php

namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Validator\Validator;
use Core\App\Auth;
use Core\Entities\User;
use Core\Repositories\UserRepository;

class LoginController extends Controller
{
    private UserRepository $userRepository;

    public function __construct()
    {
        // У нас нет DI, поэтому сами подставляем классы
        $this->userRepository = new UserRepository();
    }

    public function index(): void
    {
        $this->view('login');
    }

    public function login(): void
    {
        $inputHandler = request()->getInputHandler();

        Validator::run([
            'email'    => 'email|required',
            'password' => 'string|required',
        ], $inputHandler);

        $user = $this->userRepository->findByEmail($inputHandler->value('email'));
        if (null === $user || !$user->isCorrectPassword($inputHandler->value('password') ?? '')) {
            flash('errors', 'Email или пароль указаны не верно!');
            response()->redirect(request()->getReferer());
        }

        Auth::gi()->login($user);
        response()->redirect(url('home'));
    }

    public function logout(): void
    {
        Auth::gi()->logout();
        response()->redirect(url('home'));
    }
}