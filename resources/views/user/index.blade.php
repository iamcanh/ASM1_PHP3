@extends('user.layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Lựa chọn của hôm nay:</h2>
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img style="height: 200px;" src="{{ asset('images/' . $posts->image) }}" class="card-img-top"
                                alt="post-thumb">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title"
                                    href="{{ route('details', ['id' => $posts->id]) }}">{{ $posts->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="/user/images/john-doe.jpg">
                                        <span>Charls Xaviar</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-eye"></i>{{ $posts->view }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a href="/">{{ $posts->category_name }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <p>{{ Str::limit($posts->description, 50, ' ...') }}</p>
                            <a href="{{ route('details', ['id' => $posts->id]) }}" class="btn btn-outline-primary">Đọc thêm</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Bài viết thịnh hành</h2>

                    @foreach ($poststrend as $posts)
                        <article class="card mb-4">
                            <div class="card-body d-flex">
                                <img class="card-img-sm" src="{{ asset('images/' . $posts->image) }}" alt="No Image">
                                <div class="ml-3">
                                    <h4><a href="{{ route('details', ['id' => $posts->id]) }}" style="with:100%;"
                                            class="post-title">{{ $posts->title }}</a>
                                    </h4>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-eye"></i> {{ $posts->view }}
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <ul class="card-meta-tag list-inline">
                                                <li class="list-inline-item"><a
                                                        href="/">{{ $posts->category_name }}</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>

                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Bài đăng phổ biến</h2>

                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img style="height:200px;" src="{{ asset('images/' . $postsPopular->image) }}"
                                class="card-img-top" alt="post-thumb">
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title"
                                    href="{{ route('details', ['id' => $postsPopular->id]) }}">{{ $postsPopular->title }}</a>
                            </h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="/user/images/kate-stone.jpg" alt="Kate Stone">
                                        <span>Kate Stone</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-eye"></i>{{ $postsPopular->view }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a
                                                href="/">{{ $postsPopular->category_name }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <p>{{ Str::limit($postsPopular->description, 50, ' ...') }}</p>
                            <a href="{{ route('details', ['id' => $postsPopular->id]) }}"
                                class="btn btn-outline-primary">Đọc thêm</a>
                        </div>
                    </article>
                </div>
                <div class="col-12">
                    <div class="border-bottom border-default"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Bài đăng gần đây</h2>

                    <article class="card mb-4">
                        <div class="post-slider">
                            @foreach ($postsdescid as $posts)
                                <div><img style="height:400px;" src="{{ asset('images/' . $posts->image) }}"
                                        class="card-img-top" alt="post-thumb">
                                    <div class="card-body">
                                        <h3 class="mb-3"><a class="post-title"
                                                href="{{ route('details', ['id' => $posts->id]) }}">{{ $posts->title }}</a>
                                        </h3>
                                        <ul class="card-meta list-inline">
                                            <li class="list-inline-item">
                                                <a href="author-single.html" class="card-meta-author">
                                                    <img src="/user/images/john-doe.jpg" alt="John Doe">
                                                    <span>John Doe</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="ti-eye"></i>{{ $posts->view }}
                                            </li>
                                            <li class="list-inline-item">
                                                <ul class="card-meta-tag list-inline">
                                                    <li class="list-inline-item"><a
                                                            href="/">{{ $posts->category_name }}</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <p>{{ Str::limit($posts->description, 400, ' ...') }}</p>
                                        <a href="{{ route('details', ['id' => $posts->id]) }}"
                                            class="btn btn-outline-primary">Đọc thêm</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>
@endsection
