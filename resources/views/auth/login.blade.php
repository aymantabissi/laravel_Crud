@extends('base')

@section('main')
<div class="container mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <h2>{{ __('message.login') }}</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group mt-3">
            <label for="email">{{ __('message.email') }}</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="password">{{ __('message.password') }}</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button class="btn btn-primary mt-3">{{ __('message.login') }}</button>
    </form>
</div>
@endsection
