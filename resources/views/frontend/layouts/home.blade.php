@extends('frontend.app')

@section('title', 'Preceptor Guru')

@push('style')

<style>
    .testimonial-text p {
        font-size: 22px;
    }
</style>

@endpush

@section('content')


    <!-- Header Area Starts -->
    <header>
        <!-- Sidebar starts -->
        <ul class="sidebar" id="sidebar">
            @include('frontend.partials.mobile_navbar')
        </ul>
        <!-- Sidebar ends -->

        <!-- Hero Section Starts -->
        <div class="hero">
            <div class="custom-container hero-container">
                <!-- Hero Content -->

                @php
                    $cms = App\Models\CMS::get();
                    // dd($cms);
                @endphp


                <div class="hero-home-heading">
                    <h2>
                        {{ $cms ? $cms[0]->title : '' }}
                    </h2>
                    <p>
                        {!! $cms ? $cms[0]->description : '' !!}
                    </p>
                    <div class="hero-btn">
                        <a class="primary-btn" href="{{route('services')}}">
                            <span class="primary-btn-content">
                                Prenota ora
                                <img src="  {{ asset('frontend/images/icons/arrow-icon.svg') }} " alt="arrow Icon" />
                            </span>
                        </a>
                        <a class="secondary-btn" href="{{route('newsletter')}}">Iscriviti alla newsletter</a>
                    </div>
                </div>
                <!-- Hero Image -->
                <div class="hero-home-img">
                    <img src=" {{ $cms ? asset($cms[0]->image_url) : '' }} " alt="Hero" />
                </div>
            </div>
        </div>
    </header>

    <!-- who we are starts -->
    <section class="who-we-are-home-container custom-container">
        <div>
          <h2 class="section-title">
            {{ $cms ? $cms[15]->title : 'Who we are' }}
          </h2>
          <p class="section-desc">
            {!! $cms ? $cms[15]->description : 'We are a trusted consultancy firm dedicated to empowering
            businesses and individuals with expert advice, innovative solutions,
            and personalized strategies. Our mission is to help you achieve your
            goals efficiently and effectively.' !!}

          </p>
          <div class="learn-more-btn-container">
            <a class="primary-btn" href="https://etozzi.com/chi-siamo/" target="_blank" >
              <span class="primary-btn-content">
                Learn More
                <img
                  src="{{ asset('frontend/images/icons/arrow-icon.svg') }}"
                  alt="arrow Icon"
                />
              </span>
            </a>
          </div>
        </div>
      </section>

    <!-- professional section ends -->

    <!-- testimonial section starts -->
    <section class="testimonial-container">
        <div class="custom-container">
            <div class="testimonial-heading">
                <h2 class="section-title">
                    {{ $cms ? $cms[2]->title : '' }}
                </h2>
                <p>
                    {!! $cms ? $cms[2]->description : '' !!}
                </p>
            </div>

            @php
                $client_reviews = App\Models\ClientReview::limit(1)->get();
                // dd($client_reviews);
            @endphp


            <div class="testimonial">
                <!-- testimonial img -->

                <!-- testimonial content -->
                @foreach ($client_reviews as $review)
                    <div class="testimonial-img">
                        <img src="{{ $review->image_url }}" alt="Client Image" />
                    </div>
                    <div class="testimonial-content testimonial-text">

                        <!--<p style="!important;"  class="testimonial-text">-->
                            {!! $review ? $review->description : '' !!}
                        <!--</p>-->


                        <h3 style="margin-top: 30px" class="customer-name mt-2">
                            {{ $review ? $review->title : '' }}
                        </h3>
                        <p class="customer-position">
                            {{ $review ? $review->sub_title : '' }}
                        </p>


                        <!-- arrow icons -->
                        <div class="testimonial-arrows">
                            <img src="{{ asset('frontend/images/icons/left-arrow.svg') }} " alt="Left Arrow" />
                            <img src="{{ asset('frontend/images/icons/right-arrow.svg') }} " alt="Right Arrow" />
                        </div>
                        <div class="trustpilot-reviews">
                            <a href="https://www.trustpilot.com/review/emanueletozzi.softvencefsd.xyz" target="_blank"><p>trustpilot reviews</p></a>
                          </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- contact us section starts -->
    <section class="contact-us-container custom-container">
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
    <script src="{{ asset('backend/vendor/sweetalert/sweetalert2@11.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endpush
