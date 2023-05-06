@extends('frontend.master')
@section('home_content')
    <?php
    // $members = DB::table('teams')->get();
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
    @include('frontend.about.team.modal')
    <section id="team-area">
        <div class="container">
            @foreach ($departments as $department)
                @if ($department->getTeamMembers->count() > 0)
                    <div class="teamheading text-center">
                        <h2 class="text-center m-auto" id="{{$department->department_name}}">{{ $department->department_name }}</h2>
                        <div class="row mt-4">

                            @foreach ($department->getTeamMembers as $member)
                                <div class="col-md-4 col-sm-6 single-team see-profile" data-bs-toggle="modal"
                                    data-bs-target="#teamModal" data-id="{{ $member->id }}">
                                    <div>
                                        <div class="">
                                            <img class="m-auto" src="{{ asset($member->image) }}" alt="">
                                        </div>
                                        <div class="text-center">
                                            <h3 class="fw-bold mt-3">{{ $member->name }}</h3>
                                            <p>{{$member->designation}}</p>
                                            {{-- <p class="desg">{{ $member->company }}</p>
                                            <p class="desg">{{ $member->phone }}</p>
                                            <p class="desg">{{ $member->email }}</p>
                                             <div class="team-social">
                                                <a class="fa fa-facebook" href="#"></a>
                                                <a class="fa fa-twitter" href="#"></a>
                                                <a class="fa fa-linkedin" href="#"></a>
                                                <a class="fa fa-pinterest" href="#"></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </section>
@endsection
