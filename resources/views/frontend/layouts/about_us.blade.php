@extends('frontend.app')

@section('title', 'About Us')

@push('style')
    <style>
        .commitment-list {
            list-style-type: disc;
            padding-left: 20px;
            margin: 10px 0;
        }

        .commitment-list li {
            margin-bottom: 5px;
            /* Adds spacing between list items */
            margin-left: 66px;
        }

        .scrollable-content {
            max-height: 600px;
            /* Adjust height as needed */
            overflow-y: scroll;
            /* Keeps the scroll functionality */
            scrollbar-width: none;
            /* Hides scrollbar in Firefox */
        }

        .scrollable-content::-webkit-scrollbar {
            display: none;
            /* Hides scrollbar in WebKit-based browsers */
        }
    </style>
@endpush

@section('content')

    <header>
        <!-- Sidebar starts -->
        <ul class="sidebar" id="sidebar">
            @include('frontend.partials.mobile_navbar')
        </ul>


        @php
            $cms = App\Models\CMS::get();

        @endphp
        <div style="background-image: url('{{ asset($cms ? $cms[6]->image_url : '') }}') !important ; " class="hero-section">

            <div class="hero-overlay"></div>

            <div class="hero-content">

                <h1 class="hero-title">
                    {{ $cms ? $cms[6]->title : '' }}
                </h1>

                <p class="hero-desc">
                    {!! $cms
                        ? $cms[6]->description
                        : 'We provide cybersecurity, communications, and technology managed services that <br> grow with your business- no matter what the future holds.' !!}
                </p>

            </div>
        </div>


    </header>



    <!-- main area starts -->

    <!-- who we are section styles -->
    <section class="who-we-are-container">
        <h2 class="section-title">Cosa facciamo</h2>
        <div class="one-startup-desc">
            <p>
                {{ $cms ? $cms[7]->title : '' }}
            </p>
            <p>
                {!! $cms ? $cms[7]->description : '' !!}
            </p>

        </div>
    </section>

    <!-- commitment section starts -->

    <!-- commitment section starts -->
    <section class="commitment-section-container custom-container">
        <!-- commitment img -->

        @php
            $cms = App\Models\CMS::get();
        @endphp
        <div>
            <img src="{{ asset($cms[8]->image_url) }}" alt="" />
        </div>

        <div class="commitment-content  scrollable-content">
            <div>
                <h2>Area aziendale</h2>

                <!-- Business Planning -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Business planning</h4>
                </div>
                <ul class="commitment-list">
                    <li>Analisi del modello di business</li>
                    <li>Analisi del contesto competitivo</li>
                    <li>Action plan</li>
                    <li>Piano economico-finanziario</li>
                </ul>

                <!-- Pitch e Comunicazione -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Pitch e comunicazione</h4>
                </div>
                <ul class="commitment-list">
                    <li>Investor pitch</li>
                    <li>Elevator pitch</li>
                    <li>Whitepaper</li>
                    <li>Corporate identity</li>
                </ul>

                <!-- Ricerca di Mercato -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Ricerca di mercato</h4>
                </div>
                <ul class="commitment-list">
                    <li>Analisi approfondita dell'area di interesse</li>
                    <li>Analisi approfondita del settore di interesse</li>
                    <li>Analisi approfondita dei competitor</li>
                </ul>

                <!-- Validazione Tecnica ed Ingegneristica -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Validazione tecnica ed ingegneristica</h4>
                </div>
                <ul class="commitment-list">
                    <li>Validazione delle assunzioni tecniche del business plan</li>
                    <li>Valutazione sulla fattibilità tecnica del prodotto o servizio</li>
                    <li>Consulenza da parte di ingegneri</li>
                </ul>

                <!-- Assistenza e Consulenza Contabile -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Assistenza e consulenza contabile</h4>
                </div>
                <ul class="commitment-list">
                    <li>Assetti organizzativi, amministrativi e contabili</li>
                    <li>Contabilità e bilancio</li>
                    <li>Management accounting e controllo di gestione</li>
                    <li>Budgeting, reporting e scostamenti</li>
                    <li>Supporto all’implementazione di sistemi di contabilità analitica e industriale</li>
                    <li>Analisi dei costi e della profittabilità</li>
                    <li>Supporto alle decisioni (fattori limitanti, decisioni di prezzo, make or buy, ecc.)</li>
                </ul>

                <!-- Finanza Agevolata -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Finanza agevolata</h4>
                </div>
                <ul class="commitment-list">
                    <li>Valutazione delle esigenze di finanziamento</li>
                    <li>Ricerca bandi</li>
                    <li>Predisposizione domanda di accesso</li>
                    <li>Monitoraggio e rendicontazione</li>
                </ul>

                <!-- Additional Sections -->
                <!-- Continue similar formatting for Finanza Ordinaria, Supporto nella ricerca di investitori, Valutazione aziendale, Exit strategy, Fail fast -->
            </div>
        </div>

    </section>



    <!-- Our specialization section -->
    <section class="specialization-container custom-container">
        <!-- content -->
        <div class="commitment-content  scrollable-content">
            <div>
                <h2>Area legale</h2>

                <!-- Costituzione societaria -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Costituzione societaria</h4>
                </div>
                <ul class="commitment-list">
                    <li>Redazione oggetto sociale</li>
                    <li>Redazione statuto</li>
                    <li>Redazione patti parasociali</li>
                    <li>Atto di costituzione (con intervento di un notaio)</li>
                    <li>Inizio attività camera di commercio e SUAP</li>
                </ul>

                <!-- Aumento di capitale -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Aumento di capitale</h4>
                </div>
                <ul class="commitment-list">
                    <li>Lettera di impegno e term-sheet</li>
                    <li>Contratto di investimento</li>
                    <li>Delibera assembleare (con intervento di un notaio)</li>
                    <li>Aggiornamento statuto e patti parasociali</li>
                    <li>Work for equity</li>
                    <li>Strumenti finanziari partecipativi</li>
                </ul>

                <!-- Assistenza e consulenza in tema di diritto commerciale e societario -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Assistenza e consulenza in tema di diritto commerciale e societario</h4>
                </div>
                <ul class="commitment-list">
                    <li>Assetti societari, patrimoniali e familiari</li>
                    <li>Corporate governance</li>
                    <li>Pianificazione e protezione patrimoniale</li>
                    <li>Gestione, monitoraggio e mitigazione dei rischi</li>
                    <li>Negoziazione, redazione e gestione dei contratti</li>
                    <li>Attribuzione di poteri e procure</li>
                    <li>Attività di segreteria societaria: assemblee e CDA</li>
                </ul>

                <!-- Consulenza proprietà intellettuale -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Consulenza proprietà intellettuale</h4>
                </div>
                <ul class="commitment-list">
                    <li>Marchi</li>
                    <li>Brevetti</li>
                    <li>Diritto d'autore</li>
                    <li>Know-how</li>
                </ul>

                <!-- Consulenza diritto dell’immigrazione -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Consulenza diritto dell’immigrazione</h4>
                </div>
                <ul class="commitment-list">
                    <li>Investor Visa for Italy</li>
                    <li>Italia Startup Visa</li>
                    <li>Italia Startup Hub</li>
                </ul>

                <!-- Exit strategy -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Exit strategy</h4>
                </div>
                <ul class="commitment-list">
                    <li>Cessione delle quote</li>
                    <li>Fusione ed acquisizione (M&A, Mergers & Acquisitions)</li>
                    <li>Quotazione (IPO, Initial Public Offering)</li>
                    <li>Assunzione del team (acqui-hires)</li>
                </ul>

                <!-- Fail fast -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Fail fast</h4>
                </div>
                <ul class="commitment-list">
                    <li>Liquidazione volontaria</li>
                    <li>Concordato minore</li>
                    <li>Liquidazione controllata</li>
                    <li>Esdebitazione</li>
                </ul>
            </div>
        </div>


        <!-- img -->
        <div class="images-container">
            <!-- first img -->
            <div>
                <img src="{{ asset($cms[9]->image_url) }}" alt="" />
            </div>
            <!-- img and a boxed container text -->
            <div class="">
                <img src="{{ asset($cms[9]->second_image_url) }}" alt="" />
                <div class="client-satisfaction-container">
                    <h2>100%</h2>
                    <p>Client Satisfaction</p>
                </div>
            </div>
        </div>
    </section>

    <!-- why choose section -->
    <section class="why-us-container custom-container">
        <!-- img -->
        <div>
            <img src="{{ $cms[4]->image_url }}" alt="" />
        </div>

        <!-- content -->
        <div class="commitment-content  scrollable-content">
            <div class="why-us-content">
                <h2>Area fiscale</h2>
                <p>Consulenza e assistenza fiscale specifica per startup e imprese innovative.</p>

                <div class="hr"></div>

                <!-- Consulenza incentivi fiscali start up -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Consulenza incentivi fiscali start up</h4>
                </div>
                <ul class="commitment-list">
                    <li>Consulenza su problematiche specifiche</li>
                    <li>Consulenza su crediti ricerca, sviluppo e innovazione</li>
                    <li>Consulenza su patent box</li>
                </ul>

                <!-- Consulenza incentivi fiscali investitori -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Consulenza incentivi fiscali investitori</h4>
                </div>
                <ul class="commitment-list">
                    <li>Consulenza su problematiche specifiche</li>
                    <li>Consulenza su detrazioni fiscali e crediti di imposta per investimenti in startup</li>
                </ul>

                <!-- Consulenza fiscale impatriati, espatriati, remote workers e digital nomads -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Consulenza fiscale impatriati, espatriati, remote workers e digital nomads</h4>
                </div>
                <ul class="commitment-list">
                    <li>Consulenza su problematiche specifiche</li>
                    <li>Consulenza regime impatriati</li>
                    <li>Consulenza regime docenti e ricercatori</li>
                    <li>Consulenza fiscale remote workers e digital nomads</li>
                </ul>

                <!-- Assistenza e consulenza fiscale alle start up -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Assistenza e consulenza fiscale alle start up</h4>
                </div>
                <ul class="commitment-list">
                    <li>Assistenza e consulenza fiscale ricorrente</li>
                    <li>Adempimenti periodici IVA e imposte dirette</li>
                    <li>Dichiarazioni annuali IVA e imposte dirette</li>
                    <li>Interpelli</li>
                    <li>Assistenza e consulenza in fase di accertamento</li>
                    <li>Assistenza e consulenza in fase di contenzioso</li>
                </ul>

                <!-- Consulenza gestione del personale dipendente -->
                <div class="commitment-heading">
                    <img src="{{ asset('frontend/images/icons/tickicon.svg') }}" alt="" />
                    <h4>Consulenza gestione del personale dipendente</h4>
                </div>
                <ul class="commitment-list">
                    <li>Paghe e Contributi</li>
                    <li>HR Management</li>
                    <li>Payroll Management</li>
                    <li>Incentivi contributivi alle assunzioni</li>
                    <li>Disciplina del lavoro flessibile nelle start-up innovative</li>
                </ul>

            </div>
            <a style="margin-top: 20px !important" class="view-all-services-btn" href="{{ route('services') }}">View all
                Services</a>
        </div>

    </section>

    <!-- professionals section starts -->
    @include('frontend.layouts.dedicated_professionals')

@endsection


@push('script')
@endpush
