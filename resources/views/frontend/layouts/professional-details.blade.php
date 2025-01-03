@extends('frontend.app')

@section('title', 'Professional-details')

@push('style')
@endpush

@section('content')

    <section class="professional-details-container custom-container">
        <div class="professional-detail-heading">
            <p class="details-title">Team Member Details</p>
            <!-- client name -->
            <h2 class="team-member-name">
                {{ $expert ? $expert->name : '' }}
            </h2>
        </div>
        <!-- img and details -->
        <div class="profile-wrapper">
            <!-- Profile Image -->
            <div class="profile-image">
                <img src="{{ asset($expert->image_url) }}" alt="Michael Brown" />
            </div>
            <!-- Profile Details -->
            <div class="profile-details">
                <p>Hello, I'm</p>
                <h2>
                    {{ $expert ? $expert->name : '' }}

                </h2>
                <p>Lawyer</p>
                <p class="divider"></p>
                <div class="details-grid">
                    <div class="detail-item">
                        <p>Designation:</p>
                        <p>
                            {{ $expert ? $expert->name : '' }}
                        </p>
                    </div>
                    <div class="detail-item">
                        <p>Experience:</p>
                        <p>
                            {{ $expert ? $expert->experience_year : '' }} Years
                        </p>
                    </div>
                    <div class="detail-item">
                        <p>Email:</p>
                        <p>
                            {{ $expert ? $expert->email : '' }}
                        </p>
                    </div>
                    <div class="detail-item">
                        <p>Phone:</p>
                        <p>
                            {{ $expert ? $expert->phone : '' }}
                        </p>
                    </div>
                </div>
                <p class="divider"></p>
                <div class="social-icons">
                    <a href="#">
                        <img src="{{ asset('frontend/images/icons/x.svg') }} " alt="Facebook" />
                    </a>
                    <a href="#">
                        <img src=" {{ asset('frontend/images/icons/linkedin.svg') }}" alt="Instagram" />
                    </a>
                    <a href="#">
                        <img src="{{ asset('frontend/images/icons/youtube.svg') }}" alt="LinkedIn" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- profile description -->
    <section class="custom-container profile-description-container">
        <p>
            {!! $expert ? $expert->description : '' !!}
        </p>
    </section>
    <!-- professional skills and experiences  -->
    <section class="skills-experiences-container custom-container">
        <!-- skills container -->
        <div class="skills-container">
            <div class="info-heading">
                <h2 class="info-title">Professional Skills</h2>
                <p class="info-description">
                    Specializes in legal research, client representation, contract
                    drafting, and dispute resolution,
                </p>
            </div>
            <!-- Skills Section -->
            <div class="skills-section">
                <!-- Skill 1 -->


                @foreach ($expert->skills as $skill)
                    <div class="skill">
                        <img src="{{ asset('frontend/images/icons/satisfaction-icon.svg') }}" alt="Skill 1"
                            class="skill-icon" />
                        <h4 class="skill-title">
                            {{ $skill->name }}
                        </h4>
                    </div>
                @endforeach




            </div>
        </div>
        <!-- Experiences Section -->
        <div class="experiences-container">
            <!-- Section Heading -->
            <div class="info-heading">
                <h2 class="info-title">Experiences</h2>
                <p class="info-description">
                    Specializes in legal research, client representation, contract
                    drafting, and dispute resolution.
                </p>
            </div>

            <div class="experience-section">
                <!-- Experience 1 -->
                @foreach ($expert->experiences as $experience)
                    <div class="experience">
                        <div class="company-img">
                            <img src="{{ asset($experience->image_url) }}" alt="Company 1" />
                        </div>
                        <div class="experience-details">
                            <h3 class="company-name">
                                {{ $experience->title }}
                            </h3>
                            <p class="date-location">
                                {{ $experience->year_range }}
                                ,<span>,
                                    {{ $experience->company_name }}
                                </span></p>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
    <!-- professionals section starts -->
        @include('frontend.layouts.dedicated_professionals')
    <!-- professional section ends -->

    <!-- contact us section starts -->



@endsection


@push('script')
@endpush
