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
                <form class="contact-form" id="get-info">
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
                            <input type="hidden" name="serviceId" value="{{ $data['service_id'] }}">
                            <input type="hidden" name="quality" value="{{ $data['quality'] }}">
                            <input type="hidden" name="promoCode" value="{{ $data['promoCode'] }}">
                            <div id="button-here">
                                <button style="border: 2px solid #2B40AF" type="submit"
                                    class="float-right transition duration-150 ease-in text-blue-700 hover:text-white  border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Submit</button>
                            </div>
                        </div>
                    </div>

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


@push('get-info-js')
    <script>
        $(document).on('submit', "#get-info", function(e) {
            e.preventDefault();
            $.ajax({
                url: "placeOrder",
                method: "post",
                dataType: "json",
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#button-here').html(`<button disabled type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex float-right">
                    <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                    </svg>
                    Loading...
                </button>
                `)
                },
                success: function(response, data) {
                    console.log(response)

                    if (response.status == 1) {
                        $('#button-here').hide()
                        $("#get-info")[0].reset();
                        $("#get-info").html(`
                            <div id="alert-additional-content-3" class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-300  " role="alert">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <h3 class="text-lg font-medium">Success</h3>
                            </div>
                            <div class="mt-2 mb-4 text-sm ">
                                ${response.data}
                            </div>
                            <div class="flex">
                            <a href="/" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Home
                                </a>
                            </div>
                            </div>
                        `)
                    } else {
                        $('#button-here').html(`
                            <button style="border: 2px solid #2B40AF" type="submit"
                            class="float-right transition duration-150 ease-in text-blue-700 hover:text-white  border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Submit</button>
                        `)
                    }
                },
                error: function(request, error) {
                    console.log(error);
                    console.log(request)
                    $('#button-here').html(`
                        <button style="border: 2px solid #2B40AF" type="submit"
                        class="float-right transition duration-150 ease-in text-blue-700 hover:text-white  border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Submit</button>
                `)
                }
            })
        })
    </script>
@endpush
