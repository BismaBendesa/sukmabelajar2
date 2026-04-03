<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VerifyEmail extends Component
{
    public string $code = '';

    protected function rules()
    {
        return [
            'code' => 'required|digits:6',
        ];
    }

    public function verify()
    {
        $this->validate();

        $userId = session('user_id');

        if (!$userId) {
            session()->flash('error', 'Session expired. Please register again.');
            return $this->redirectRoute('login'); // or register
        }

        $user = User::find($userId);

        if (!$user) {
            session()->flash('error', 'User not found.');
            return $this->redirectRoute('login');
        }

        if ($user->verification_code == $this->code) {
            $user->update([
                'email_verified_at' => now(),
                'verification_code' => null, // clear the code
            ]);

            Auth::login($user);

            session()->forget('user_id');

            session()->flash('success', 'Email verified successfully!');

            return $this->redirectRoute(
                $user->role === 'dosen' ? 'dashboard.dosen' : 'dashboard'
            );
        } else {
            $this->addError('code', 'Invalid verification code.');
        }
    }

    public function render()
    {
        return view('livewire.auth.verify-email')
            ->layout('layouts.guest');
    }
}
