<?php

class User
{
    private int $id;
    private string $login;
    private string $password;
    private string $email;
    private string $name;

    public function __construct(int $id, string $login, string $password, string $email, string $name)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return
            "ID: {$this->id}\n" .
            "login: {$this->login}\n" .
            "password: {$this->password}\n" .
            "email: {$this->email}\n" .
            "name: {$this->name}\n";
    }

}
