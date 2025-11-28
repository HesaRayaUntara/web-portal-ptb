@extends('layouts.admin')

@section('title', 'Login Admin')

@section('content')
    <section class="flex py-8 items-center justify-center">
        <div class="mx-auto flex w-full max-w-3xl flex-col overflow-hidden rounded-xl bg-white shadow-md lg:flex-row lg:shadow-lg">
            <!-- Left Side - Branding (Visible on all screens but compact on mobile) -->
            <div class="relative w-full overflow-hidden bg-gradient-to-br from-primary via-primaryDark to-secondary lg:w-2/5">
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1200&q=80')] bg-cover bg-center opacity-20 mix-blend-overlay"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/40 to-primary/80"></div>
                
                <div class="relative flex flex-col justify-center p-5 text-white sm:p-6 lg:p-8">
                    <div class="space-y-2 sm:space-y-3">
                        <div class="inline-flex items-center gap-1.5 rounded-full bg-white/20 px-2.5 py-1 backdrop-blur-sm sm:px-3 sm:py-1.5">
                            <span class="text-xs font-medium">Program Studi PTB</span>
                        </div>
                        <h2 class="font-bold leading-tight sm:text-xl lg:text-2xl">Selamat Datang Kembali</h2>
                        <p class="text-xs leading-relaxed text-white/90 sm:text-sm">Kelola informasi program studi Pemuliaan Tanaman dan Teknologi Benih dengan mudah dan efisien.</p>
                    </div>
                    
                    <div class="mt-4 space-y-2 sm:mt-5 sm:space-y-2.5">
                        <div class="flex items-center gap-2 text-xs">
                            <div class="flex h-6 w-6 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm sm:h-7 sm:w-7">
                                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Kelola konten & informasi</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            <div class="flex h-6 w-6 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm sm:h-7 sm:w-7">
                                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Update galeri & publikasi</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            <div class="flex h-6 w-6 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm sm:h-7 sm:w-7">
                                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span>Komunikasi publik yang efektif</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="flex w-full items-center justify-center p-5 sm:p-6 lg:w-3/5 lg:p-8">
                <div class="w-full max-w-xs space-y-5">
                    <!-- Header -->
                    <div class="space-y-1.5 text-center lg:text-left">
                        <div class="inline-flex items-center gap-1.5">
                            <h1 class="text-lg font-bold text-secondary sm:text-xl lg:text-2xl">Masuk ke Dashboard</h1>
                        </div>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="rounded-lg border border-red-200 bg-red-50 p-3 text-xs text-red-700 sm:p-4 sm:text-sm">
                            <div class="flex items-start gap-2">
                                <svg class="mt-0.5 h-4 w-4 flex-shrink-0 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="font-medium">Terjadi kesalahan</p>
                                    <ul class="mt-1 list-disc list-inside space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form class="space-y-3.5" method="POST" action="{{ route('admin.login.submit') }}" id="loginForm">
                        @csrf
                        
                        <!-- Username Field -->
                        <div class="space-y-1">
                            <label for="username" class="block text-xs font-semibold text-textDark">
                                Username
                            </label>
                            <div class="group relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2.5">
                                    <svg class="h-3.5 w-3.5 text-textMuted transition-colors group-focus-within:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="username" 
                                    name="username" 
                                    type="text" 
                                    value="{{ old('username') }}"
                                    placeholder="Masukkan username Anda"
                                    required
                                    autocomplete="username"
                                    class="w-full rounded-lg border-2 border-gray-200 bg-gray-50 py-2 pl-9 pr-3 text-xs text-textDark placeholder:text-textMuted transition-all duration-200 focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/10 sm:text-sm"
                                >
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-1">
                            <label for="password" class="block text-xs font-semibold text-textDark">
                                Password
                            </label>
                            <div class="group relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2.5">
                                    <svg class="h-3.5 w-3.5 text-textMuted transition-colors group-focus-within:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    placeholder="Masukkan password Anda"
                                    required
                                    autocomplete="current-password"
                                    class="w-full rounded-lg border-2 border-gray-200 bg-gray-50 py-2 pl-9 pr-14 text-xs text-textDark placeholder:text-textMuted transition-all duration-200 focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/10 sm:text-sm"
                                >
                                <button 
                                    type="button" 
                                    id="toggle-password" 
                                    class="absolute inset-y-0 right-0 flex items-center pr-2.5 text-primary transition-colors hover:text-primaryDark"
                                >
                                    <!-- Icon mata tertutup (default saat password hidden) -->
                                    <svg id="icon-eye-off" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                    <!-- Icon mata terbuka (saat password visible) -->
                                    <svg id="icon-eye" class="h-4 w-4 hidden" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit"
                            id="submitBtn"
                            class="group relative w-full overflow-hidden rounded-lg bg-primary text-white py-2 text-xs font-semibold shadow-soft"
                        >
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <span>Masuk ke Dashboard</span>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-primaryDark to-secondary opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Password Toggle
            const togglePasswordBtn = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');

            togglePasswordBtn?.addEventListener('click', (e) => {
                e.preventDefault();
                if (!passwordInput) return;
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                
                // Toggle icon visibility
                const iconEyeOff = document.getElementById('icon-eye-off');
                const iconEye = document.getElementById('icon-eye');
                if (iconEyeOff && iconEye) {
                    if (isPassword) {
                        iconEyeOff.classList.add('hidden');
                        iconEye.classList.remove('hidden');
                    } else {
                        iconEyeOff.classList.remove('hidden');
                        iconEye.classList.add('hidden');
                    }
                }
            });

            // Form Loading State
            const loginForm = document.getElementById('loginForm');
            const submitBtn = document.getElementById('submitBtn');
            
            loginForm?.addEventListener('submit', () => {
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <span class="flex items-center justify-center gap-2">
                            <svg class="h-3.5 w-3.5 animate-spin sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Memproses...</span>
                        </span>
                    `;
                }
            });
        });
    </script>
@endpush
