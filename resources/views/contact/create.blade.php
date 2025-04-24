@extends('base')  <!-- Extending the base layout -->

@section('main') 
<div class="container mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="display-4 text-center">{{ __('message.add_contact') }}</h3>
                </div>
                
                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('message.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('message.enter_name') }}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label">{{ __('message.email') }}</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('message.enter_email') }}">
                        </div>
                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('message.add_contact') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
