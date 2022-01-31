<?php

namespace App\Traits;

trait BpjsResponse
{
    // format response bpjs
    protected function response(array $response, array $metadata)
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
