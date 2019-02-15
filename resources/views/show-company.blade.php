@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
@endsection
@section('content')

    <div class="container">


        <div class="row">

                <div class="card">
                    <img class="card-img-top" src="{{$company->logo}}" alt="Card image cap">
                    <div class="card-body">
                        <a href="/company/{{$company->id}}"><h5 class="card-title">{{$company->name}}</h5></a>
                        <h5 class="card-title">{{$company->email}}</h5>
                        <form method="post" action="/company/{{$company->id}}">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger delete-button">Удалить</button>
                        </form>

                        <a  href="{{$company->id}}/edit"  class="btn btn-primary delete-button">Редактировать</a>
                    </div>
                </div>

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

