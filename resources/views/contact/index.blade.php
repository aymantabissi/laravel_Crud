@extends('base')

@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between mb-3">
                <h2>Liste des Contacts</h2>
                <a href="{{ route('contact.create') }}" class="btn btn-success">Ajouter un Contact</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>
                                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                
                                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce contact ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Aucun contact trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
