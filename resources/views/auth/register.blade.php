@extends('base')

@section('main')
    <div class="container mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="display-4 text-center">{{ __('message.register') }}</h3>
                    </div>

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('message.name') }}</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">{{ __('message.email') }}</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">{{ __('message.password') }}</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password_confirmation">{{ __('message.confirm_password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">{{ __('message.register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
