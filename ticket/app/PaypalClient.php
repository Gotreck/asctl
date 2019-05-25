<?php

namespace App;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;


ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use ProductionEnvironment.
     */
    public static function environment()
    {
        $clientId = "AQPCOWbPf2QJwGeAt9gXPVOWSJLKNhlpRcNxzxRll9ABx5yohzYtmuLW0PgUj8QuG4YueBhmGlYLjh72";
        $clientSecret = "ENackSWd1cikHukYa-oJnNHPpi5HnxAumb6IpOp1ip6-s7fCCf4lhUBUsH5hZKhYwn9t6cF03D0WCpw5";
        return new ProductionEnvironment($clientId, $clientSecret);
    }
}