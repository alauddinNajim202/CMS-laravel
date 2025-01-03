@extends('frontend.app')

@section('title', 'Professional-details')

@push('style')
    <style>
        .prenota-ora-section {
            max-width: 1000px;
            margin: 0 auto;
            /* Centers the content horizontally */
            text-align: center;
            padding: 20px;
            /* background-color: #f9f9f9;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
        }

        .section-title {
            font-size: 2em;
            color: #333;
            margin-bottom: 10px;
        }

        .section-description {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }


        .commitment-list li {
            margin-bottom: 5px;
            /* Adds spacing between list items */
            margin-left: 66px;
        }
        .important-note {
            font-size: 1em;
            color: #0f0f0f;
            margin-top: 20px;
            font-style: italic;
            line-height: 1.6;
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
            <div class="hero-content">
                <h1 class="hero-title">
                    Prenota ora
                </h1>
                {{-- <p class="hero-desc">
                    Welcome to ONE-STARTUP.IT! We are your trusted partners in the world
                    of business consulting, offering expert advice and tailored
                    solutions to optimize your company's potential.
                </p> --}}
            </div>
        </div>
        <!-- hero section ends -->
    </header>
    <!-- header area ends -->

    <!-- main area starts -->

    <!-- 3 pricing cards -->
    <section class="three-pricing-card-container">
        <div class="prenota-ora-section">
            <h2 class="section-title">Prenota Ora</h2>
            <p class="section-description">
                Ciascuna start-up ha esigenze specifiche e può trovarsi in stadi di sviluppo diversi. Per questo i nostri
                servizi sono completamente personalizzabili: puoi prenotare una videochiamata gratuita di 15 min per
                orientarti su quale servizio acquistare,
                o richiedere un preventivo specifico per le tue esigenze.
            </p>


        </div>
        <p style="margin: auto; max-width: 1000px; " class="service-highlights">
            <strong>I nostri Servizi:</strong>

        </p>

        <ul class="commitment-list" style="margin: auto; max-width: 1000px; padding: 20px; list-style-type: disc;">
            <li>Disponibili in tre livelli starter (S), advanced (2S) e superior (3S).</li>
            <li>Flessibili: puoi iniziare acquistando il livello S e passare successivamente al livello 3S, oppure
                partire da un 3S ed arrivare ad un 9S.</li>
            <li>Modulari: seguono un approccio lean. Al termine di ciascun ciclo otterrai un elaborato completo, al
                quale potrai apportare modifiche e miglioramenti nei cicli successivi.</li>
        </ul>
        <p style="margin: auto; max-width: 1000px; padding: 20px;" class="important-note">
            Per poter affrontare in maniera adeguata ciascun tema già dal primo ciclo è importante individuare da subito
            il livello più adatto alle tue esigenze.
        </p>

        <div class="three-pricing-cards">
            <!-- Second Card -->
            <div class="pricing-card">
                <h2 class="pricing-card-title">Richiedi un preventivo </h2>
                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p> Per tutti i servizi di area aziendale, legale e tributaria</p>
                </div>
                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Spiegaci le tue esigenze, ti proporremo una soluzione</p>
                </div>

                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Richiedi assistenza per l'acquisto dei nostri servizi </p>
                </div>

                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Richiedi un preventivo personalizzato per i nostri servizi</p>
                </div>



                <p class="pricing-card-desc">
                    We will collect the information to provide you with a personalized qoute
                </p>
                <div class="pricing-card-duration">
                    <img src="{{ asset('frontend/images/icons/clockicon.svg') }} " alt="clock icon" />
                    <p>Durata: 15min </p>
                </div>
                <div class="pricing-card-duration">
                    <img src="{{ asset('frontend/images/icons/clockicon.svg') }} " alt="clock icon" />
                    <p>Consegna: 1 gg </p>
                </div>
                <h2 class="price-title">Costo: 0€</h2>
                <div class="pricing-card-buttons-container">
                    <a class="pricing-card-button" href="https://calendly.com/etozzi/appuntamento" target="_blank">Pulsante
                        prenota</a>
                </div>
                <p class="pricing-support-desc">
                    If you need support on which package to purchase or if you need a
                    more details and specific quote for your situation, this is the
                    right solution for you.
                </p>
            </div>
            <!-- Second Card -->
            <div class="pricing-card">
                <h2 class="pricing-card-title">Business Plan</h2>
                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Analisi del modello di business </p>
                </div>
                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Analisi del contesto competitivo </p>
                </div>

                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Action plan </p>
                </div>

                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Piano economico-finanziario </p>
                </div>
                <p class="pricing-card-desc">
                    We will collect the information to provide you with a personalized
                    quote.
                </p>
                <div class="pricing-card-duration">
                    <img src="{{ asset('frontend/images/icons/clockicon.svg') }} " alt="clock icon" />
                    <p>Durata: 6h(per S) </p>
                </div>
                <div class="pricing-card-duration">
                    <img src="{{ asset('frontend/images/icons/clockicon.svg') }} " alt="clock icon" />
                    <p>Consegna: 7 gg</p>
                </div>
                <h2 class="price-title">$89(Per S)</h2>
                <p style="color: rgba(0, 0, 0, 0.5);">Costo: € 1.068 (per S) (include 4% CNPADC e 22% IVA)</p>
                <div class="pricing-card-buttons-container">

                    <a class="pricing-card-button" href="https://calendly.com/etozzi/pianificazione-s"
                        target="_blank">Pulsante acquista Starter (S) € 854 – risparmi il 20% </a>
                    <a class="pricing-card-button" href="https://calendly.com/etozzi/pianificazione-2s"
                        target="_blank">Pulsante acquista Advanced (2S) € 1.495 – risparmi il 30% </a>
                    <a class="pricing-card-button" href="https://calendly.com/etozzi/pianificazione-3s"
                        target="_blank">Pulsante acquista Superior (3S) € 1.922 – risparmi il 40% </a>
                </div>
            </div>
            <!-- Second Card -->
            <div class="pricing-card">
                <h2 class="pricing-card-title">Consulenza start-up innovative</h2>
                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Requisiti</p>
                </div>
                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Benefici</p>
                </div>

                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Incentivi fiscali per la start-up</p>
                </div>

                <div class="pricing-card-lists">
                    <img src="{{ asset('frontend/images/icons/bgtickicon.svg') }}" alt="tick icon" />
                    <p>Incentivi fiscali per gli investitori</p>
                </div>


                <p class="pricing-card-desc">
                    We will collect the information to provide you with a personalized
                    quote.
                </p>
                <div class="pricing-card-duration">
                    <img src="{{ asset('frontend/images/icons/clockicon.svg') }} " alt="clock icon" />
                    <p>Durata: 15min </p>
                </div>
                <div class="pricing-card-duration">
                    <img src="{{ asset('frontend/images/icons/clockicon.svg') }} " alt="clock icon" />
                    <p>Consegna: 1 gg</p>
                </div>
                <h2 class="price-title">$89(Per S)</h2>
                <p style="color: rgba(0, 0, 0, 0.5);">

                    include 4% CNPADC e 22% IVA
                </p>
                <div class="pricing-card-buttons-container">
                    <a class="pricing-card-button" href="https://calendly.com/etozzi/consulenza-30-min"
                        target="_blank">Pulsante acquista Starter (S) € 89 </a>
                    <a class="pricing-card-button" href="https://calendly.com/etozzi/consulenza-60-min"
                        target="_blank">Pulsante acquista Advanced (2S) € 142 – risparmi il 20% </a>
                    <a class="pricing-card-button" href="https://calendly.com/etozzi/consulenza-90-min"
                        target="_blank">Pulsante acquista Superior (3S) € 187 – risparmi il 30% </a>
                </div>
            </div>
        </div>
    </section>

    <!-- services cards container -->
    <section class="services-cards-container">
        <div class="services-heading">
            <h2 class="section-title">Ask for a quote</h2>
            <p class="section-desc">
                We provide a complete range of services to start-up in business, legal and tax matters. To obtain more
                information about our services, please visit the "what we do" page. Please book an appointment to explain
                your needs and obtain a quotation.
            </p>
        </div>
        <!-- cards -->
        <div class="services-cards custom-container">
            <div class="service-card">
                <div class="services-icon">
                    <img src="{{ asset('frontend/images/icons/business-icon.svg') }} " alt="" />
                </div>
                <h3 class="service-card-title">Business</h3>
                <p class="service-card-desc">
                    Back up all your critical documents with up to 50GB of secure cloud storage. Store large files with
                    ease, up to 5GB per file, ensuring that both small and large documents are covered.
                </p>
            </div>
            <div class="service-card">
                <div class="services-icon">
                    <img src="{{ asset('frontend/images/icons/legal-icon.svg') }} " alt="" />
                </div>
                <h3 class="service-card-title">Legal</h3>
                <p class="service-card-desc">
                    Back up all your critical documents with up to 50GB of secure cloud storage. Store large files with
                    ease, up to 5GB per file, ensuring that both small and large documents are covered.
                </p>
            </div>
            <div class="service-card">
                <div class="services-icon">
                    <img src="{{ asset('frontend/images/icons/tax-icon.svg') }} " alt="" />
                </div>
                <h3 class="service-card-title">Tax</h3>
                <p class="service-card-desc">
                    Share your files immediately after uploading. Our platform makes it simple to share files via email, a
                    secure link, or integration with your website and social media platforms.
                </p>
            </div>


        </div>
    </section>


@endsection


@push('script')
@endpush
