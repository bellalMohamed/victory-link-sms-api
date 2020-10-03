<?php

namespace Bellal\VictoryLinkSMS\Helpers;

class Response
{
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
        $this->setCode(
            $this->parseResponseToArray($response)
        );

        $this->setMessage();
    }

    /**
     * Returns Response Message
     * @return string Message response
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Returns Response Code
     * @return string Message response
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * Set Response Code
     * @param object $response
     */
    protected function setCode($response): void
    {
        $this->code = $response[0];
    }

    /**
     * Get Reponse Message
     */
    protected function setMessage(): void
    {
        $this->message = $this->responseMessage($this->code);
    }

    /**
     * Get Response Message from code
     * @return string response message
     */
    protected function responseMessage($code): string
    {
        $messages = [
            '0' => 'Message Sent Succesfully',
            '-1' => 'User is not subscribed',
            '-5' => 'Out of credit.',
            '-10' => 'Queued Message, no need to send it again.',
            '-11' => 'Invalid language.',
            '-12' => 'SMS is empty.',
            '-13' => 'Invalid fake sender exceeded 12 chars or empty.',
            '-25' => 'Sending rate greater than receiving rate (only for send/receive accounts).',
            '-100' => 'Other error',
        ];

        if (isset($messages[$code])) {
            return $messages[$code];
        }

        return 'Unknown error code.';
    }

    protected function parseResponseToArray($response): array
    {
        $xmlResponse = new \SimpleXMLElement($response->getBody()->getContents());

        return (array) $xmlResponse;
    }
}
