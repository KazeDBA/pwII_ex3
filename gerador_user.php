<?php

namespace App;

use Faker\Factory;

class UserGenerator
{
    private $faker;

    public function __construct()
    {
        
        $this->faker = Factory::create('pt_BR');
    }

    
    public function generateUser()
    {
        return [
            'name' => $this->faker->name(), 
            'email' => $this->faker->email(),
            'telefone' => $this->faker->phoneNumber(),
            'cidade' => $this->faker->city(),
        ];
    }

    
    public function generateUsers($quantity = 5)
    {
        $users = [];
        for ($i = 0; $i < $quantity; $i++) {
            $users[] = $this->generateUser();
        }
        return $users;
    }

    
    public function toJson($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}