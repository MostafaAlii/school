<?php
namespace App\Http\Requests\Auth\Dashboard;
use Illuminate\Foundation\Http\FormRequest;
class AdminLoginRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6',
        ];
    }

    public function messages() {
        return [
            'email.required' => trans('dashboard/auth.email_required'),
            'email.email' => trans('dashboard/auth.email_email'),
            'email.exists' => trans('dashboard/auth.email_exists'),
            'password.required' => trans('dashboard/auth.password_required'),
            'password.min' => trans('dashboard/auth.password_min'),
        ];
    }
}