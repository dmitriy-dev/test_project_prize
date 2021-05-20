<?php


namespace Core\Clients\BankIntegration;


use Core\Entities\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Http\Client\ClientInterface;

class SomeBankClient implements IntegrationInterface
{
    private ClientInterface $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param User $user
     * @return ResponseStructure
     */
    public function sendMoney(User $user): ResponseStructure
    {
        //Fake api request...
        $response = new ResponseStructure();

        try {
            $request = $this->client->post('https://reqres.in/api/users', [
                'form_params' => [
                    'name' => $user->name,
                    'job'  => 'manager',
                ]
            ]);

            $bankResponse = json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            $response->setStatus($bankResponse['name']);
            $response->setCode(200);
        } catch (GuzzleException | JsonException $exception) {
            $response->setStatus($exception->getMessage());
            $response->setCode($exception->getCode());
        }

        return $response;
    }
}
