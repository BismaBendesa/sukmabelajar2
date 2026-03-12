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
            'username' => 'required|min:3|unique:users,username',
            'email' => [
                'required',
                'email',
                'unique:users,email',
                function ($attribute, $value, $fail) {
                    if ($this->role === 'dosen') {

                        // Allow bypass in local environment
                        if (app()->environment('local')) {
                            return;
                        }

                        if (!str_ends_with($value, '@unud.ac.id')) {
                            $fail('Dosen wajib menggunakan email kampus (@unud.ac.id).');
                        }
                    }
                },
            ],

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

                // LEVEL SYSTEM RULE
                'level' => $validated['role'] === 'mhs' ? 1 : null,
                'exp'    => $validated['role'] === 'mhs' ? 0 : null,
            ]);

            Auth::login($user);

            session()->flash('success', 'Registrasi berhasil 🎉');
            return $this->redirectRoute(
                Auth::user()->role === 'dosen'
                    ? 'dashboard.dosen'
                    : 'dashboard'
            );
        } catch (\Throwable $e) {
            report($e);
            // dd($e->getMessage(), $e->getTraceAsString());
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.guest');
    }
}
