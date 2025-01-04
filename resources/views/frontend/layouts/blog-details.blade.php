@extends('frontend.app')

@section('title', 'Professional-details')

@push('style')
    <style>
        #subscribe_btn {
            display: inline-block;
            padding: 20px 20px;
            font-size: 1rem;
            color: #fff;
            border-radius: 5.287px;
            background: #0ea5e9;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s;
            border:none;
            cursor:pointer;
        }

        #subscribe_btn:hover {
            background: #007bff;
        }

        p {
            font-size: 25px !important;
        }

        .newsletter a {
            padding: 0px;
            font-size: 1rem;
            color: #1c1b1b;
            border-radius: 5.287px;
            background: white;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            transition: background-color 0.3s;
        }
    </style>
@endpush

@section('content')

    <!-- header area starts -->
    <header>
        <!-- Sidebar starts -->
        <ul class="sidebar" id="sidebar">
            @include('frontend.partials.mobile_navbar')
        </ul>
        <!-- Sidebar ends -->

        <!-- hero section starts -->
        <div class="article-detail-header-container">
            <div class="article-detail-header">
                <div class="header-heading">
                    <!-- Breadcrumbs -->
                    <div class="breadcumb">
                        <p class="article">Articles</p>
                        <img src="{{ asset('frontend/images/icons/breadcumb.svg') }}" alt="Breadcrumb Icon" />
                        <p class="details">Details</p>
                    </div>
                    <!-- Article title -->
                    <h2>Article Title Heading Will Go Here</h2>
                </div>
                <div class="article-meta-section">
                    <!-- Article author and information -->

                    @php
                        $admin = App\Models\User::first();
                    @endphp

                    <div class="article-meta">
                        <img src="{{ $admin->avatar ? asset($admin->avatar) : asset('frontend/images/author4.svg') }}"
                            alt="Author Image" class="author-img" />
                        <div class="author-info">
                            <p class="author-name " style="color: white">{{ $admin->name }} </p>
                            <p class="article-details">
                                {{ $blog->created_at->format('d F Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Social sharing icons -->


                </div>
            </div>
        </div>
        <!-- header img which some parts of it will be top of header -->
        <div class="article-detail-header-img custom-container">
            <img src="{{ asset($blog->detail_image_url) }}" alt="" />
        </div>
        <!-- hero section ends -->
    </header>
    <!-- header area ends -->

    <!--  -->
    <section class="article-details-container custom-container">
        <!-- left side contents -->
        {{-- <div class="contents-container">
            <h3 class="content-title">Contents</h3>

            <p class="content-detail-border"></p>
            <a href="#">
                <p class="content-desc">Introduction</p>
            </a>
            <a href="#">
                <p class="content-desc">About it</p>
            </a>
            <a href="#">
                <p class="content-desc">Why Consultancy</p>
            </a>
            <a href="#">
                <p class="content-desc">End</p>
            </a>
        </div> --}}
        <!-- right side sections -->
        <div class="details-container">
            <!-- introduction -->
            <div class="">
                <h2 class="article-detail-title">Introduction</h2>
                <p class="article-detail-border"></p>
                <p class="description">
                    {{-- {{ $blog ? $blog->introduction : '' }} --}}
                    <span style="font-size: 16px">
                        {!! $blog ? $blog->introduction : '' !!}
                    </span>
                </p>
            </div>
            <!-- introduction -->
            <div class="article-paragraph-wrapper">
                <h2 class="article-detail-title">About it</h2>
                <p class="article-detail-border"></p>
                <p class="description">
                    {!! $blog ? $blog->about_it : '' !!}
                </p>
            </div>
            <!-- introduction -->
            <div class="">
                <h2 class="article-detail-title">Why Consultancy</h2>
                <p class="article-detail-border"></p>
                <p class="description">
                    {!! $blog ? $blog->why : '' !!}
                </p>
            </div>
            <div class="details-img">
                <img c src="{!! asset($blog->image_url) !!} " alt="" />
            </div>
            <!-- introduction -->
            <div class="">
                <h2 class="article-detail-title">End</h2>
                <p class="article-detail-border"></p>
                <p class="description">
                    {!! $blog ? $blog->end : '' !!}
                </p>
            </div>
            <div>
                <div class="details-meta">
                    {{-- <div class="icons-tags-container">
                        <div>
                            <!-- Share Text -->
                            <div class="share-text">
                                <p>Share this post</p>
                            </div>
                            <!-- Social sharing icons -->
                            <div class="social-sharings">
                                <a href="#"><img src="./assets/images/icons/bluefb-icon.svg" alt="Facebook" /></a>
                                <a href="#"><img src="./assets/images/icons/bluex-icon.svg" alt="Twitter" /></a>
                                <a href="#"><img src="./assets/images/icons/blye-yt-icon.svg" alt="YouTube" /></a>
                                <a href="#"><img src="./assets/images/icons/blye-yt-icon.svg" alt="LinkedIn" /></a>
                            </div>
                        </div>
                    </div> --}}

                    <div>
                        <hr class="footer-hr" />
                    </div>

                    <!-- Author information -->
                    <div class="article-meta">
                        <img src="{{ $admin->avatar ? asset($admin->avatar) : asset('frontend/images/author4.svg') }}"
                            alt="Author Image" class="author-img" />
                        <div class="author-info">
                            <p class="author-name">{{ $admin->name }} </p>
                            <p class="article-details">
                                {{ $blog->created_at->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>



            </div>
    </section>
    <!-- subscribe to newsletter section -->
    <section class="newsletter-container custom-container">
        {{-- success message show --}}

        <div class="newsletter ">
            @if (session('success'))
                <div class="alert alert-success text-success" style="color: green">
                    {{ session('success') }}
                </div>
            @endif
            <h2>Subscribe to our newsletter</h2>
            <p style="font-size:16px !important">Stay updated with the latest news, special offers, and exclusive content. Join our newsletter today and never miss an update from us!</p>
            <form action="{{ route('newsletter.subscribe') }}" method="post">
                @csrf
                <div class="form-container">

                    <div>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="subscribe-btn">
                        <button id="subscribe_btn" type="submit">Subscribe</button>
                    </div>

                </div>
            </form>
            <p style="font-size:14px !important">

                                Accetto di ricevere e-mail a scopo informativo e commerciale.<a href="https://www.tax4doctors.it/privacy">Privacy & Cookies</a>, <a href="https://www.tax4doctors.it/condizioni-uso">Condizioni generali d'uso</a>
            </p>
        </div>
    </section>

@endsection


@push('script')
@endpush
