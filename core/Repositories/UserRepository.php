<?php


namespace Core\Repositories;


use Core\Entities\User;

class UserRepository
{
    public function findByToken(string $string): User
    {
        if (null !== $user = $this->findBy('token', $string))
        {
            return $user;
        }

        throw new \DomainException('Пользователь не найден');
    }

    public function findByEmail(string $string): User
    {
        if (null !== $user = $this->findBy('email', $string))
        {
            return $user;
        }

        throw new \DomainException('Пользователь не найден');
    }

    private function findBy(string $field, string $value): ?User
    {
        return User::where($field, $value)->first();
    }
}