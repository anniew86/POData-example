<?php
namespace PODataExample;

use POData\OperationContext\IHTTPRequest;
use POData\OperationContext\IOperationContext;
use POData\OperationContext\Web\OutgoingResponse;

class OperationContextAdapter implements IOperationContext
{
    /**
     * @var RequestAdapter;
     */
    protected $request;

    protected $response;

    /**
     * @param yii\base\Request $request
     */
    public function __construct($request)
    {
        $this->request = new RequestAdapter($request);
        $this->response = new OutgoingResponse();
    }

    /**
     * Gets the Web request context for the request being sent.
     *
     * @return OutgoingResponse reference of OutgoingResponse object
     */
    public function outgoingResponse()
    {
        return $this->response;
    }

    /**
     * Gets the Web request context for the request being received.
     *
     * @return IHTTPRequest reference of IncomingRequest object
     */
    public function incomingRequest()
    {
        return $this->request;
    }
}
