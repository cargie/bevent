<?php

use Faker\Factory as Faker;
use App\Models\Client;
use App\Repositories\ClientRepository;

trait MakeClientTrait
{
    /**
     * Create fake instance of Client and save it in database
     *
     * @param array $clientFields
     * @return Client
     */
    public function makeClient($clientFields = [])
    {
        /** @var ClientRepository $clientRepo */
        $clientRepo = App::make(ClientRepository::class);
        $theme = $this->fakeClientData($clientFields);
        return $clientRepo->create($theme);
    }

    /**
     * Get fake instance of Client
     *
     * @param array $clientFields
     * @return Client
     */
    public function fakeClient($clientFields = [])
    {
        return new Client($this->fakeClientData($clientFields));
    }

    /**
     * Get fake data of Client
     *
     * @param array $postFields
     * @return array
     */
    public function fakeClientData($clientFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'first_name' => $fake->word,
            'last_name' => $fake->word,
            'email' => $fake->word,
            'phone' => $fake->word,
            'birth_at' => $fake->word,
            'password' => $fake->word,
            'remember_token' => $fake->word,
            'profile' => $fake->word,
            'gender' => $fake->word,
            'organization_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $clientFields);
    }
}
