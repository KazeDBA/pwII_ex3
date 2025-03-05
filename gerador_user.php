<?php

namespace App;

use Faker\Factory;

class UserGenerator
{
    private $faker;

    public function __construct()
    {
        // Inicializa o Faker para português do Brasil
        $this->faker = Factory::create('pt_BR');
    }

    // Gera um usuário fake
    public function generateUser()
    {
        return [
            'name' => $this->faker->name(), // Alterado de 'nome' para 'name'
            'email' => $this->faker->email(),
            'telefone' => $this->faker->phoneNumber(),
            'cidade' => $this->faker->city(),
        ];
    }

    // Gera uma lista de usuários
    public function generateUsers($quantity = 5)
    {
        $users = [];
        for ($i = 0; $i < $quantity; $i++) {
            $users[] = $this->generateUser();
        }
        return $users;
    }

    // Exibe os dados em formato JSON
    public function toJson($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}