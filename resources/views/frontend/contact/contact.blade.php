@extends('frontend.master')
@section('home_content')
    <div class="pb-[20px] pt-[90px] lg:pt-[40px] px-5 page-title"
        style="background: url('{{ asset('frontend/images/bg.jpg') }}')">
        {{-- <div class="container mt-3 text-start px-3">
            <h1 class="mb-1 font-medium">Any Question ?</h1>
            <h3 class="text-dark" style="text-align: left;">Lorem, ipsum dolor sit amet consectetur
                adipisicing
                elit.
                Explicabo similique ut <br>
                incorrupti, quos minus.</h3>
        </div> --}}
        <div class="page-title-texts ">
            <h2 class="py-1 mt-4 fw-bold text-light">Contact</h2>
            <h3>Home > Contact</h3>
        </div>
    </div>
    <br>
    <br>
    <section id="contact-page">
        <div class="container">
            <div class="large-title text-center">
                <h3 style="font-size:30px" class="text-black pb-2">Feel Free to call us</h3>
                <p class="text-black">BD number: +1 000 000 000 <br>
                </p>
            </div>

            {{-- ---------------------------- alert message box starts --------------------------- --}}
            @if (session()->has('alert'))
                <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-200"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Success</span>
                    <div>
                        <span class="font-medium">Success !</span> {{ session('alert') }}
                    </div>
                </div>
            @endif

            {{-- ---------------------------- alert message box ends --------------------------- --}}
            <div class="row contact-wrap ">
                <form id="main-contact-form" class="contact-form" action="{{ route('contactmessage') }}" method="POST">
                    @csrf
                    <div class="row py-3 mb-5">
                        <div class="col-md-6">
                            <h4>Company Info</h4>
                            <div class="mb-3">
                                <input value="{{ old('companyName') }}" value="{{ old('companyName') }}" type="text"
                                    class="w-full  rounded" id="" placeholder="Company Name " name="companyName"
                                    aria-describedby="company">
                            </div>
                            <div class="mb-3">
                                @include('frontend.contact.countryNames')
                            </div>
                            <div class="form-group mb-3">
                                <select value="{{ old('enquiryType') }}" class="tailwind-select"
                                    aria-label="Default select example" name="enquiryType">
                                    <option>Enquery Type *</option>
                                    <option value="operations">Operations</option>
                                    <option value="Executive Travel">Executive Travel</option>
                                    <option value="Partnership"> Partnership</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Press and Media">Press and Media</option>
                                    <option value="Careers">Careers</option>
                                    <option value="project">Careers</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="from-group mb-3">
                                <select value="{{ old('fromWhereHeard') }}" class="tailwind-select" name="fromWhereHeard">
                                    <option value="">How did you hear about us</option>
                                    <option value="Internet Search">Internet Search</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Adertisement">Adertisement</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Exhibition">Exhibition</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <h4>Contact Info</h4>
                            <div class="mb-3">
                                <input value="{{ old('fullName') }}" type="text" class="w-full  rounded" name="fullName"
                                    id="" placeholder="Full Name *">
                                <small class="text-danger">
                                    @error('fullName')
                                        {{ $message }}
                                    @enderror

                                </small>
                            </div>
                            <div class="mb-3">
                                <input value="{{ old('email') }}" type="email" class="w-full  rounded" id=""
                                    placeholder="Email *" name="email">
                                <small class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror

                                </small>
                            </div>
                            <div class="mb-3 d-flex">
                                <div class="row">
                                    <div class="col-md-4">
                                        @include('frontend.contact.countryCode')
                                    </div>
                                    <div class="col-md-8">

                                        <input value="{{ old('phone') }}" type="text" class="w-full  rounded"
                                            id="" placeholder="Phone Number" name="phone">

                                    </div>
                                    <small class="text-danger">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Message</h4>
                            <div class="mb-3">
                                <textarea rows="18" cols="10" class="w-full  rounded" id="" placeholder="message *" name="message">{{ old('message') }}</textarea>
                                <small class="text-danger">
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <br>
                            <button style="border: 2px solid #2B40AF" type="submit"
                                class="float-right transition duration-150 ease-in text-blue-700 hover:text-white  border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mb-5 py-3">
                <div class="col-md-5 border-b-2 mr-2 p-2">
                    <h5>Bangladesh Office</h5>
                    <p class="fw-medium">House No 16 ( Level 5)<br>
                        Block - A<br>
                        Basundhara R/A, Main Road<br>
                        Dhaka-1229<br>
                        Email: info@dream71.com<br>
                        Mobile:+8801550019966, +8801715091734<br>
                        Phone:+88 09 678 71 1971<br>
                        BD Phone +14158002851</p>
                </div>
                <div class="col-md-5 border-b-2 md:ml-7 p-2">
                    <h5>UAE Office</h5>
                    <p class="fw-medium">House No 16 ( Level 5)<br>
                        Block - A<br>
                        Basundhara R/A, Main Road<br>
                        Dhaka-1229<br>
                        Email: info@dream71.com<br>
                        Mobile:+8801550019966, +8801715091734<br>
                        Phone:+88 09 678 71 1971<br>
                        UAE Phone +14158002851</p>
                </div>
            </div>
            <br>
            <br>
            <br>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#contact-page-->
@endsection
