<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

            .full-height {
                height: 100vh;
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

            .h1 {
                font-size: 42px;
            }

            .hero-list-wrapper {
                border: 1px solid #636b6f;
                border-radius: 5px;
                width: 300px;
            }

            .hero-list-table {
                width: 100%;
            }

            .hero-list-raw {
                height: 80px;
            }

            .hero-list-raw:not(:last-of-type) {
                border-bottom: 1px solid #636b6f;
            }

            .hero-avatar-cell {
                width: 30%;
            }

            .hero-nickname-cell {
                width: 70%;
            }

            .hero-avatar {
                border-radius: 35px;
                width: 70px;
                height: 70px;
                object-fit: cover;
            }
            .pagination-wrapper {
                width: 300px;
            }
            .pagination {
                width: 300px !important;
            }
            .page-item {
                width: 150px !important;
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
                @if(count($heroes) != 0)
                    <div class="h1 m-b-md">
                        Hero list
                    </div>
                    <div class="hero-list-wrapper">
                        <table class="hero-list-table">
                            @foreach($heroes as $hero)
                                <tr class="hero-list-raw">
                                    <td class="hero-avatar-cell">
                                        <img class="hero-avatar" src="{{count($hero->images) != 0 ? $hero->images[0]->image_path : '/img/default_hero_avatar.jpg'}}">
                                    </td>
                                    <td class="hero-nickname-cell">
                                        <a href="/hero/{{$hero->id}}">
                                            {{$hero->nickname}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="mt-3 pagination-wrapper">
                        {{$heroes->links()}}
                    </div>
                @else
                    <div class="h1 m-b-md">
                        There is no heroes in our world yet ((
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
