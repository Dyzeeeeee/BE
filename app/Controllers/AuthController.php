<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\CustomerModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends BaseController
{
    use ResponseTrait;
  
    public function getUser($userId)
    {
        if (!$userId) {
            return $this->failValidationErrors('No user ID provided');
        }

        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        if (empty($userData)) {
            return $this->failNotFound('User not found');
        }

        return $this->respond($userData);
    }
    

    public function signup()
    {
        $json = $this->request->getJSON();
        $userModel = new UserModel();
        $customerModel = new CustomerModel();

        $rules = [
            'firstname' => 'required|min_length[2]|max_length[50]',
            'lastname' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'birthday' => 'valid_date',
            'address' => 'max_length[255]',
        ];


        // Validate input data
        // if (!$this->validate($rules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        // Save user data to the database
        $data = [
            'firstname' => $json->firstname,
            'lastname' => $json->lastname,
            'birthday' => $json->birthday,
            'address' => $json->address,
            'phone' => $json->phone,
            'email' => $json->email,
            'password' => password_hash($json->password, PASSWORD_DEFAULT), // Hash the password
        ];

        if (!$userModel->save($data)) {
            return $this->failServerError('Failed to create user');
        }

        // Return success response
        return $this->respondCreated(['message' => 'User registered successfully']);
    }

    public function login()
    {
        $json = $this->request->getJSON(); // Fetch the incoming JSON data
        $userModel = new UserModel();

        // Ensure the email and password are provided
        if (!isset($json->email) || !isset($json->password)) {
            return $this->failValidationErrors("Email and password are required.");
        }

        // Find the user by email
        $user = $userModel->where('email', $json->email)->first();

        if (!$user) {
            return $this->failNotFound('User not found');
        }

        // Verify password
        if (!password_verify($json->password, $user['password'])) {
            return $this->failUnauthorized('Incorrect password');
        }

        // Prepare JWT payload
        $key = getenv('JWT_SECRET_KEY');
        $issuedAt = time();
        $expirationTime = $issuedAt + 3600; // JWT valid for 1 hour
        $payload = [
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'sub' => $user['id'],  // User ID is the subject of the token
            'email' => $user['email']
        ];

        // Encode the payload to create JWT
        $token = JWT::encode($payload, $key, 'HS256');

        // Return the token and user data
        return $this->respond([
            'message' => 'User logged in successfully',
            'token' => $token,
            'user' => $user
        ]);
    }
    public function logout()
    {
        // Optionally get the token from the request to log it or add it to a blacklist
        $token = $this->request->getHeaderLine('Authorization');
        $token = trim(str_replace("Bearer", "", $token)); // Assuming it starts with 'Bearer '
    
        // You might log the token or add it to a blacklist stored in the database or cache
        // This part depends on your specific application requirements
        log_message('info', 'User logged out, token: ' . $token);
    
        // Just return a successful logout message
        return $this->respond([
            'message' => 'Successfully logged out'
        ], 200);
    }
    public function getCustomers()
    {
        $userModel = new UserModel();
    
        // Retrieve all users with role 'customer'
        $users = $userModel->where('role', 'customer')->findAll();
    
        if (empty($users)) {
            return $this->failNotFound('No customers found');
        }
    
        // Return the list of customers
        return $this->respond($users);
    }
    

    
}
