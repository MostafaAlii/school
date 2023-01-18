<?php

namespace App\Http\Controllers\Auth\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Dashboard\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

class AdminAuthController extends Controller {
    public function create(): View {
        return view('dashboard.auth.login');
    }

    public function login(AdminLoginRequest $request): RedirectResponse {
        $check = $request->all();
        if (auth('admin')->attempt(['email' => $check['email'], 'password' => $check['password'], 'status' => 'active'])) {
                return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', trans('dashboard/auth.error_in_your_credintional'));
        }
    }

    public function destroy(Request $request): RedirectResponse {
        auth('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}