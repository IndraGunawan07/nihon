@extends('layouts.app')

@section('content')
<!-- banner -->
	<div class="banner" id="home">
    <div class="container">
        <div class="banner-main ser-lt">
                <span class="line my-4"></span>
                <h2 class="my-3 banner-sub" style="color: black">{{ get_username() }}</h2>
                <span class="line my-4"></span>
                <h6 class="my-" style="color: black">Bantu kami mengumpulkan voice dataset dalam bahasa jepang</h6>
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
                                <h2 class="">Nihonesia to pendek, how to panjangin ?</h2>
                            </div>
                            <div class="col-lg-8 about-right pl-4">
                                <span>N</span><p class="right-text">ihonesia merupakan website pengumpulan speech dataset dalam bahasa jepang. Website ini mengumpulkan rekaman suara pengguna saat membaca huruf jepang.</p>
                                <p class="my-3">website ini dikembangkan oleh Universitas Multimedia Nusantara, diharapkan dengan adanya website ini dapat membantu penelitian tentang speech recognition.</p>
                            </div>
                    </div>
                    <img src="" class="img-fluid mt-5" alt="">
                    <p class="iner mt-4"> Nunc fermentum adipiscing tempor cursus nascetur adipiscing adipiscing. Primis aliquam mus lacinia lobortis phasellus suscipit. Fermentum lobortis non tristique ante proin sociis accumsan lobortis. Auctor etiam porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum integer purus sapien. Nibh eleifend nulla nascetur pharetra commodo mi augue interdum tellus. Ornare cursus augue feugiat sodales velit lorem. Semper elementum ullamcorper lacinia natoque aenean scelerisque.</p>
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

