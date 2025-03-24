<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\ApiService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;

class Login extends Component
{
    
    public $email;
    public $password;
    
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount()
    {
        if (session()->has('token')) {
            return redirect()->to('/');
        }
    }

    public function login()
    {
        $this->validate();

        $apiService = new ApiService();
        
        $response = $apiService->request('POST', 'login/', [
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if (isset($response['status']) && $response['status'] === true) {
            // Store authentication data in session
            session([
                'token' => $response['data']['token'],
                'user_role' => $response['data']['role'],
                'username' => $response['data']['username'],
                'user_email' => $response['data']['email'],
            ]);
            
            // Redirect to home page
            return redirect()->to('/');
        }

        $this->addError('email', 'Invalid credentials');
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.auth.login');
    }
} 