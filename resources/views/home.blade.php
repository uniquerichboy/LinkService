@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Панель') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                    <form method="get" action="/create">
                        <div class="mb-3">
                            <label for="link" class="form-label">Ссылка</label>
                            <input type="text" name="link" class="form-control" id="link" aria-describedby="help" autocomplete="false" placeholder="http://domain.com/">
                            <div id="help" class="form-text">Введите ссылку которую хотите сокрытить</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать ссылку</button>
                    </form>
                    <!-- TABLE -->
                    <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Старая ссылка</th>
                        <th scope="col">Новая ссылка</th>
                        <th scope="col">Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($link as $l)
                        <tr>
                            <td>{{ $l->id }}</td>
                            <td>{{ $l->old }}</td>
                            <td><a href="{{ $l->old }}" target="_blank">{{ $l->new }}</a></td>
                            <td>{{ $l->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $link->links() }}
                    <!-- TABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
