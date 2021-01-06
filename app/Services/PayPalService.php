<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class PayPalService
{
  use ConsumesExternalServices;

  protected $baseUri;

  protected $clientId;

  protected $clientSecret;

  public function __constructor()
  {
    $this->baseUri = config('services.paypal.base_uri');
    $this->clientId = config('services.paypal.client_id');
    $this->clientSecret = config('services.paypal.client_secret');
  }

  public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
  {
    $headers['Authorization'] = $this->resolveAccessToken();
  }

  public function decodeResponse($response)
  {
    return json_decode($response);
  }

  public function resolveAccessToken()
  {
    $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");

    return "Basic {$credentials}";
  }

}