<?php

namespace Bellal\VictoryLinkSMS;

use Bellal\VictoryLinkSMS\Helpers\Response;
use Bellal\VictoryLinkSMS\Message\MessageInterface;
use GuzzleHttp\Client;

class VictoryLinkAdapter implements MessageInterface
{
    /**
     * Vodafone API Credentails
     * @var array
     */
    protected $credentials;
    /**
     * Soap Client
     * @var obj
     */
    protected $client;

    /**
     * API Endpont
     * @var string
     */
    protected $api = "https://smsvas.vlserv.com/KannelSending/service.asmx/SendSMS";

    /**
     * Request Params
     * @var string
     */
    protected $params = "";

    /**
     * Message Send Response
     * @var Response
     */
    protected $response;

    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * Send SMS
     * @param  array  $data message details
     * @return VictoryLinkAdapter
     */
    public function send(array $data): VictoryLinkAdapter
    {
        $this->buildRequestParams($data);

        $client = new Client();
        $response = $client->request('GET', "{$this->api}{$this->params}", [
            'headers'  => ['Content-Type' => 'application/x-www-form-urlencoded'],
        ]);

        $this->handleResponse($response);

        return $this;
    }

    /**
     * Handle Message Sending response
     * @param  object $response
     * @return void
     */
    protected function handleResponse($response): void
    {
        $this->response = new Response($response);
    }

    public function response()
    {
        return $this->response;
    }

    /**
     * Build GET Request Params
     * @param  array  $data requesr parameters
     * @return string       request parameters for the get request
     */
    protected function buildRequestParams(array $data): string
    {
        return $this->params = "?UserName={$this->credentials['username']}&Password={$this->credentials['password']}&SMSText={$data['message']}&SMSLang={$this->credentials['language']}&SMSSender={$this->credentials['sender']}&SMSReceiver={$data['to']}";
    }
}
