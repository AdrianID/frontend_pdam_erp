<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ApiService;

class Profile extends Component
{
    public $username;
    public $email;
    public $jabatan;
    public $current_password;
    public $new_password;
    
    protected $rules = [
        'username' => 'required|min:3',
        'email' => 'required|email',
        'current_password' => 'required_with:new_password',
        'new_password' => 'nullable|min:6',
    ];

    public function mount()
    {
        $this->username = session('username');
        $this->email = session('user_email');
        $this->jabatan = session('jabatan');
    }

    public function updateProfile()
    {
        $this->validate();

        $apiService = new ApiService();
        
        $data = [
            'username' => $this->username,
            'email' => $this->email,
        ];

        if ($this->new_password) {
            $data['current_password'] = $this->current_password;
            $data['new_password'] = $this->new_password;
        }

        $response = $apiService->request('POST', 'profile/update', $data);

        if (isset($response['success']) && $response['success'] === true) {
            // Update session data
            session([
                'username' => $this->username,
                'user_email' => $this->email
            ]);

            session()->flash('message', 'Profile updated successfully!');
            
            // Reset password fields
            $this->current_password = '';
            $this->new_password = '';
        } else {
            $this->addError('current_password', 'Failed to update profile. Please check your current password.');
        }
    }

    public function render()
    {
        return view('livewire.profile');
    }
} 