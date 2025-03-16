<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\ApiService;
use Illuminate\Support\Facades\Cache;

class Login extends Component
{
    public $email;
    public $password;
    
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        $apiService = new ApiService();
        
        $response = $apiService->request('POST', 'login/', [
            'email' => $this->email,
            'password' => $this->password,
        ]);
        // dd($response);

        if (isset($response['success']) && $response['success'] === true) {
            // Store JWT token in cache
            Cache::put('jwt_token', $response['data']['token'], now()->addHours(24));
            
            // Store user data in cache
            Cache::put('user_data', $response['data']['user'], now()->addHours(24));
            
            // Store additional user information that might be needed across the application
            session([
                'user_role' => $response['data']['user']['role'],
                'username' => $response['data']['user']['username'],
                'jabatan' => $response['data']['user']['jabatan'],
            ]);
            
            // Redirect to home page
            return redirect()->to('/');
        }

        $this->addError('email', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
} 