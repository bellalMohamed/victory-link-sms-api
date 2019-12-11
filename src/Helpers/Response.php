<?php

namespace Bellal\VictoryLinkSMS\Helpers;
use Bellal\VictoryLinkSMS\Helpers\ResponseHelper;

class Response
{
    use ResponseHelper;

    /**
     * Resposne Status Code
     * @var integer
     */
    public $code;

    /**
     * Response Message
     * @var string
     */
    public $message;

    public function __construct($response)
    {
        $this->setCode($response);

        $this->setMessage();
    }

    /**
     * Set Response Code
     * @param object $response
     */
    protected function setCode($response): void
    {
        $this->code = (int) $response->getBody()->getContents();
    }

    /**
     * Get Reponse Message
     */
    protected function setMessage(): void
    {
        $this->message = $this->responseMessage($this->code);
    }

    /**
     * Returns Response Message
     * @return string Message response
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}