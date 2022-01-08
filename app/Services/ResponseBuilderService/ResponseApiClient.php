<?php

namespace App\Services\ResponseBuilderService;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class ResponseApiClient
{
    /**
     * statusCode.
     *
     * @var int
     */
    protected $statusCode = Response::HTTP_OK;

    /**
     * request.
     *
     * @var Request
     */
    protected $request;

    /**
     * response.
     *
     * @var JsonResponse
     */
    private $response;

    /**
     * data.
     *
     * @var array
     */
    private $data = [];

    /**
     * __construct.
     *
     * @param mixed $request
     */
    public function __construct(Request $request)
    {
        $this->contextClass = new Collection();
        $this->response     = new JsonResponse();
        $this->request      = $request;
    }

    /**
     * setResult.
     *
     */
    public function setResult($result = null): self
    {
        $this->data['result'] = $result;

        return $this;
    }

    /**
     * setMessage.
     *
     * @param mixed $text
     * @param mixed $view
     */
    public function setMessage(string $text, array $view = []): self
    {
        $this->data['message'] = [
            'text' => $text,
            'view' => $view,
        ];

        return $this;
    }

    /**
     * setStatus.
     *
     * @param mixed $status
     */
    public function setStatus(bool $status): self
    {
        $this->data['status'] = $status;

        return $this;
    }

    /**
     * setMeta.
     *
     * @param array $meta
     * @return ResponseApiClient
     */
    public function setMeta(array $meta): self
    {
        $this->data['meta'] = $meta;

        return $this;
    }

    /**
     * setErrors.
     *
     * @param mixed $errors
     */
    public function setErrors(array $errors): self
    {
        $this->data['errors'] = $errors;

        return $this;
    }

    /**
     * setAction.
     *
     * @return ResponseApiClient
     */
    public function setAction(?string $action = null): self
    {
        $this->data['action'] = $action;

        return $this;
    }

    /**
     * setGoToAction.
     *
     * @param mixed $goToAction
     */
    public function setGoToAction(string $goToAction): self
    {
        $this->data['goToAction'] = $goToAction;

        return $this;
    }

    /**
     * setStatusCode.
     *
     * @param mixed $statusCode
     * @param mixed $text
     */
    public function setStatusCode(int $statusCode, ?string $text = null): self
    {
        $this->response->setStatusCode($statusCode, $text);

        return $this;
    }

    /**
     * build.
     */
    final public function build(): JsonResponse
    {
        if (isset($this->data['status']) && false === $this->data['status'] && 200 === $this->response->getStatusCode()) {
            $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY); // status code is 422
        }

        $this->response->setData($this->data);

        return $this->response;
    }
}
