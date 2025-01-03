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
        <div class="hero-section">
            <div class="hero-overlay"></div>
            <!-- Overlay div -->
            @php
                $cms = App\Models\CMS::get();
            @endphp
            <div class="hero-content">
                <h1 class="hero-title">
                    {{ $cms ? $cms[2]->title : '' }}
                </h1>
                <p class="hero-desc">
                    {!! $cms ? $cms[2]->description : '' !!}
                </p>
            </div>
        </div>
        <!-- hero section ends -->
    </header>
    <!-- header area ends -->

    <!-- main area starts -->
    <main>
        <!-- articles section -->
        <section class="articles-container">
            <h2 class="section-title">Related posts</h2>
            <p class="section-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <div class="articles custom-container">
                <!-- Article 1 -->

                @foreach ($blogs as $blog)
                    <a href="{{ route('home.articles_details', $blog->id) }}" class="article">


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
                            <img src="{{ $admin->avatar ? asset($admin->avatar) : asset('frontend/images/author4.svg') }}"
                                alt="Author Image" class="author-img" />
                            <div class="author-info">
                                <p class="author-name">{{ $admin->name }} </p>
                                <p class="article-details">
                                    {{ $blog->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach



            </div>
            <div class="view-all">
                <a class="view-all-post-btn" href="{{ route('home.article_lists') }}">View all Post</a>
            </div>
        </section>


        <!-- contact us section starts -->
        <section id="contact" class="contact-us-container custom-container">
            <div>
                <h2 class="contact-title">Contact us</h2>
            </div>
            {{-- success message show --}}
            @if (session('success'))
                <div class="alert alert-success text-success" style="color: green">
                    {{ session('success') }}
                </div>
            @endif
            <div class="contact-us">
                <!-- Contact Form -->
                <div class="contact-form">
                    <form action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your name" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email" required />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="number" id="phone" placeholder="Enter your phone number" />
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="4" placeholder="Your message" required></textarea>
                        </div>
                        <button class="contact-btn" type="submit">Send</button>
                    </form>
                </div>
                <!-- Contact Image -->
                <div class="contact-image">
                    <img src="{{asset('frontend/images/contact-img.svg')}} " alt="Contact Us" />
                </div>
            </div>
        </section>
    </main>

@endsection


@push('script')
@endpush
