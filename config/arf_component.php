<?php
return [
    'bloomx' => [
        'api_token' => env('BLOOMX_API_TOKEN', 'e232c642-3eb5-4924-b3d6-2859e03a3945'),
        'api_secret' => env('BLOOMX_API_SECRET', 'd56152735d4a945867bb3f95e76b1e9f'),
        'api_endpoint' => env('BLOOMX_API_ENDPOINT', 'https://staging.bloomremit.net/api/v1/partners'),
        'agent_id' => env('BLOOMX_API_ENDPOINT', 'e9c95c7d-2481-4c97-a80e-6f282c53a435'),
    ],
    'clientApi' => [
        'baseUrl' => env('CLIENT_API_BASE_URL', 'arf_client.io'),
        'transactionWebhook' => "api/v2/webhooks/transfer-api/transactions",
        'collectionWebhook' => "api/v2/webhooks/transfer-api/collections"
    ],
    'pbm' => [
        'baseUrl' => env('PBM_BASE_URL', 'https://testtransfer.payby.me/v1'),
    ],
    'localPayment' => [
        'baseUrl' => env('LOCAL_PAYMENT_BASE_URL', 'https://sandbox.localpayment.com/api/v2'),
        'apiKey' => env("LOCAL_PAYMENT_API_KEY", 'ECP#RARF'),
        'customerId' => env("LOCAL_PAYMENT_CUSTOMER_ID", '000035000001'),
    ]
];
