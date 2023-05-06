@extends('frontend.master')
@section('home_content')
<div class="text-center page-title text-light" style='background-image: url({{ asset('frontend/images/bg.jpg') }})'>
        <div class="page-title-texts ">
            <h2 class="py-1 mt-4 fw-bold text-light">Affiliated</h2>
            <h3>Home > Affiliated</h3>
        </div>
 </div>
 <div class="container">
    <section class="affiliated">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="background flex justify-center">
                <h1 class="my-5">Recommend Products. Earn Commissions.</h1>
                <a class="button-1" href="#sign_up">Sign up</a>
                <a class="button-1" href="{{url('/login')}}">Log in</a>
            </div>
        </div>
        <div class="col-md-10 py-5">
            <h2>Affiliate marketing program</h2>
            <p>Welcome to one of the largest affiliate marketing programs in the world. The Amazon Associates Program helps content creators, publishers and bloggers monetize their traffic. With millions of products and programs available on Amazon, associates use easy link-building tools to direct their audience to their recommendations, and earn from qualifying purchases and programs.</p>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 text-center px-5">
                    <img class="m-auto h-20" src="{{asset("frontend/images/002-signup.png")}}" alt="">
                    <p class="font-semibold text-xl mt-2">Sign up</p>
                    <p>Join tens of thousands of creators, publishers and bloggers who are earning with the SDSINC Associates Program.</p>
                </div>
                <div class="col-md-4 text-center px-5">
                    <img class="m-auto h-20" src="{{asset("frontend/images/003-recommendation.png")}}" alt="">
                    <p class="font-semibold text-xl  mt-2">Recommend</p>
                    <p>Share millions of products with your audience. We have customized linking tools for large publishers, individual bloggers and social media influencers.</p>
                </div>
                <div class="col-md-4 text-center px-5">
                    <img class="m-auto h-20" src="{{asset("frontend/images/006-salary.png")}}" alt="">
                    <p class="font-semibold text-xl  mt-2">Earn</p>
                    <p>Earn up to 10% in associate commissions from qualifying purchases and programs. Our competitive conversion rates help maximize earnings.</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p class="text-2xl my-4 font-semibold">Frequently Asked Questions</p>
        </div>
        <div class="row">
            <div class="col-md-6 px-5">
                <p class="text-lg font-semibold">How does the Associates Program work?</p>
                <p class="pb-2">You can share products and available programs on Amazon with your audience through customized linking tools and earn money on qualifying purchases and customer actions like signing up for a free trial program.</p>
                <p class="text-lg font-semibold">How do I qualify for this program?</p>
                <p>Bloggers, publishers and content creators with a qualifying website or mobile app can participate in this program.</p>
            </div>
            <div class="col-md-6">
                <p class="text-lg font-semibold">How do I earn in this program?</p>
                <p class="pb-2">You earn from qualifying purchases and programs through the traffic you drive to Amazon. Commission income for qualifying purchases and programs differ based on product category. Note: Commission income is paid approximately 60 days after the end of the month in which it was earned.</p>
                <p class="text-lg font-semibold">How do I sign up to the program?</p>
                <p class="pb-1">Sign up to the program here.</p>
                <p>We will review your application and approve it if you meet the qualifying criteria.</p>
            </div>
        </div>
     </section>
     <section id="sign_up">
        <div class="col-md-10 mb-5">
            <form action="{{route('store.affiliated')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label font-semibold">Full Name</label>
                    <input type="text" name="name" class="form-control">
                    @error("name")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label font-semibold">Email</label>
                    <input type="email" name="email" class="form-control">
                    @error("email")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label font-semibold">Phone Number</label>
                    <input type="text" name="phone" class="form-control">
                    @error("phone")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label font-semibold">Whatsapp Number</label>
                    <input type="text" name="whatsapp" class="form-control">
                    @error("whatsapp")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label font-semibold">Enter Password</label>
                    <input type="password" name="password" class="form-control">
                    @error("password")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label font-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label font-semibold">Address</label>
                    <textarea name="address" rows="5" class="form-control"></textarea>
                    @error("address")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label font-semibold">Payment Method</label>
                    <select name="paymentMethod" class="form-control">
                        <option value="">Select</option>
                        <option value="bkash">Bkash</option>
                    </select>
                    @error("paymentMethod")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label font-semibold">Bkash Account Number</label>
                    <input type="text" name="cardNumber" class="form-control">
                    @error("cardNumber")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
     </section>
 </div>
@endsection
