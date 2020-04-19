@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="mt-3">
            <div class="text-center">
                <h1 class="mt-2" style="color :#212121">Sign in your account</h1>
            </div>
        </div>
        <div class="card-body">
            @if(Session::has('errors'))
                <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                          @foreach ($errors->all() as $error)
                                <strong>Oops!</strong> {{ $error }}
                          @endforeach
                        </div>
                </div>
                <br>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset class="form-group">
                    <label for="phoneNumber">Phone number</label>
                    <input type="text" name="phone_number" class="form-control" id="phoneNumber" placeholder="e.g 09193693499" autofocus>
                </fieldset>
                <fieldset class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </fieldset>
                
                <fieldset class="form-group">
                      @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                       @endif
                </fieldset>

                <div class="text-right">
                    <input type="submit" class="btn btn-primary" value="Sign in">
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection
