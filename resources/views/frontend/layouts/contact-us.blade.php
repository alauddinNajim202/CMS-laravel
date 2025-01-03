@extends('frontend.app')

@section('title', 'Professional-details')

@push('style')
@endpush

@section('content')
    <header>

        <ul class="sidebar" id="sidebar">
            @include('frontend.partials.mobile_navbar')

        </ul>

    </header>

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
                <img src="{{ asset('frontend/images/contact-img.svg') }} " alt="Contact Us" />
            </div>
        </div>
    </section>

@endsection


@push('script')
@endpush
