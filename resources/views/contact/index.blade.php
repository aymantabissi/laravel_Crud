@extends('base')

@section('main')
<div class="container mt-5" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between mb-3 {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }}">
                <h2>{{ __('message.contact_list') }}</h2>
                <a href="{{ route('contact.create') }}" class="btn btn-success">
                    {{ __('message.add_contact') }}
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-hover text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>{{ __('message.name') }}</th>
                        <th>{{ __('message.email') }}</th>
                        <th>{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>
                                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-warning">
                                    {{ __('message.edit') }}
                                </a>
                                
                                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('message.confirm_delete') }}')">
                                        {{ __('message.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">{{ __('message.no_contacts_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 
