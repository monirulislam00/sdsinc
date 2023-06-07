@extends('frontend.master')
@section('home_content')
    <?php
    // $members = DB::table('teams')->get();
    ?>

    <div class="page-title" style='background-image: url({{ asset('frontend/images/bg.jpg') }})'>
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
                        <p style="text-align: justify;">Our team is composed of dedicated professionals who are passionate about what they do and are committed to providing our clients with the best services possible. We take great pride in our work and go above and beyond to ensure our clients’ needs are met. <br><br>

                            Our team members bring a diverse range of skills and experiences to the table. From Biometric, Software development, E-Commerce, Web Development and WebApps, Network, Cloud Computing, Surveillance, Security and Cyber Security, IoT, AI, Industry development, marketing and sales to project management, technology, and more, we have experts in every field who work together to achieve our goals.
                            <br><br>
                            We believe in fostering a work environment that promotes creativity, innovation, and intellectual curiosity. Our team is encouraged to express their ideas and work collaboratively to find new and better ways to serve our clients.
                            <br><br>
                            At our company, our people are our greatest asset, and we are proud to have a team that is not only hardworking and talented but also supportive and inclusive. We are committed to creating a workplace culture where every person is valued, respected, and empowered.
                            <br><br>
                            Thank you for taking the time to learn more about our team. We look forward to serving you and helping you achieve your business goals.
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
