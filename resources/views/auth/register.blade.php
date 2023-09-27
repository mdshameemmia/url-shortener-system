<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="col-md-12 d-flex justify-content-center my-5">
            <fieldset style="border: 1px solid black" class="col-md-3"> 
                <legend class="text-center">Register</legend>
                <form method="POST" action="{{ route('register') }}" class="p-3">
                    @csrf
        
                      <!-- Name -->
                      <div>
                        <x-label for="name" :value="__('Name')" />
        
                        <x-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('email')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />
        
                        <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-label for="password" :value="__('Password')" />
        
                        <x-input id="password" class="block mt-1 w-full form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-label for="password_confirmation" :value="__('Password Confirmation')" />
        
                        <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                        type="password"
                                        name="password_confirmation"
                                        required autocomplete="current-password" />
                    </div>
        
        
                    <div class="flex items-center justify-end mt-4">
                     
        
                        <x-button class="ml-3 text-dark btn btn-primary">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </fieldset>
        </div>
    </x-auth-card>
</x-guest-layout>
