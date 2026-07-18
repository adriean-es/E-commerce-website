<?php
$ch = curl_init('http://127.0.0.1:8000/supplier/register');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'token' => 'GjDvZ5RM7JYggc95Z5ZwfJdqMObh3bqAdBDtcUfkGjySZADYDWHl6dKj9jeLCaOM',
    'company_name' => 'Test Company',
    'name' => 'Test User',
    'password' => 'password123',
    'password_confirmation' => 'password123'
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'X-Requested-With: XMLHttpRequest'
]);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $httpcode\n";
echo "Response: $response\n";
