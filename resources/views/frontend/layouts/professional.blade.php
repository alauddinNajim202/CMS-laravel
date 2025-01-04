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
            <div class="hero-content">
                <h1 class="hero-title">
                    @php
                        $cms = App\Models\CMS::get();
                        // dd($cms);
                    @endphp
                    {{ $cms ? $cms[1]->title : '' }}

                </h1>
            </div>
        </div>
        <!-- hero section ends -->
    </header>
    <!-- header area ends -->

    <!-- header area starts -->

    <!-- main area starts -->

    <!-- professionals section starts -->

    <section class="professionals-container custom-container">
        <div class="professionals-profile">


            @foreach ($experts as $expert)
                <div class="professional-card">
                    <div class="professional-img">
                        <img src="{{ $expert->image_url ? asset($expert->image_url) : '' }}" alt="Professional 1" />
                    </div>
                    <div class="professional-info">
                        <h3 class="professional-name">{{ $expert ? $expert->name : '' }}</h3>
                        <p class="professional-title">{{ $expert->designation }}</p>
                    </div>
                </div>
            @endforeach





        </div>
    </section>


    <!-- professional section ends -->

    <!-- commitment section starts -->
    <section class="commitment-section-container custom-container">
        <!-- commitment img -->

        @php
            $cms = App\Models\CMS::get();
        @endphp
        <div>
            <img src="{{asset($cms[8]->image_url)}}" alt="" />
        </div>

        <div class="commitment-content">
            <div>
                <h2>
                    {{ $cms ? $cms[8]->title : '' }}
                </h2>
                <div class="commitment-heading">
                    <img src="{{asset('frontend/images/icons/tickicon.svg')}}" alt="" />
                    <h4>
                        {{ $cms ? $cms[8]->sub_title : '' }}
                    </h4>
                </div>
                <p>
                    {!! $cms ? $cms[8]->description : '' !!}
                </p>
                <div class="commitment-heading">
                    <img src="{{asset('frontend/images/icons/tickicon.svg')}}" alt="" />
                    <h4>Experienced Professionals</h4>
                </div>

                <p>
                    {!! $cms ? $cms[8]->sub_description : '' !!}
                </p>
            </div>
        </div>
    </section>

@endsection


@push('script')
@endpush
