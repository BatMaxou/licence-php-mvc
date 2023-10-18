<?php

require_once 'Movie.php';

class User
{
    private int $id;
    private string $login;
    private string $password;

    public function __construct(string $login, string $password, ?int $id = null)
    {
        if ($id) {
            $this->id = $id;
        }
        $this->login = $login;
        $this->password = $password;
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_ARGON2I);

        return $this;
    }
}
