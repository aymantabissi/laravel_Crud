@extends('base')

@section('main')
<div class="container mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h3 class="text-center">{{ __('message.edit_contact') }}</h3>
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
                    <form method="POST" action="{{ route('contact.update', $contact->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('message.name') }}</label>
                            <input type="text" name="name" value="{{ old('name', $contact->name) }}" class="form-control" id="name">
                        </div>

                        <div class="form-group mt-3">
                            <label for="email" class="form-label">{{ __('message.email') }}</label>
                            <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="form-control" id="email">
                        </div>

                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn btn-success">{{ __('message.update_contact') }}</button>
                            <a href="{{ route('contact.index') }}" class="btn btn-secondary ms-2">{{ __('message.cancel') }}</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
