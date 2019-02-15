@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/admin/bulma.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/add-company.css')}}">
@endsection

@section('content')

    <form method="post" action="/company" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row m-2">

            <div class="col-md-6 offset-3 @if($errors->has('title') || $errors->has('head_page') ||
            $errors->has('pdf')
            ) has-error-col @endif ">
                <div class="form-group">
                    <h2 class="title is-2">Создание компании</h2>
                </div>
                <div class="form-group">
                    <label for="name"> <h4 class="subtitle is-5">Название:</h4><br>
                        @if($errors->has('name'))<span style="color: red">
                    {{$errors->first('name')}}</span> @endif
                    </label>

                    <input class="form-control @if($errors->has('name'))  has-error @endif" value="{{old('name')}}"
                           type="text" name="name" placeholder="Название"/>
                </div>

                <div class="form-group">
                    <label for="email"> <h4 class="subtitle is-5">Email:</h4><br>
                        @if($errors->has('email'))<span style="color: red">
                    {{$errors->first('email')}}</span> @endif
                    </label>

                    <input class="form-control @if($errors->has('email'))  has-error @endif" value="{{old('email')}}"
                           type="email" name="email" placeholder="Email"/>
                </div>

                <div class="form-group ">
                    <label for="logo"> <h4 class="subtitle is-5">Лого:</h4></label><br>
                    @if($errors->has('logo'))<span style="color: red">
                    {{$errors->first('logo')}}</span> @endif <br>
                    <div class="field" >
                        <div class="file is-left is-boxed @if($errors->has('logo'))  is-danger @else is-primary   @endif  has-name">
                            <label class="file-label">
                                <input class=" @if($errors->has('logo'))  has-error @endif file-input  file1" type="file" name="logo">
                                <span class="file-cta"><span class="file-icon">
                             <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAU2SURBVGhD7ZcLTFtVGMfvgolO3VOYWWRAIrRFh5sYdDPbXPCxjfnYJpol6rbEAUXkYTJZaDPZhJnx2IA9wPEYbRGIhdJ2y2RtHYUJtAUTMTpM1Jhl8UEYMcAQhbH7+Z3u9pbCqVCW3m6x/+SXsu+ec/v9cs7pvWP88ccff/yZKQaptdyQZDXZSbA8Q2oVEn1WhVhrIlSJtO+SmmyF6hVZqMpEkIeockmNJC6wIG1LYIF+c1DhOq7kmxiSLF1GqRUIKBNPapVi7clKsQ4IFSLdcVLD5t+Sh6rATojKRmqbHi4KiwssBI7LpOazoMgFXiTZmkhquAoZvIhY20RqstDq1ZNExrPCq4JeW1S0eEtg4QARwU8dGeezGJMspx0iyFFSq4zQbXWK6PrVjDqAYWCeLER5xSGDf58hY19aUrgibmnBjvjgo/PJv6lhzzBRbDXzEatgyvDz9IwomHyoZu7jps8qxiTr+7xIkrWD1FBgAa7E3w6ZcpE+ltRlIao0flVurcyp7CD1g+Sa22BjhxEWFAx4Aso0eyJjTOiMcogYpJZxc+LXgaReKdJqnKuibSO1bMZ8Dzbf6iITqhqQhyjrZaHKHDLGJSiwk9bkbPFEBnDL4Pa66lwVSzqpl0do1ztE7DIS/W5Sz15eG4gynVNkcHWUg+S6S1CkjdagJ3gig1sqhxeRWn43vN3zAKm7roputFLStJbUU8NL7sUVkOM5GfpvEQXTZ2+oJgCgaQGAfvGcYM891Msal9fMxEjjUxpTcseEQ+Zy3qEeUh9UrdYoV9WNOmSqIjVj9THVe7g2mQ+CP58vC1Vsx7OTjWLFXNkZlBgE7UIAqwigSyIIPxzP5VbECi2prXDd8IK93l/3IiiiGvgtRmjYUPZNeaT+ca5d92HV949M/SJvM94eDa0ZRl6mPfMsjF2KsV/rq9kMn8XUusgQcLv14AOzAB+gqVURuu1c+86wF4NvTP0iIejX7ARjsoWX6T6ohBsoSK4Nn38Wzm87Nk1mEpQz0hF+c+qXCMVPZXJehNCxXwt/mTby16+Uvg76rSegUqKdhYhFxE6+uaDYIqG3+BMXGXNaC1xVvges7TF+3HBT9PVykS4Ff9lO4Bb7ArdYK9e+Mz4VIaDMj6UHXGQI7Zl6+KN+D9y0rAS2LWyIa9d9fC7C0afeBS24GlOFzOkX4dvDxeP4X4AUJNYg7VrZnGQJ49p3BkV8dkam8k/rGviuoAhMyZ3ThCaDrzfTzwjYJIO0m/qSEWMs9BYdwWeM+e4WcTDR+QRc07wJ3xfm/4oCRtxaP+Pn8F0n4oC1Sb7i2nUfv4iA+EVuh8b6XdCue5V6ba4ILnJJtw0ekX4JkrRz8ItpPXXMXBBUpPfC8/BoSjMEJbTaeXpfAwy03Xo1v10EE/nNvBZWZWh5CQeb5AoYxWcBbY4nCCIy1P4kbNhfO03CwTu5JTAx6U12LnhdZAzfTHdkf0oVmMyHxw5R588Wr4qw+PqdnJdHbZxGSUU69T6zwasi+WX7qA27Y1miGRrqdlPvNRNeEyG/Rjkns+BjDmlePrV5grzkAD/uSGnmnA6/IIedYD37MlWCQH4MaHM8YVYiOOgabbInCCBi5tp1HxzURZvsCQKIVHHtug9rE6fSJnuCt0WgW7yRa9d9QM0E4GD1tMke4FURm/gg1+rMAWDm4YQ3cHXqEZOnGBrju2kShIG2aDNtzsxIqtguyXNci8IkKNG8jiZBWJJoWsQNu/PjF7nTsmyveU3QXvOfNJamWhdyw/z5H4Rh/gViZjs2GbXENQAAAABJRU5ErkJggg==">
                                    </span>
                            <span class="file-label">
                             Выбрать фото
                            </span>
                                </span>
                                <span class="file-name file-name1">
                                Не выбрано
                                    </span>
                            </label>
                        </div>
                    </div>
                </div>

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


