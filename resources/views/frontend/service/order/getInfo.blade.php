@extends('frontend.master')
@section('home_content')
    <div class="page-title"
        style="background: url('{{ asset('frontend/images/contact.jpg') }}');background-size:contain;background-position:-50%">
        <div class="container mt-3">
            <h1 class="text-start mb-1 fw-light">Give Your Inforamations</h1>
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
                <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
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
                                <input value="{{ old('countryName') }}" type="text" class="w-full  rounded"
                                    id="" placeholder="Country Name " name="countryName"
                                    aria-describedby="company">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="w-full rounded" name="companySize"
                                    placeholder="How many employees do you have?">
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
                            <h4>Others</h4>
                            <div class="mb-3">
                                <textarea rows="5" cols="10" class="w-full rounded" id=""
                                    placeholder="Why do you need this software *" name="reason">{{ old('reason') }}</textarea>
                                <small class="text-danger">
                                    @error('reason')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3">
                                <textarea rows="9" cols="10" class="w-full rounded" id="" placeholder="description *"
                                    name="description">{{ old('description') }}</textarea>
                                <small class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <br>
                            <button style="border: 2px solid #2B40AF" type="submit"
                                class="float-right transition duration-150 ease-in text-blue-700 hover:text-white  border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" name="serviceId" value="{{ $data['service_id'] }}">
                    <input type="hidden" name="quality" value="{{ $data['quality'] }}">
                    <input type="hidden" name="promoCode" value="{{ $data['promoCode'] }}">
                </form>
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
