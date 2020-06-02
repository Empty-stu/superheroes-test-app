<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Update {{$hero->nickname}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/bootstrap.css">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .h1 {
                font-size: 42px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .update-form-wrapper {
                border: 1px solid #636b6f;
                border-radius: 5px;
                width: 420px;
                margin-left: auto;
                margin-right: auto;
            }

            .submit-button {
                width: 337px;
                height: 30px;
                color: white;
                background-color: darkcyan;
                border-radius: 5px;
            }

            .table {
                width: 90%;
                margin-left: auto;
                margin-right: auto;
            }

            .table-raw {
                width: 50%;
            }

            .delete-btn {
                height: 18px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref">
            @include('header')
            <div class="mt-3 content">
                @if(session()->has('successMessage'))
                    <div class="mt-3 alert alert-success">
                        {{ session()->get('successMessage') }}
                    </div>
                @endif
                <div class="h1 m-b-md">
                    Update {{$hero->nickname}}
                </div>
                <div class="update-form-wrapper">
                    <form method="POST" enctype="multipart/form-data" action="/update/{{$hero->id}}">
                        @csrf
                        <p>
                            <b>
                                Nickname
                            </b>
                            <br>
                            <input id="nickname" name="nickname" type="text" size="40" maxlength="50" value="{{$hero->nickname}}" required>
                        </p>
                        <p>
                            <b>
                                Realname
                            </b>
                            <br>
                            <input name="realName" type="text" size="40" maxlength="50" value="{{$hero->real_name}}" required>
                        </p>
                        <p>
                            <b>
                                Description
                            </b>
                            <br>
                            <textarea name="description" rows="10" cols="40" maxlength="65000" style="resize: vertical" required>{{$hero->origin_description}}</textarea>
                        </p>
                        <p>
                            <b>
                                Superpowers
                            </b>
                            <br>
                            <table class="table">
                                @foreach($hero->superpowers as $superpower)
                                    <tr class="table-raw">
                                        <td>
                                            {{$superpower->superpower_name}}
                                        </td>
                                        <td>
                                            <a href="/superpower/delete/{{$superpower->id}}">
                                                <img class="delete-btn" src="/img/close.png">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <br>
                            <textarea name="superpowers" rows="10" cols="40" maxlength="65000" style="resize: vertical" placeholder="First new superpower\nSecond new superpower\nThird new superpower\n..."></textarea>
                        </p>
                        <p>
                            <b>
                                Catch phrase
                            </b>
                            <br>
                            <input name="catchphrase" type="text" size="40" maxlength="100" value="{{$hero->catch_phrase}}" required>
                        </p>
                        <p>
                            <b>
                                Pictures
                            </b>
                            <br>
                            <table class="table">
                                @foreach($hero->images as $image)
                                    <tr class="table-raw">
                                        <td>
                                            <?php $imagePathPartsArray = explode("/", $image->image_path) ?>
                                            {{end($imagePathPartsArray)}}
                                        </td>
                                        <td>
                                            <a href="/image/delete/{{$image->id}}">
                                                <img class="delete-btn" src="/img/close.png">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <br>
                            <input multiple="multiple" name="heroPictures[]" type="file" size="40" accept="image/x-png,image/gif,image/jpeg">
                        </p>
                        <p>
                            <input class="submit-button" type="submit" value="Update">
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <script src="../js/multilinePlaceholderForTextAreas.js"></script>
    </body>
</html>
