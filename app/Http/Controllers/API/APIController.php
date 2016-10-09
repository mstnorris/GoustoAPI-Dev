<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    protected $statusCode = 200;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    protected function setStatusCode($statusCode)
    {
        return $this->statusCode = $statusCode;
    }

    public function respondNotFound($message = 'Not found')
    {
        return $this->setStatusCode(404)
            ->responseWithError($message);
    }

    public function respondValidationError($message = 'Could not validate')
    {
        return $this->setStatusCode(403)->responseWithError($message);
    }

    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function responseWithError($message)
    {
        return $this->respond([
            "error" => [
                "message" => $message,
                'status_code' => $this->statusCode]
        ]);
    }
}
