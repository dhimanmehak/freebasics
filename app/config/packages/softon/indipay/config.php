<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Indipay Service Config
    |--------------------------------------------------------------------------
    |   gateway = CCAvenue / PayUMoney / EBS / Citrus
    |   view    = File
    */

    'gateway' => 'PayUMoney',                // Replace with the name of appropriate gateway

    'testMode'  => true,                   // True for Testing the Gateway [For production false]

    'ccavenue' => [                         // CCAvenue Parameters
        'merchantId'  => 'YOUR_MERCHANT_ID',
        'accessCode'  => 'YOUR_ACCESS_CODE',
        'workingKey' => 'YOUR_WORKING_KEY',

        // Should be route address for url() function
        'redirectUrl' => 'indipay/response',
        'cancelUrl' => 'indipay/response',

        'currency' => 'INR',
        'language' => 'EN',
    ],

    'payumoney' => [                         // PayUMoney Parameters
        'merchantKey'  => 'rjQUPktU',
        'salt'  => 'e5iIg1jwi8',
        'workingKey' => 'rjQUPktU',

        // Should be route address for url() function
        'successUrl' => 'indipay/getresponse',
        'failureUrl' => 'indipay/getresponse',
    ],

    'ebs' => [                         // EBS Parameters
        'account_id'  => 'YOUR_MERCHANT_ID',
        'secretKey' => 'YOUR_WORKING_KEY',

        // Should be route address for url() function
        'return_url' => 'indipay/response',
    ],

    'citrus' => [                         // Citrus Parameters
        'vanityUrl'  => 'YOUR_CITRUS_VANITY_URL',
        'secretKey' => 'YOUR_WORKING_KEY',

        // Should be route address for url() function
        'returnUrl' => 'indipay/response',
        'notifyUrl' => 'indipay/response',
    ],

    'remove_csrf_check' => [
        'indipay/response'
    ],





];
