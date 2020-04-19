@extends('layouts.app')

@section('content')
<div class="container">

      <div class="card">
        <div class="mt-3">
            <div class="text-center">
                <h1 class="mt-2" style="color :#212121">Create an account</h1>
            </div>
        </div>
        <div class="card-body">
            @if(Session::has('errors'))
                <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                          @foreach ($errors->all() as $error)
                                <strong>Oops!</strong> {{ $error }}
                                <br>
                          @endforeach
                        </div>
                </div>
                <br>
            @endif
            <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="phone_number">{{ __('Phone Number') }}</label>

                                <input id="phone_number" type="text" class="form-control " name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">
                            
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="text-right">
                             <button type="submit" class="btn btn-primary">
                                    {{ __('Sign Up') }}
                                </button>
                        </div>
                    </form>
        </div>
    </div>

   
</div>
@endsection
