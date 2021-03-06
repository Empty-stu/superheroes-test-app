<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$hero->nickname}}</title>

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
                margin-left: auto;
                margin-right: auto;
            }

            .avatar {
                border-radius: 150px;
                width: 300px;
                height: 300px;
                object-fit: cover;
            }

            .hero-list-wrapper > div:not(:last-of-type)  {
                border-bottom: 1px solid #636b6f;
            }

            .hero-list-wrapper > div > p{
                margin-bottom: 0;
            }

            .hero-list-wrapper > div > ul{
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-list-wrapper > div > ul > li {
                text-align: left;
            }

            .hero-img-tumblr {
                width: 270px;
                height: 150px;
                margin-left: auto;
                margin-right: auto;
                object-fit: cover;
                border-radius: 15px;
            }

            .buttons-wrapper {
                width: 300px;
                display: flex;
                flex-direction: row;
                margin-left: auto;
                margin-right: auto;
            }

            .buttons-wrapper > a {
                text-decoration: none;
            }

            .control-btn {
                width: 150px;
                color: white;
                border: 1px solid #636b6f;
                font-weight: bold;
            }

            .delete-btn {
                background-color: #c82333;
                border-radius: 5px 0 0 5px;
            }

            .edit-btn {
                background-color: #0069d9;
                border-radius: 0 5px 5px 0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            @include('header')
            <div class="mt-3 mb-3 content">
                <div class="h1 m-b-md">
                    {{$hero->nickname}}
                </div>
                <div class="m-b-md">
                    <img class="avatar" src="{{count($hero->images) != 0 ? '../'.$hero->images[0]->image_path : '../img/default_hero_avatar.jpg'}}">
                </div>
                <div class="hero-list-wrapper">
                    <div>
                        Nickname: {{$hero->nickname}}
                    </div>
                    <div>
                        Real name: {{$hero->real_name}}
                    </div>
                    <div>
                        Description
                        <p>
                            {{$hero->origin_description}}
                        </p>
                    </div>
                    <div>
                        Superpowers
                        <ul>
                            @foreach($hero->superpowers as $superpower)
                                <li>
                                    {{$superpower->superpower_name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        Catch phrase: {{$hero->catch_phrase}}
                    </div>
                    <div>
                        Images
                        @foreach($hero->images as $image)
                            <img class="hero-img-tumblr mb-2" src="../{{$image->image_path}}">
                        @endforeach
                    </div>
                </div>
                <div class="mt-1 buttons-wrapper">
                    <a href="/delete/{{$hero->id}}">
                        <button class="control-btn delete-btn">
                            Delete
                        </button>
                    </a>
                    <a href="/update/{{$hero->id}}">
                        <button class="control-btn edit-btn">
                            Edit
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
