<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeaderLine('Authorization'); // Retrieve the Authorization header
        if (!$authHeader) {
            return Services::response()
                ->setJSON(['message' => 'Authorization token not provided'])
                ->setStatusCode(401);
        }

        // Extract token from the Authorization header
        $token = null;
        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];
        }

        if (!$token) {
            return Services::response()
                ->setJSON(['message' => 'Invalid token format'])
                ->setStatusCode(401);
        }

        // Decode and verify the token
        try {
            $key = getenv('JWT_SECRET_KEY');
            $decoded = JWT::decode($token, new Key($key, 'HS256')); // Decode the JWT token
        } catch (\Exception $e) {
            return Services::response()
                ->setJSON(['message' => 'Invalid or expired token'])
                ->setStatusCode(401);
        }

        // Optionally: Set the decoded data to the request for future use in the controller
        $request->decoded = $decoded;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No post-processing required for JWT validation
    }
}
