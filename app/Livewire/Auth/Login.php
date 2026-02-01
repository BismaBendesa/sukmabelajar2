<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public string $login = ''; // email OR username
    public string $password = '';

    protected function rules()
    {
        return [
            'login' => ['required'],
            'password' => ['required'],
        ];
    }

    public function submit()
    {
        $this->validate();

        // Determine login field
        $field = filter_var($this->login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        if (Auth::attempt([
            $field => $this->login,
            'password' => $this->password,
        ])) {
            session()->regenerate();

            return redirect()->route('dashboard');
        }

        $this->addError('login', 'Email / Username atau password salah.');
    }

    public function mount()
    {
        if (auth()->check()) {
            redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.guest');
    }
}
