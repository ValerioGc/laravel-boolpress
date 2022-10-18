@extends('layouts.app')

@section('page-title', 'Area Amministrativa')

@section('content')
    <div class="container-fluid" id="home-container">
        <div class="row not my-5">
            <div class="col">
                <h1 class="alert-danger text-center">Area Amministrativa</h1>
                <p class="py-3">Utente Amministratore: <strong>{{Auth::user()->name}}</strong></p>
            </div>
        </div>
        <div class="row justify-content-between align-items-start m-0">
            <div class="col-4 py-3 bg-light rounded overflow-hidden notification-container">
                <div>
                    <i class="fa-solid fa-bell"></i>
                    <h3 class="d-inline-block py-2">Notifiche</h3>
                </div>
                <ul class="rounded notification col w-100 bg-primary rounded p-3 list-unstyled shadow overflow-auto">
{{--                    @foreach($notifications as $msg)--}}
{{--                        <li class="my-4">--}}
{{--                            {{$msg}}--}}
{{--                            <hr />--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
                    <li class="my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi culpa dolorem doloribus earum, eius eligendi enim harum incidunt, ipsa minus, molestias mollitia nat!
                        16:30
                        <hr/>
                    </li>
                    <li class="my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        20:00
                        <hr/>
                    </li>
                    <li class="my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        <hr/>
                    </li>
                    <li class="my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        <hr/>
                    </li>
                    <li class="my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </li>
                </ul>
            </div>
            <div class="col-7 shadow bg-light rounded" style="height: 50vh;">
                <span class="py-3 d-block">
                    <i class="fa-regular fa-clock fa-2x"></i>
                    <h1 class="px-2 d-inline-block align-middle">Ultimi Post</h1>
                </span>
                <table class="table table-striped primary table-primary rounded">
                    <thead class="bg-primary">
                        <tr>
                            <th>Titolo</th>
                            <th>Slug</th>
                            <th>Categoria</th>
                            <th>Tags</th>
                            <th>Data Creazione</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lastPosts as $post)
                            <tr>
                                <td>{{$post['title']}}</td>
                                <td>{{$post['slug']}}</td>
                                <td>{{($post->category) ? $post->category->title : '-'}}</td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                        {{$tag->name}},
                                    @endforeach
                                </td>
                                <td>{{date('h:m - d-m-Y', strtotime($post->created_at))}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mx-2 my-5">
            <div class="col m-auto shadow bg-light rounded">
                <span class="py-3 d-block">
                    <i class="fa-regular fa-clock fa-2x"></i>
                    <h1 class="px-2 d-inline-block align-middle">Post Recenti</h1>
                </span>
                <table class="table table-striped primary table-primary rounded">
                    <thead class="bg-primary">
                    <tr>
                        <th>Titolo</th>
                        <th>Slug</th>
                        <th>Categoria</th>
                        <th>Tags</th>
                        <th>Data Creazione</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recentPosts as $post)
                        <tr>
                            <td>{{$post['title']}}</td>
                            <td>{{$post['slug']}}</td>
                            <td>{{($post->category) ? $post->category->title : '-'}}</td>
                            <td>
                                @foreach ($post->tags as $tag)
                                    {{$tag->name}},
                                @endforeach
                            </td>
                            <td>{{date('h:m - d-m-Y', strtotime($post->created_at))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
