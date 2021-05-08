<x-app-layout>
    <div>
        <div class="fh5co-loader"></div>

        <div id="page" class="content">
            <nav class="fh5co-nav" role="navigation">
                <div class="top" id="myHeader">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <p class="site">{{ $topbar->email }}</p>
                                <p class="num">Call: +91 {{ $topbar->phone }}</p>
                                <ul class="fh5co-social">
                                    <li><a href="#"><i class="icon-facebook2"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter2"></i></a></li>
                                    <li><a href="#"><i class="icon-dribbble2"></i></a></li>
                                    <li><a href="#"><i class="icon-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-2">
                                <div>
                                    <a href=""> <img id="logo" src="{{ asset($logo->image) }}" alt=""><br></a>
                                </div>
                            </div>
                            <div class="col-xs-10 text-right menu-1">
                                <ul>
                                    <li class="active"><a href="index.html">Home</a></li>
                                    <li><a href="courses.html">Courses</a></li>
                                    <li><a href="teacher.html">Teacher</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="pricing.html">Pricing</a></li>
                                    <li class="has-dropdown">
                                        <a href="blog.html">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Web Design</a></li>
                                            <li><a href="#">eCommerce</a></li>
                                            <li><a href="#">Branding</a></li>
                                            <li><a href="#">API</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/dashboard') }}"
                                                class="text-sm text-gray-700 underline">Dashboard</a>
                                        @else
                                            <li class="btn-cta"><a href="{{ route('login') }}"><span>Login</span></a></li>
                                            @if (Route::has('register'))
                                                <li class="btn-cta"><a
                                                        href="{{ route('register') }}"><span>Register</span></a>
                                                </li>
                                            @endif
                                        @endauth
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>

            <aside id="fh5co-hero">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($slider as $slider)
                            @if ($slider->status == 1)
                                <li style="background-image: url('{{ asset($slider->image) }}');">
                                    <div class="overlay-gradient"></div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2 text-center slider-text">
                                                <div class="slider-text-inner">
                                                    <h1>{{ $slider->title }}</h1>
                                                    <h2>Published <a>{{ $slider->created_at->diffForHumans() }}</a>
                                                    </h2>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                        @endforeach

                    </ul>
                </div>
            </aside><br>
            <div class="row animate-box">
                <div class="col-md-6 col-sm-12">

                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <div id="vision" class="card">
                                <div class="card-header text-danger">
                                    <div class="card-body text-center">
                                        <strong style="color: gray">OUR <span style="color: orange">MISSION</span>
                                        </strong><br><br>
                                        <p>{!! $mission->body !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column-reverse bd-highlight">
                        <div class="p-2 bd-highlight">
                            <div id="vision" class="card">
                                <div class="card-header text-danger">
                                    <div class="card-body text-center">
                                        <strong style="color: gray">OUR <span style="color: orange">VISION</span>
                                        </strong><br><br>
                                        <p>{!! $vision->body !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h2 class="text-center fh5co-heading"> <strong style="color: gray">ANNAUNCEMENT <span>- <a
                                    style="color: orange" href="">VIEW ALL</a></span> </strong> </h2>
                    @foreach ($annauncement as $annauncement)
                        @if ($annauncement->status == 1)
                            <marquee behavior="" direction="up" onMouseOver="this.stop()" onMouseOut="this.start()">
                                <div class="card" id="annauncement">
                                    <div class="card-header text-danger">
                                        {{ $annauncement->created_at->diffForHumans() }}
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>{{ $annauncement->title }}</p>
                                            <footer class="blockquote-footer text-yellow-400"><a
                                                    href="{{ Storage::URL($annauncement->file) }}"> <b>Download</b>
                                                </a>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </marquee>
                        @endif
                    @endforeach

                </div>
            </div>
            <br><br><br><br>
            <h1 class="pdesk">Principal Desk</h1>
            <br> <br>
            <div class="container" id="p">
                <div class="row animate-box">
                    <div class="principal">
                        <img src="{{ asset($principal->image) }}" alt="Avatar" class="rounded mx-auto d-block"> <br>
                        <div class="container text-center">
                            <h4><b>Principal's Message</b></h4><br>
                            <p class="text-justify">{!! $principal->body !!}</p><br>
                            <h4><b>({{ $principal->name }})</b></h4><br>
                            <h4><b>{{ $principal->designation }}</b></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-course-categories">
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                            <h2>Course categories</h2>
                            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                                provident.
                                Odit ab aliquam dolor eius.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="icon-shop"></i>
                                </span>
                                <div class="desc">
                                    <h3><a href="#">Business</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="icon-heart4"></i>
                                </span>
                                <div class="desc">
                                    <h3><a href="#">Health &amp; Psychology</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="icon-banknote"></i>
                                </span>
                                <div class="desc">
                                    <h3><a href="#">Accounting</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="icon-lab2"></i>
                                </span>
                                <div class="desc">
                                    <h3><a href="#">Science &amp; Technology</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="icon-photo"></i>
                                </span>
                                <div class="desc">
                                    <h3><a href="#">Art &amp; Media</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="icon-home-outline"></i>
                                </span>
                                <div class="desc">
                                    <h3><a href="#">Real Estate</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="icon-bubble3"></i>
                                </span>
                                <div class="desc">
                                    <h3><a href="#">Language</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center animate-box">
                            <div class="services">
                                <span class="icon">
                                    <i class="icon-world"></i>
                                </span>
                                <div class="desc">
                                    <h3><a href="#">Web &amp; Programming</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-counter" class="fh5co-counters" style="background-image: url(images/img_bg_4.jpg);"
                data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 text-center animate-box">
                                    <span class="icon"><i class="icon-world"></i></span>
                                    <span class="fh5co-counter js-counter" data-from="0" data-to="3297"
                                        data-speed="5000" data-refresh-interval="50"></span>
                                    <span class="fh5co-counter-label">Foreign Followers</span>
                                </div>
                                <div class="col-md-3 col-sm-6 text-center animate-box">
                                    <span class="icon"><i class="icon-study"></i></span>
                                    <span class="fh5co-counter js-counter" data-from="0" data-to="3700"
                                        data-speed="5000" data-refresh-interval="50"></span>
                                    <span class="fh5co-counter-label">Students Enrolled</span>
                                </div>
                                <div class="col-md-3 col-sm-6 text-center animate-box">
                                    <span class="icon"><i class="icon-bulb"></i></span>
                                    <span class="fh5co-counter js-counter" data-from="0" data-to="5034"
                                        data-speed="5000" data-refresh-interval="50"></span>
                                    <span class="fh5co-counter-label">Classes Complete</span>
                                </div>
                                <div class="col-md-3 col-sm-6 text-center animate-box">
                                    <span class="icon"><i class="icon-head"></i></span>
                                    <span class="fh5co-counter js-counter" data-from="0" data-to="1080"
                                        data-speed="5000" data-refresh-interval="50"></span>
                                    <span class="fh5co-counter-label">Certified Teachers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-course">
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                            <h2>Our Course</h2>
                            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                                provident.
                                Odit ab aliquam dolor eius.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 animate-box">
                            <div class="course">
                                <a href="#" class="course-img" style="background-image: url(images/project-1.jpg);">
                                </a>
                                <div class="desc">
                                    <h3><a href="#">Web Master</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius molestias accusamus alias autem provident.
                                        Odit ab
                                        aliquam dolor eius.</p>
                                    <span><a href="#" class="btn btn-primary btn-sm btn-course">Take A Course</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 animate-box">
                            <div class="course">
                                <a href="#" class="course-img" style="background-image: url(images/project-2.jpg);">
                                </a>
                                <div class="desc">
                                    <h3><a href="#">Business &amp; Accounting</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius molestias accusamus alias autem provident.
                                        Odit ab
                                        aliquam dolor eius.</p>
                                    <span><a href="#" class="btn btn-primary btn-sm btn-course">Take A Course</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 animate-box">
                            <div class="course">
                                <a href="#" class="course-img" style="background-image: url(images/project-3.jpg);">
                                </a>
                                <div class="desc">
                                    <h3><a href="#">Science &amp; Technology</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius molestias accusamus alias autem provident.
                                        Odit ab
                                        aliquam dolor eius.</p>
                                    <span><a href="#" class="btn btn-primary btn-sm btn-course">Take A Course</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 animate-box">
                            <div class="course">
                                <a href="#" class="course-img" style="background-image: url(images/project-4.jpg);">
                                </a>
                                <div class="desc">
                                    <h3><a href="#">Health &amp; Psychology</a></h3>
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias
                                        autem
                                        provident. Odit ab aliquam dolor eius molestias accusamus alias autem provident.
                                        Odit ab
                                        aliquam dolor eius.</p>
                                    <span><a href="#" class="btn btn-primary btn-sm btn-course">Take A Course</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-testimonial" style="background-image: url(images/school.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                            <h2><span>Testimonials</span></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row animate-box">
                                <div class="owl-carousel owl-carousel-fullwidth">
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <div class="user" style="background-image: url(images/person1.jpg);"></div>
                                            <span>Mary Walker<br><small>Students</small></span>
                                            <blockquote>
                                                <p>&ldquo;Far far away, behind the word mountains, far from the
                                                    countries
                                                    Vokalia and Consonantia, there live the blind texts. Separated they
                                                    live in
                                                    Bookmarksgrove right at the coast of the Semantics, a large language
                                                    ocean.&rdquo;</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <div class="user" style="background-image: url(images/person2.jpg);"></div>
                                            <span>Mike Smith<br><small>Students</small></span>
                                            <blockquote>
                                                <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of
                                                    the
                                                    Semantics, a large language ocean.&rdquo;</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <div class="user" style="background-image: url(images/person3.jpg);"></div>
                                            <span>Rita Jones<br><small>Teacher</small></span>
                                            <blockquote>
                                                <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the
                                                    blind
                                                    texts. Separated they live in Bookmarksgrove right at the coast of
                                                    the
                                                    Semantics, a large language ocean.&rdquo;</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-blog">
                <div class="container">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>Blog &amp; Events</h2>
                            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                                provident.
                                Odit ab aliquam dolor eius.</p>
                        </div>
                    </div>
                    <div class="row row-padded-mb">
                        <div class="col-md-4 animate-box">
                            <div class="fh5co-event">
                                <div class="date text-center"><span>15<br>Mar.</span></div>
                                <h3><a href="#">USA, International Triathlon Event</a></h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts.</p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 animate-box">
                            <div class="fh5co-event">
                                <div class="date text-center"><span>15<br>Mar.</span></div>
                                <h3><a href="#">USA, International Triathlon Event</a></h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts.</p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 animate-box">
                            <div class="fh5co-event">
                                <div class="date text-center"><span>15<br>Mar.</span></div>
                                <h3><a href="#">New Device Develope by Microsoft</a></h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia,
                                    there live the blind texts.</p>
                                <p><a href="#">Read More</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="fh5co-blog animate-box">
                                <a href="#" class="blog-img-holder"
                                    style="background-image: url(images/project-1.jpg);"></a>
                                <div class="blog-text">
                                    <h3><a href="#">Healty Lifestyle &amp; Living</a></h3>
                                    <span class="posted_on">March. 15th</span>
                                    <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia,
                                        there live the blind texts.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="fh5co-blog animate-box">
                                <a href="#" class="blog-img-holder"
                                    style="background-image: url(images/project-2.jpg);"></a>
                                <div class="blog-text">
                                    <h3><a href="#">Healty Lifestyle &amp; Living</a></h3>
                                    <span class="posted_on">March. 15th</span>
                                    <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia,
                                        there live the blind texts.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="fh5co-blog animate-box">
                                <a href="#" class="blog-img-holder"
                                    style="background-image: url(images/project-3.jpg);"></a>
                                <div class="blog-text">
                                    <h3><a href="#">Healty Lifestyle &amp; Living</a></h3>
                                    <span class="posted_on">March. 15th</span>
                                    <span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia,
                                        there live the blind texts.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="fh5co-gallery" class="fh5co-bg-section">
                <div class="row text-center">
                    <h2><span>Instagram Gallery</span></h2>
                </div>
                <div class="row">
                    <div class="col-md-3 col-padded">
                        <a href="#" class="gallery" style="background-image: url(images/project-5.jpg);"></a>
                    </div>
                    <div class="col-md-3 col-padded">
                        <a href="#" class="gallery" style="background-image: url(images/project-2.jpg);"></a>
                    </div>
                    <div class="col-md-3 col-padded">
                        <a href="#" class="gallery" style="background-image: url(images/project-3.jpg);"></a>
                    </div>
                    <div class="col-md-3 col-padded">
                        <a href="#" class="gallery" style="background-image: url(images/project-4.jpg);"></a>
                    </div>
                </div>
            </div>


        </div>
</x-app-layout>
