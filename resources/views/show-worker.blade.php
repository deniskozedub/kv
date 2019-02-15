@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
@endsection
@section('content')

    <div class="container">


        <div class="row">

            <div class="card">
                <div class="card-body">
                    <a href="/worker/{{$worker->id}}"><h5 class="card-title">{{$worker->name}}</h5></a>
                    <h5 class="card-title">{{$worker->surname}}</h5>
                    <h5 class="card-title">{{$worker->email}}</h5>
                    <h5 class="card-title">{{$worker->phone}}</h5>
                    <h5 class="card-title">{{$worker->company->name}}</h5>
                    <form method="post" action="/worker/{{$worker->id}}">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-danger delete-button">Удалить</button>
                    </form>

                    <a  href="{{$worker->id}}/edit"  class="btn btn-primary delete-button">Редактировать</a>
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

