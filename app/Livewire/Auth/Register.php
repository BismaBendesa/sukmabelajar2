<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class Register extends Component
{
    public string $role = '';
    public string $username = '';
    public string $email = '';
    public string $nim = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules()
    {
        return [
            'role' => 'required|in:mhs,dosen',
            'username' => 'required|min:3',
            'email' => 'required|email',
            'nim' => 'required|min:5',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function store()
    {
        $validated = $this->validate();

        try {
            $user = User::create([
                'role' => $validated['role'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'nim' => $validated['nim'],
                'password' => Hash::make($validated['password']),
            ]);

            Auth::login($user);

            session()->flash('success', 'Registrasi berhasil 🎉');
            return redirect()->route('dashboard');
        } catch (\Throwable $e) {
            report($e);
            $this->addError('database', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.guest');
    }
}
