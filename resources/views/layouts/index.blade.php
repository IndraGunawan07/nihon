@extends('layouts.app')

@section('content')
<!-- banner -->
	<div class="banner" id="home">
    <div class="container">
        <div class="banner-main ser-lt">
            <span class="line my-4"></span>
            <h2 class="my-3 banner-sub" style="color: black">{{ get_username('head') }}</h2>
            <span class="line my-4"></span>
            <h6 class="my-" style="color: black">{{ get_username('sub judul')}}</h6>
            @if(Session::has('success'))
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="alert alert-success alert-dismissible fade show col-md-4 p-3 pr-5">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
<!-- //banner -->


<!-- about -->
    <div class="about bg-light py-5" id="about">
        <div class="container py-3">
            <div class="middle-heading text-center mb-5">
                <h3>about</h3>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-lg-0 mb-5 about-left">
                    <h2 class="" style="padding-top: 30px;">{{ get_username('about left') }}</h2>
                </div>
                <div class="col-lg-8 about-right pl-4">
                    <span>{{ get_username('about word') }}</span><p class="right-text">{{ get_username('about long')}}</p>
                </div>
            </div>
            <img src="{{ asset('images/1.png')}}" class="img-fluid mt-5" alt="" style="display: block; margin-left: auto; 
            margin-right: auto; width: 80%; height: 60%"> 
        </div>
    </div>
<!-- //about -->

<!-- team -->				
    <div class="team secnd_sty4 py-lg-5 py-5" id="team">
        <div class="container py-3">
            <div class="middle-heading1 text-center mb-5">
                <h3>team</h3>
            </div>
            <div class="row">
                <div class="col-md-4 p-0 pt-5 team-left text-center">
                    <img src="" class="img-fluid mb-5" alt="">
                    <h4>Indra Gunawan</h4>
                    <p>Lahir di dunia, gender pria, suka makan, hobi bernapas. single 2020.</p>
                    <div class="team-social py-4 text-center">
                        <ul class="social-icons text-center">
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 p-0 pt-md-0 pt-5 team-middle text-center">
                    <img src="" class="img-fluid mb-5" alt="">
                    <h4>Julio Christian Young</h4>
                    <p>Morbi non elit sed neque init rhoncus maximus ac enim elit sed neque init.</p>
                    <div class="team-social py-4 text-center">
                        <ul class="social-icons text-center">
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 p-0 pt-5 team-right text-center">
                    <img src="" class="img-fluid mb-5" alt="">
                    <h4>Bella Anggraini Utomo</h4>
                    <p>Morbi non elit sed neque init rhoncus maximus ac enim elit sed neque init.</p>
                    <div class="team-social py-4 text-center">
                        <ul class="social-icons text-center">
                            <li>
                                <a href="#">
                                    {{-- <i class="fa fa-facebook-f"></i> --}}
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<!-- //team -->	

@endsection

