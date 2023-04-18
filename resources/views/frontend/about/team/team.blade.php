@extends('frontend.master')
@section('home_content')
    <?php
    // $directors = DB::table('teams')->get();
    // $managements = DB::table('management')->get();
    // $hrs = DB::table('h_r_s')->get();
    // $accounts = DB::table('accounts')->get();
    // $bios = DB::table('bio_metrics')->get();
    // $webs = DB::table('webdevs')->get();
    // $networks = DB::table('networks')->get();
    // $e_commerces = DB::table('e_commerces')->get();
    ?>

    <div class="page-title" style='background-image: url({{ asset('frontend/images/page-title.png') }})'>
        <h2 class="py-1 mt-4 fw-bold text-light">Our Team</h2>
        <h3>Home > About us > Our Team</h3>
    </div>

    <section id="about-us">
        <div class="container">
            <div class="row">
                <div class="com-md-12 col-xs-12">
                    <header class="section-header wow fadeInUp ourteam"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <h2 class="mt-4">Our Team</h2>
                        <p style="text-align: justify;">The internet has been a boon and an inseparable partner in our
                            modern lives, but it has its own disadvantages as well. Criminals are now faceless and seemingly
                            traceless. The bigger weapon now is not a gun, but a keyboard. From malicious codes to Trojans
                            to phishing and organized crimes (data theft, DoS, DDoS) are the new threats we face every day.
                            The new criminal hides in the Deep Web, without a face or a name, waiting, only but a keystroke
                            away. The threat is very real and the danger of being attacked is imminent. Beetles has been
                            created with the sole purpose of warding off these criminals, safeguarding the clients’ data,
                            both personal and professional from such attacks and ensuring that no <b>Revenue</b> or
                            <b>Business Impact</b> befalls the client.
                        </p>
                    </header>

                </div>
            </div>
        </div>

    </section>

    <section id="team-area">
        <div class="container">

            <div class="teamheading">
                <h2 class="mb-4">Board Of Directors</h2>
                <div class="row">
                    <div>
                        {{-- @foreach ($directors as $director)
                            <div class="col-md-4 col-sm-6 single-team">
                                <div class="inner">
                                    <div class="team-img">
                                        <img src="{{ asset($director->image) }}" alt="">
                                    </div>
                                    <div class="team-content">
                                        <h4>{{ $director->name }}</h4>
                                        <p class="desg">{{ $director->company }}</p>
                                        <p class="desg">{{ $director->title }}</p>
                                        <p class="desg">{{ $director->phone }}</p>
                                        <p class="desg">{{ $director->mail }}</p>
                                        <div class="team-social">
                                            <a class="fa fa-facebook" href="#"></a>
                                            <a class="fa fa-twitter" href="#"></a>
                                            <a class="fa fa-linkedin" href="#"></a>
                                            <a class="fa fa-pinterest" href="#"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
