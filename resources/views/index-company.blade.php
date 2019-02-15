@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
@endsection
@section('content')

    <div class="container">

        <div class="mt-5 row count-null"  >
            <div class="row-md-3 ">
              <a href="/company/create">Добавить компанию</a>

            </div>
            <div class="row-md-3 offset-3">
                <a href="/worker/create">Добавить сотрудника</a>

            </div>
            <div class="row-md-3 offset-3">
                <a href="/worker">Просмотр сотрудников</a>

            </div>
        </div>

        <div class="row">

            @if(!$company->count() )
                <div class="col-md-3  offset-5 mt-5">
                    <h1>Пусто</h1>
                </div>
            @endif

            @foreach($company as $item)
                <div class="card">
                    <img class="card-img-top" src="{{$item->logo}}" alt="Card image cap">
                    <div class="card-body">
                        <a href="/company/{{$item->id}}"><h5 class="card-title">{{$item->name}}</h5></a>
                        <h5 class="card-title">{{$item->email}}</h5>
                        <form method="post" action="/company/{{$item->id}}">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger delete-button">Удалить</button>
                        </form>

                        <a  href="company/{{$item->id}}/edit"  class="btn btn-primary delete-button">Редактировать</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 offset-5">
            {!!  $company->render()!!}
        </div>
    </div>
@endsection
@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/admin/script.js')}}"></script>

@endsection

