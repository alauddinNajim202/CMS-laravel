@extends('frontend.app')

@section('title', 'About Us')

@push('style')
    <style>
        .input-container {
            display: flex;
            align-items: flex-start;
            background: #f9f9f9;
            border: 0px solid #ccc;
            border-radius: 30px;
            overflow: hidden;
            position: relative;
        }
    </style>
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
                    {{ $cms ? $cms[5]->title : '' }}
                </h1>
                <p class="hero-desc">
                    {!! $cms ? $cms[5]->description : '' !!}
                </p>
            </div>
        </div>
        <!-- hero section ends -->
    </header>
    <!-- header area ends -->

    <!-- main area starts -->

    <!-- tools section starts -->
    <section class="tools-container">
        <h2 class="section-title custom-container">Tools</h2>
        <div class="title-border"></div>
        <!-- tools 1 -->

        <!-- tools2 -->

        @foreach ($tools as $tool)
            <div class="tools custom-container">
                <div class="tool-img">
                    <img src="{{ asset($tool->image_url) }}" alt="Tool Image" />
                </div>
                <div class="tools-content">
                    <h2>{{ $tool->title }}</h2>
                    <p>{!! $tool->description !!}</p>
                    <a class="download-btn" href="#"
                        onclick="openModal('{{ $tool->id }}', '{{ $tool->title }}','{{ $tool->description }}', '{{ $tool->image_url }}')">
                        <span class="btn-content">
                            Download Now
                            <img src="{{ asset('frontend/images/icons/downloadicon.svg') }}" alt="Download Icon" />
                        </span>
                    </a>
                </div>
            </div>
        @endforeach


    </section>



    <!-- modal  -->
    <!-- Modal -->
    <div id="downloadModal" class="modal p-5" style="display: none;" >
        <div class="modal-content" >
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <div class="modal-body">
                <!-- Dynamic Image -->
                <div class="modal-image">
                    <img  id="modal-tool-image" src="" alt="Tool Image" />
                </div>
                <!-- Dynamic Content -->
                <div class="modal-text">
                    <h2 id="modal-tool-title"></h2>

                    <p id="modal-tool-description"> </p>
                    <p>
                        Stay up to date with the latest articles and business updates. You’ll even get special recommendations weekly.
                    </p>
                    <!-- Subscription Section -->
                    <form id="subscribeForm" class="modal-form">
                        <input type="hidden" id="tool-id" name="tool_id" />
                        <div class="form-group subscribe">
                            <div class="input-container">
                                <input type="email" id="email" name="email" placeholder="Enter your email"
                                    required />
                                <button type="submit">Continues</button>
                            </div>
                        </div>
                        <div style="margin-top: -50px; margin-bottom: 20px" class=" ">
                            <input type="checkbox" id="terms" name="terms" required />
                            <label for="terms" style="font-size:14px !important">

                                Accetto di ricevere e-mail a scopo informativo e commerciale.<a style="color: red; text-decoration: underline !important" href="https://www.tax4doctors.it/privacy">Privacy & Cookies</a>, <a style="color: red; text-decoration: underline !important" href="https://www.tax4doctors.it/condizioni-uso">Condizioni generali d'uso</a>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection



@push('script')
    <script>
        // Open modal and populate tool details
        function openModal(toolId, toolTitle, toolDescription, toolImage) {
            $('#tool-id').val(toolId);
            $('#modal-tool-title').text(toolTitle);
            // $('#modal-tool-description').text(toolDescription);
            $('#modal-tool-image').attr('src', '{{ asset('') }}' + toolImage);
            $('#downloadModal').fadeIn();
        }

        // Close modal
        function closeModal() {
            $('#downloadModal').fadeOut();

            // Clear modal data
            $('#tool-id').val('');
            $('#modal-tool-title').text('');
            $('#modal-tool-image').attr('src', '');
            $('#email').val('');
            $('#terms').prop('checked', false);
        }

        // Handle form submission
        $('#subscribeForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const toolId = $('#tool-id').val();
            const email = $('#email').val();
            const termsAccepted = $('#terms').is(':checked');

            if (!termsAccepted) {
                toastr.error("You must accept the terms and conditions.");
                return;
            }

            // AJAX request
            $.ajax({
                url: "{{ route('tools.download') }}",
                type: "POST",
                data: {
                    tool_id: toolId,
                    email: email,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        // Trigger file download
                        window.location.href = response.file_url;
                        closeModal();

                        // reload the page
                        // location.reload();

                    } else {
                        toastr.error(response.message || "An error occurred. Please try again.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    toastr.error("Something went wrong. Please try again.");
                }
            });
        });
    </script>
@endpush
