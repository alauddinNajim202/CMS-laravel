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


    </style>
@endpush
@section('content')
    <header>

        <ul class="sidebar" id="sidebar">
            @include('frontend.partials.mobile_navbar')

        </ul>

    </header>

    <!-- contact us section starts -->
     <!-- subscribe to newsletter section -->
     <section class="newsletter-container custom-container">
        {{-- success message show --}}

        <div class="newsletter ">
            @if (session('success'))
                <div style="text-align: center; padding: 10px; color: green" class="alert alert-success text-center text-success" style="color: green">
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
                {{-- By clicking subscribe you're confirming that you agree with our Terms and Conditions. --}}
                Accetto di ricevere e-mail a scopo informativo e commerciale.<a href="https://www.tax4doctors.it/privacy">Privacy & Cookies</a>, <a href="https://www.tax4doctors.it/condizioni-uso">Condizioni generali d'uso</a>
            </p>
        </div>
    </section>

@endsection


@push('script')
@endpush
