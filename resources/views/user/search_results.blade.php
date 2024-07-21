@extends('user.layouts.master')

@section('title')
    Kết quả tìm kiếm
@endsection

@section('breadcump')
    <div class="banner text-center">
        @include('user.components.breadcump', [
            'name' => 'Kết quả tìm kiếm',
            'breadcump' => '<li class="list-inline-item"><a href="/">Home</a></li>',
        ])
    </div>
@endsection

@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if ($posts->count() > 0)
                    <h2 class="mb-5">Kết quả tìm kiếm cho: "{{ request('search') }}"</h2>
                    <ul class="list-unstyled">
                        @foreach ($posts as $post)
                            <li class="media my-4">
                                <img src="{{ asset('images/' . $post->image) }}" class="mr-3" alt="..."
                                    style="width: 100px; height: auto;">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">
                                        <a href="{{ route('details', $post->id) }}">{{ $post->title }}</a>
                                    </h5>
                                    <p>{{ Str::limit($post->description, 300, '...') }}</p>
                                    <a href="{{ route('details', $post->id) }}">Đọc thêm</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{ $posts->links() }}
                @else
                    <h2 class="mb-5">Không tìm thấy kết quả phù hợp cho: "{{ request('search') }}"</h2>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
