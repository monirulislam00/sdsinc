@extends('frontend.master')
@section('home_content')
    <div class="page-title" style='background-image: url({{ asset('frontend/images/bg.jpg') }})'>
        <h2 class="py-1 mt-4 fw-bold text-light">About Us</h2>
        <h3>Home > About us > About of SDSINC</h3>
    </div>
    <section id="about-us">
        <div class="container">
            <div class="row">
                <div class="com-md-12 col-xs-12">
                    <header class="section-header wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <h2 class="text-center py-3">About SDSInc.</h2>
                    </header>
                    <p style="text-align: justify;">The internet has been a boon and an inseparable partner in our modern
                        lives, but it has its own disadvantages as well. Criminals are now faceless and seemingly traceless.
                        The bigger weapon now is not a gun, but a keyboard. From malicious codes to Trojans to phishing and
                        organized crimes (data theft, DoS, DDoS) are the new threats we face every day. The new criminal
                        hides in the Deep Web, without a face or a name, waiting, only but a keystroke away. The threat is
                        very real and the danger of being attacked is imminent. Beetles has been created with the sole
                        purpose of warding off these criminals, safeguarding the clients’ data, both personal and
                        professional from such attacks and ensuring that no <b>Revenue</b> or <b>Business Impact</b> befalls
                        the client.</p>
                </div>
            </div>
        </div>

    </section>

    <section id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-img">
                        <img src="{{ asset('frontend/images/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about-content">
                        <h2>Our Mission</h2>
                        <p>To create long-term, sustainable value for customers and shareholders by developing, marketing,
                            and supporting products that deliver rapid return on investment through lower costs and improved
                            customer responsiveness.</p>
                    </div>
                    <div>
                        <h2>Our Values</h2>
                        <ul>
                            <li>To enable our customers to attain and exceed their business objectives through our
                                partnership.</li>
                            <li>To provide an environment for our employees which fosters personal growth, economic reward
                                and challenging opportunities.</li>
                            <li>To be a good corporate citizen in the many communities in which we operate.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-bg">
        <div class="container">
            <header class="section-header about_header">
                <h2 class="text-center py-3">Why SDSInc?</h2>
                <p style="text-align: justify;">
                    Beetles is an ISO 27001 certified offensive cyber security consultancy company. We specialize in a
                    manual and exploitative assessment of a company’s IT environment. With a hacker-led approach, we
                    simulate a real-world attack on applications, APIs, Network Infrastructure and Network Devices.
                    <br><br>
                    Ourglobally crowdsourced resource pool of ethical hackers and pentesters provide us with a varied range
                    of domain expertise, multi-discipline experiences, and skills. This sets our services apart in the cyber
                    security industry today.
                    <br><br>
                    Redefining the traditional penetration testing model, our PenTests are smaller, faster, agile, and
                    easily integrates with any development environment and processes. Our <b>PenTest_as_a_Service
                        (PTaaS)</b> ensures a continuous coverage of the scope through a properly defied, structured
                    approach and collaboration with your internal team.
                    <br><br>
                    <b>CrowdSpark</b>, our proprietary PenTest management platform, enables our PenTest engagements to be a
                    delivered as a service, aptly defined as <b>PenTest_as_a_Service (PTaaS)</b>. As a result, our clients
                    have the freedom and the luxury to schedule a PenTest on-demand. All the findings (vulnerability
                    reports) are triaged accordingly to severity and delivered via our CrowdSpark platform. This allows you
                    to receive the reports in real-time, as soon as they come in and schedule the remediation process
                    appropriately.
                    <br><br>
                    We understand the need for security. We understand the real word implications and consequences of having
                    a weak cyber security program. Beetles was born out of that realization of the need. Beetles has been
                    founded by ethical hackers, professional pentesters and bug bounty hunters as well as security
                    enthusiasts. Our goal is to enhance the IT industry and environments across all industry verticals,
                    empower development and growth while keeping costs low and to build a sustainable platform for cyber
                    security globally.
                </p>
            </header>
        </div>
    </section>
@endsection
