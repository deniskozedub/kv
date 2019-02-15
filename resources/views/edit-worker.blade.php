
@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/bulma.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/add-company.css')}}">
@endsection

@section('content')

    <form method="post" action="/worker-save/{{$worker->id}}" enctype="multipart/form-data">
        {!!  csrf_field()!!}

        <div class="row m-2">

            <div class="col-md-6 offset-3 ">
                <div class="form-group">
                    <h2 class="title is-2">Редактирование юзера</h2>
                </div>
                <div class="form-group">
                    <label for="name"> <h4 class="subtitle is-5">Имя:</h4>
                    </label>

                    <input class="form-control"
                           type="text" name="name" placeholder="Имя" value="{{$worker->name}}"/>
                </div>

                <div class="form-group">
                    <label for="surname"> <h4 class="subtitle is-5">Фамилия:</h4>
                    </label>

                    <input class="form-control "
                           type="text" name="surname" placeholder="Фамилия" value="{{$worker->surname}}"/>
                </div>




                <div class="form-group">
                    <label for="phone"> <h4 class="subtitle is-5"> Телефон:</h4>
                    </label>

                    <input class="form-control "
                           type="text" name="phone" placeholder="Телефон" value="{{$worker->phone}}"/>
                </div>


                <div class="form-group">
                    <label for="email"> <h4 class="subtitle is-5"> Email:</h4>
                    </label>

                    <input class="form-control "
                           type="email" name="email" placeholder="Email" value="{{$worker->email}}"/>
                </div>




                <select name="company_id" >
                    @foreach($company as $item)
                        <option value="{{$item->id}}" {{$item->id == $worker->company->id ? 'selected': 'none'}}>{{$item->name}}</option>
                    @endforeach
                </select>


                <div class="form-group send ">

                    <button type="submit" class="button is-primary btn">
    <span class="icon is-small" >
      <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAASHSURBVGhD7Zl9TBtlHMdr/Ef/MzExcYFer0B73LXXlkIHTHFOyTLfqDCmUYG6jQpjbENACgFaYBggg21uZeUlvIoOImMvMc4sU2NcUMM0wU1FzYgv08TMl46WoUN+9qkPBNoDOXo3iN4n+SZ9rvfc7/vN89xz16cyCQkJCQkJCR7I5dS9cgVtDVfQJUKKIKh4XEJ8SJI2RakN7hRztjcjswSWktm8GepqrctScvIWiFQZvOEk8zguJS7q6LjPSstaoLf34r+qrvYFmJkc4NSbpw9C3u58ODl4wN8ufHEv1NW/ASoq1ktGap/B5cRDodRMd3V9xGk8UEsFycvfDduyuiEzK9vfRkFQn8amUxBNm7zKSDYHlxQHgmSCDC+mlQRBOvzKW8BoE3xh9DZcVniECrKvYC/ct2kXWHN2+dvzgyAddZ4DnSHJ47tvGnBpYeETpLTEAjcn+oNCBGps1AkOuz2ov6vlPYg1PexRqY0tvtK3/eNAIPgEaXb2QXHRPigs3LOkUIienmHOa7S1fQAJiY96oijjcZks/XZsI3T4BBFKHR3DkLQxFY3MGWwjdFYjCBJaKVFtbCN0FgtyzHUGHI6DUF7eEJIcVYfA5TrNWUP0INU1TTB0cgCuu3+Amb9+C0noGuhaNTWHguqIGgSNxIkh38rEYSoUDZ7oDxoZUYOg6STESAQKXdNub1xQS9Qg5RX1nEaEUGGRY0GtWxLk88sj4Gw+smyh81G/nt7ORb9blSBiSAqyHBYLwndqzRfqi4Sm2eznVQsihv4TQcbHL0Hq1kzItlZBTu5+qKzsvHVBQple85We/hTEmRJhT/5zUFtthfKyHZBifgzICM2MimJrCIK4A9tZOWKOyMDAq2BavwEG+ytg2hP8O+b7b1rhecuTXpoxjCmV7D3Y0soQK8jZs6fg/qQk+O7r1qAAgTpQn3sThQlpZBYLEuq0MsYlwuVPj3Aa55LFkjKpovT7sS3+iDEirW3NUFKcxWk4UL/+1A1fjB6Fb79qBbVa7wkLi78TW+OHGEHS0rbChXcbOI3P19Ur7VBRZoHrP/f6249secgdTmqSsTV+iBEkJjYBfvmxK8j4fKENimr7Dpj6/bW5Y7aXMm4QJF2ArfEjcINOiCARUeycwYvDTdDZXjRnFumTD5ugsSE3aEempmrntFzBFGNr/EBbprZSl6BBEjY8AONjLXMGP77QCPUv58Af7tfhnbdrweUsWBBgVtbstIlwBZOJrfEjjGTiIlQG9xMpO73oqWtOzeBchfho46bN0N1RvMAkemYUFz4LfT22BcdnhZ4ztMYwSRBqBbbGn9m/FXz3S50QkpP0sfXxCZ4/J45zmuZSf1/pjJaNGcGW1g5anfF8lX37FJfpQKFpqNXFeMKVmljcfe2wbh11N00bxh2V26eWGpnRkcO+Vc7kpShtHu669kBhGNZ4zmSK93S1F81c+dLlX82uXe2C98/X+V4in75B0Xo3Gcmm4S5rG4JgHmS0MUPRjP6a7413WkXpJljWeEkZydoIQncXPk1CQuL/jUz2N71MogCiILVrAAAAAElFTkSuQmCC">
    </span>
                    </button>
                </div>
            </div>
        </div>
    </form>


@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="{{asset('js/admin/script.js')}}"></script>

@endsection

@endsection



