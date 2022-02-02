<?php

namespace App\Traits;

trait ApiResponse
{
    // format response bpjs
    protected function bpjsResponse(array $response, array $metadata)
    {
        return response()->json(
            [
                'response' => $response,
                'metadata' => $metadata,
            ],
            $metadata['code'],
            [
                'Accept' => 'application/json',
                'server' => 'okesiip',
            ]
        );
    }

}
