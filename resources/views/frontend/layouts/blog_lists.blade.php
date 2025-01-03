@extends('frontend.app')

@section('title', 'Professional-details')

@push('style')
@endpush

@section('content')

    <header>
        <!-- Sidebar starts -->
        <ul class="sidebar" id="sidebar">
           @include('frontend.partials.mobile_navbar')
        </ul>
        <!-- Sidebar ends -->
        <!-- hero section starts -->

        <!-- hero section ends -->
    </header>
    <!-- header area ends -->

    <!-- main area starts -->
    <main>
        <!-- articles section -->
        <section class="articles-container">
            <h2 class="section-title" style="padding: 30px">Blogs and Articles</h2>

            <div class="articles custom-container">
                <!-- Article 1 -->

                @foreach ($blogs as $blog)
                    <a href="{{route('home.articles_details',$blog->id )}}" class="article">


                        <img src="{{ $blog->blog_image }}" alt="Article 1 Image" class="article-img" />
                        <h3 class="article-title">
                            {{ $blog->title }}
                        </h3>
                        <p class="article-desc">
                            {!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 100, '...') !!}
                        </p>

                        @php
                            $admin = App\Models\User::first();
                        @endphp


                        <div class="article-meta">
                            <img src="{{ $admin->avatar ? asset($admin->avatar) : asset('frontend/images/author4.svg')  }}" alt="Author Image" class="author-img" />
                            <div class="author-info">
                                <p class="author-name">{{ $admin->name}} </p>
                                <p class="article-details">
                                    {{ $blog->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach



            </div>

        </section>



    </main>

@endsection


@push('script')
@endpush
