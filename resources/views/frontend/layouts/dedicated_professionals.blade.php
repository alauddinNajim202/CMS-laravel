<!--<section class="professionals-container custom-container">-->
<!--    <div class="professionals-heading">-->
<!--        <h2 class="section-title">-->
<!--            Dedicated Professionals With Consulting Experties-->
<!--        </h2>-->
<!--    </div>-->

<!--    <div class="professionals-profile">-->
<!--        @foreach ($professional_experts as $item)-->
<!--            <div class="professional-card">-->
<!--                <div class="professional-img">-->
<!--                    <img src="{{ $item->image_url ? asset($item->image_url) : '' }}" alt="Professional 1" />-->
<!--                </div>-->
<!--                <div class="professional-info">-->
<!--                    <h3 class="professional-name">{{ $item ? $item->name : '' }}</h3>-->
<!--                    <p class="professional-title">{{ $item->designation }}</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        @endforeach-->
<!--    </div>-->
<!--    <div class="view-btn-container">-->
<!--        <a class="view-btn" href="{{ route('home.professional') }}">-->
<!--            <span class="primary-btn-content">-->
<!--                View all member-->
<!--                <img src="{{ asset('frontend/images/icons/arrow-icon.svg') }} " alt="arrow Icon" />-->
<!--            </span>-->
<!--        </a>-->
<!--    </div>-->
<!--</section>-->


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
            <img src=" {{ asset('frontend/images/contact-img.svg') }} " alt="Contact Us" />
        </div>
    </div>
</section>
