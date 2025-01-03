@php

    $system = \App\Models\SystemSetting::first();

@endphp


<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <a href="{{ route('home') }}">
                    @if (!empty($system->logo))
                        <img class="mb-3" width="200" height="24px" src="{{ asset($system->logo ?? '') }}"
                            alt="logo" />
                    @else
                        <img class="mb-3" width="200" height="24px"
                            src="{{ asset('backend/img/logo/logo_F.png') }}" alt="logo" />
                    @endif
                </a>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : ' ' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>


        <li
            class="menu-item {{ Request::routeIs('cms.landing-page.*') || Request::routeIs('our-values.*') || Request::routeIs('process.*') || Request::routeIs('clinical.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Layouts">Home Page</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.banner') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.landing-page.banner') }}">Banner Section</a>

                </li>
            </ul>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.who-we-are') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.landing-page.who-we-are') }}">Who We Are</a></li>

            </ul>


            {{-- <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.experties') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.landing-page.experties') }}">Our Experties Header</a>
                </li>

            </ul> --}}
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.client-review-header') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('cms.landing-page.client-review-header') }}">Clients Review
                        Header</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.contact-us-header') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.landing-page.contact-us-header') }}">Contact Us
                        Header</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('client-reviews.*') ? 'active' : '' }}"><a class="menu-link"
                        href="{{ route('client-reviews.index') }}">Client Reviews</a></li>

            </ul>
            {{-- <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('process.*') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('process.index') }}">Process</a></li>

            </ul> --}}
            {{-- <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.ideal-preceptor') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.landing-page.ideal-preceptor') }}">Ideal Preceptor</a></li>

            </ul> --}}
            {{-- <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.connect-member') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.landing-page.connect-member') }}">Connect Member</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.map') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.landing-page.map') }}">Available Preceptor Map</a></li>

            </ul> --}}
            {{-- <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.landing-page.expert-preceptor') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.landing-page.expert-preceptor') }}">Expert Preceptor</a></li>

            </ul> --}}
            {{-- <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('clinical.*') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('clinical.index') }}">Success Guide</a></li>

            </ul> --}}
        </li>

        <li
            class="menu-item {{ Request::routeIs('cms.about-us.*') || Request::routeIs('cms.intake-form.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Layouts">Cosa facciamo</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.about-us.banner') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.about-us.banner') }}">Banner Section</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.about-us.who-we-are') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.about-us.who-we-are') }}">What We Do</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.about-us.digital-journey') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.about-us.digital-journey') }}">Business Area</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.about-us.business-growth') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.about-us.business-growth') }}">Legal Area</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.about-us.why-choose-us') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.about-us.why-choose-us') }}">Text Area</a></li>

            </ul>
        </li>


        <li class="menu-item {{ Request::routeIs('tools.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-male-female"></i>
                <div data-i18n="Layouts">Strumenti Page</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('tools.header') ? 'active' : '' }}"><a class="menu-link"
                        href="{{ route('tools.header') }}">Strumenti Header</a></li>

            </ul>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('tools.index') ? 'active' : '' }}"><a class="menu-link"
                        href="{{ route('tools.index') }}">Strumenti</a></li>

            </ul>
        </li>

        {{-- <li class="menu-item {{ Request::routeIs('cms.student-form') || Request::routeIs('cms.intake-form') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-male-female"></i>
                <div data-i18n="Layouts">Student From Page</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.student-form') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.student-form') }}">Contact Number</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.intake-form') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.intake-form') }}">Intake Form</a></li>

            </ul>
        </li> --}}



        {{-- <li class="menu-item {{ Request::routeIs('cms.card-one') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-shield-plus"></i>
                <div data-i18n="Layouts">Became Prepceptor</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.card-one') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.card-one') }}">What Will You Get</a></li>

            </ul>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.ideal-preceptor.preceptor') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.ideal-preceptor.preceptor') }}">Ideal Preceptor</a></li>

            </ul>
        </li> --}}

        {{-- <li class="menu-item {{ Request::routeIs('cms.contact') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Layouts">Contact Us</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('cms.contact') ? 'active' : '' }}"><a
                        class="menu-link" href="{{ route('cms.contact') }}">Contact Information</a></li>

            </ul>
        </li> --}}


        <!-- Layouts -->

        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Experties</span>
        </li> --}}


        {{-- <li
            class="menu-item {{ Request::routeIs('experts.*') || Request::routeIs('skills.*') || Request::routeIs('experiences.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-male-female"></i>
                <div data-i18n="Layouts">Experties Page</div>
            </a>



            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::routeIs('experts.index') || Request::routeIs('experts.edit') || Request::routeIs('experts.create') || Request::routeIs('experts.update') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('experts.index') }}">Experties</a></li>

            </ul>


            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::routeIs('skills.index') || Request::routeIs('skills.edit') || Request::routeIs('skills.create') || Request::routeIs('skills.update') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('skills.index') }}">Skills</a></li>

            </ul>

            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::routeIs('experiences.index') || Request::routeIs('experiences.edit') || Request::routeIs('experiences.create') || Request::routeIs('experiences.update') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('experiences.index') }}">Experiences</a></li>

            </ul>
        </li> --}}

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Articoli</span>
        </li>


        <li class="menu-item {{ Request::routeIs('blogs.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-male-female"></i>
                <div data-i18n="Layouts">Articoli Page</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('blogs.header') ? 'active' : '' }}"><a class="menu-link"
                        href="{{ route('blogs.header') }}">Articoli Header</a></li>

            </ul>

            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::routeIs('blogs.index') || Request::routeIs('blogs.edit') || Request::routeIs('blogs.create') || Request::routeIs('blogs.update') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('blogs.index') }}">Articoli</a></li>

            </ul>
        </li>

        <!-- Layouts -->

        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">FAQ</span>
        </li>

        <li class="menu-item {{ Request::routeIs('faq.index') ||Request::routeIs('faq.create') ||Request::routeIs('faq.edit') ? 'active open' : ' ' }}">
            <a href="{{ route('faq.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bi-patch-question"></i>
                <div data-i18n="Layouts">FAQ's</div>
            </a>
        </li> --}}




        <!-- User -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Contact Us</span></li>

        <li class="menu-item {{ Request::routeIs('contact.index') ? 'active' : ' ' }}">
            <a href="{{ route('contact.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-message-dots"></i>
                <div data-i18n="Layouts">Messages</div>
            </a>
        </li>
        <li class="menu-item {{ Request::routeIs('newsletter.index') ? 'active' : ' ' }}">
            <a href="{{ route('newsletter.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-news"></i>
                <div data-i18n="Layouts">Newsletters</div>
            </a>
        </li>


        <!-- Layouts -->

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>
        <!-- Apps -->

        <!-- Pages -->
        <li
            class="menu-item {{ Request::routeIs('system.index') || Request::routeIs('profile.setting') || Request::routeIs('mail.setting') || Request::routeIs('dynamic_page.index') || Request::routeIs('dynamic_page.create') || Request::routeIs('dynamic_page.edit') || Request::routeIs('stripe.index') || Request::routeIs('custom-script.index') || Request::routeIs('custom-script.create') || Request::routeIs('custom-script.edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Account Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('profile.setting') ? 'active' : '' }}">
                    <a href="{{ route('profile.setting') }}" class="menu-link">
                        <div data-i18n="Account">Profile Setting</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('system.index') ? 'active' : ' ' }}">
                    <a href="{{ route('system.index') }}" class="menu-link">
                        <div data-i18n="Notifications">System Settings</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('mail.setting') ? 'active' : ' ' }}">
                    <a href="{{ route('mail.setting') }}" class="menu-link">
                        <div data-i18n="Connections">Mail Setting</div>
                    </a>
                </li>
                {{-- <li class="menu-item {{ Request::routeIs('stripe.index') ? 'active' : ' ' }}">
                    <a href="{{ route('stripe.index') }}" class="menu-link">
                        <div data-i18n="Connections">Stripe Setting</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::routeIs('dynamic_page.index') || Request::routeIs('dynamic_page.create') || Request::routeIs('dynamic_page.edit') ? 'active' : ' ' }}">
                    <a href="{{ route('dynamic_page.index') }}" class="menu-link">
                        <div data-i18n="Connections">Dynamic Page Setting</div>
                    </a>
                </li> --}}
                {{-- <li class="menu-item {{ Request::routeIs('custom-script.index') || Request::routeIs('custom-script.create') || Request::routeIs('custom-script.edit') ? 'active' : ' ' }}">
                    <a href="{{route('custom-script.index')}}" class="menu-link">
                        <div data-i18n="Connections">Custom Script</div>
                    </a>
                </li> --}}
            </ul>
        </li>
        <!-- Components -->
    </ul>
</aside>
