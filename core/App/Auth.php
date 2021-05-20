<?php


namespace Core\App;


use Core\Entities\User;
use Core\Repositories\UserRepository;

final class Auth
{
    private static $instance;
    private $user;
    private $repository;

    public static function gi(): self
    {
        if (self::$instance === null) {
            self::$instance = new self(new UserRepository());
        }

        return self::$instance;
    }

    private function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    private function __clone()
    {
    }

    /**
     * @return User|null
     */
    public function user(): ?User
    {
        if (!isset($_SESSION['user'])) {
            return null;
        }

        if ($this->user instanceof User) {
            return $this->user;
        }

        $user = $this->repository->findByToken($_SESSION['user']);

        if (null !== $user) {
            $this->user = $user;
        }

        return $this->user;
    }

    /**
     * @param User $user
     */
    public function login(User $user): void
    {
        $_SESSION['user'] = $user->token;
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
    }
}