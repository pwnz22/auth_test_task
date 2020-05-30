@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Контакты</div>

                    <div class="card-body">
                        @if (session('exists'))
                            <div class="alert alert-info" role="alert">
                                {{ session('exists') }}
                            </div>
                        @endif
                        @if (session('added'))
                            <div class="alert alert-success" role="alert">
                                {{ session('added') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $contact->id }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>
                                        <a href="{{ route('contacts.add') }}?contact_id={{ $contact->id }}" class="btn btn-primary">Добавить в избранные</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
