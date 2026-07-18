<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$token = \App\Models\SupplierInvitation::first()->token;

$request = Illuminate\Http\Request::create(
    '/supplier/register',
    'POST',
    [
        'token' => $token,
        'company_name' => 'Test',
        'name' => 'Test',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]
);
$request->headers->set('X-Inertia', 'true');

$response = $kernel->handle($request);
echo "Status: " . $response->getStatusCode() . "\n";
echo "Content: " . substr($response->getContent(), 0, 500) . "\n";
