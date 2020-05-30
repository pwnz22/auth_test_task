@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Избранные</div>


                    <div class="card-body">
                        @if (session('deleted'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('deleted') }}
                            </div>
                        @endif

                        @if(count(auth()->user()->contacts))
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
                                @foreach(auth()->user()->contacts as $contact)
                                    <tr>
                                        <th scope="row">{{ $contact->id }}</th>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <a href="{{ route('contacts.delete', [$contact->id]) }}" class="btn btn-danger">Удалить контакт</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>У вас нет контактов. Добавить из <a href="{{ route('contacts.index') }}">списка контактов</a>.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
