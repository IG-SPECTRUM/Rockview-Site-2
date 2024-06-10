@extends("layouts/website-layout")
@section("title")
    Rockview University
@endsection
@section("content")
<!-- hero slider -->
<section class="hero-section overlay bg-cover" id="hero-section">
    <div class="container">
        <div class="hero-slider">
            @forelse($image_slides as $image_slide)
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5"
                                data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">
                                {{ $image_slide->heading }}
                            </h1>
                            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5"
                                data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">
                               {{ $image_slide->description }}
                            </p>
                            <a href="https://wa.me/+260967967961" target="_blank" class="btn btn-primary"
                                data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3"
                                data-animation-in="fadeInLeft" data-delay-in=".7">Chat now</a>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</section>
<style>
.hero-section {
    transition: background-image 1s ease-in-out;
}

.card-img-top {
    height: 200px;
    /* Set the desired height here */
    object-fit: cover;
}
</style>
<!-- JavaScript -->

<script>
    let images = "<?php
            if($image_slides->count()){
            foreach($image_slides as $image_slide){
                echo $image_slide->image.",";
            }
        }?>"
    
    let array_of_images = images.split(","); 
   
    const backgrounds = [];
    
    for(let i=0; i<array_of_images.length; i++){
        backgrounds.push("storage/website/images/"+array_of_images[i]);
    }
    let currentBackgroundIndex = 0;

    function changeBackground() {
        const heroSection = document.getElementById("hero-section");
        heroSection.style.backgroundImage = `url(${backgrounds[currentBackgroundIndex]})`;

        currentBackgroundIndex =
            (currentBackgroundIndex + 1) % backgrounds.length;
    }

    setInterval(changeBackground, 5000);
</script>
<!-- /hero slider -->

<!-- banner-feature -->
<section class="bg-gray">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-xl-4 col-lg-5 align-self-end">
                <img class="img-fluid w-100" src="storage/website/images/h.png" alt="banner-feature" />
            </div>

            <div class="col-xl-8 col-lg-7">
                <marquee behavior="scroll" style="margin-bottom: -0.56px; background-color: green;">
                    <a href="apply.html" style="font-size: 27px; color: white;">
                        APPLY NOW!!! BURSARIES AVAILABLE NOW !!! APPLY NOW!!! BURSARIES AVAILABLE NOW !!!
                    </a>
                </marquee>

                <br />
                <br />
                <br />

                <div class="row feature-blocks bg-gray justify-content-between" style="    margin-top: -70px;">
                    <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                        <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                        <h3 class="mb-xl-4 mb-lg-3 mb-4">Apply for Admission</h3>
                        <p>Apply for admission at Rockview University.</p>
                    </div>
                    <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                        <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                        <h3 class="mb-xl-4 mb-lg-3 mb-4">Chat Board</h3>
                        <p>
                            Not sure on what to study? Chat with our dedicated Student
                            Advisors.
                        </p>
                    </div>
                    <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                        <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                        <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Student portals</h3>
                        <p>Student portal for current students.</p>
                    </div>
                    <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                        <i class="ti-write mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                        <h3 class="mb-xl-4 mb-lg-3 mb-4">A-Z Programs Available Now</h3>
                        <p>
                            Take a look at our programs and select the right course for
                            you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /banner-feature -->

<!-- about us -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1">
                <h2 class="section-title">About Rockview</h2>
                <p>
                    Rockview University is privately owned and operated university
                    located in Lusaka, Zambia. It is one of the fastest growing
                    universities in Zambia and keeps seeing an exponential increase in
                    the number of admissions each and every year.
                </p>
                <p></p>
                <a href="about.html" class="btn btn-primary-outline">Learn more</a>
            </div>
            <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                <img class="img-fluid w-100" src="storage/website/images/u.png" alt="about image" />
            </div>
        </div>
    </div>
</section>
<!-- /about us -->

<!-- courses -->
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title justify-content-between">
                    <h2 class="mb-0 text-nowrap mr-3">Our Course</h2>
                    <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                    <div>
                        <a href="courses.html" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see
                            all</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- course list -->
        <div class="row justify-content-center">
            @forelse($programs as $program)
                <!-- course item -->
                <div class="col-lg-4 col-sm-6 mb-5">
                    <div class="card p-0 border-primary rounded-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="storage/courses/{{$program->image}}" alt="course thumb" />
                        <div class="card-body">
                            <h4 class="card-title">{{ $program->course}}</h4>
                            <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
                        </div>
                    </div>
                </div>
            @empty 

            @endforelse
        </div>
        <!-- /course list -->
        <!-- mobile see all button -->
        <div class="row">
            <div class="col-12 text-center">
                <a href="courses.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
            </div>
        </div>
    </div>
</section>
<!-- /courses -->

<!-- cta -->
<section class="section " style="background-color: #04a513;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h6 class="text-white font-secondary mb-0">
                    Click to Join the Advance Workshop
                </h6>
                <h2 class="section-title text-white">
                    Training In Advannce Networking
                </h2>
                <a href="contact.html" class="btn btn-secondary">join now</a>
            </div>
        </div>
    </div>
</section>
<!-- /cta -->

<!-- success story -->
<section class="section bg-cover" data-background="images/su.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-4 position-relative success-video">
                <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
                    <i class="ti-control-play"></i>
                </a>
            </div>
            <div class="col-lg-6 col-sm-8">
                <div class="bg-white p-5">
                    <h2 class="section-title">Success Stories</h2>
                    <p>
                        At Rockview University, the journey from student to esteemed member of society is a well-trodden
                        path. Graduates from our institution have seamlessly transitioned into roles of influence and
                        leadership within various sectors. Equipped with a robust education and nurtured within a
                        diverse and supportive community, Rockview alumni emerge as catalysts for positive change.
                        Whether in business, academia, public service, or beyond, they embody the values instilled
                        during their time at Rockview—integrity, innovation, and a commitment to service. Their
                        achievements stand as a testament to the transformative power of education and the enduring
                        legacy of Rockview University.
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /success story -->
<!-- blog -->
<section class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Latest News</h2>
                <p>
                    Keep up to date with the University's latest news, features,
                    events and videos with our email newsletter, the Rockview news
                    digest.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse($updates as $update)
                <!-- blog post -->
                <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <div
                        class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="storage/news/{{$update->image}}" alt="Post thumb" />
                        <div class="card-body">
                            <!-- post meta -->
                            <ul class="list-inline mb-3">
                                <!-- post date -->
                                <li class="list-inline-item mr-3 ml-0">{{ $update->date }}</li>
                                <!-- author -->
                            </ul>
                            <a href="blog-single.html">
                                <h4 class="card-title">{{ $update->heading}}</h4>
                            </a>
                            <p class="card-text">
                                {{ $update->content }}
                            </p>
                        </div>
                    </div>
                </article>
            @empty 

            @endforelse
        </div>
    </div>
</section>
<!-- /blog -->

<!-- events -->
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title justify-content-between">
                    <h2 class="mb-0 text-nowrap mr-3">Upcoming Events</h2>
                    <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                    <div>
                        <a href="events.html" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see
                            all</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- event -->
            <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                <div class="card border-0 rounded-0 hover-shadow">
                    <div class="card-img position-relative">
                        <img class="card-img-top rounded-0" src="storage/website/images/on.png" alt="event thumb" />
                        <div class="card-date"><span>13</span><br />May</div>
                    </div>
                    <div class="card-body">
                        <!-- location -->

                        <a href="event-single.html">
                            <h4 class="card-title">First year Registration</h4>
                        </a>
                    </div>
                </div>
            </div>
            <!-- event -->
            <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                <div class="card border-0 rounded-0 hover-shadow">
                    <div class="card-img position-relative">
                        <img class="card-img-top rounded-0" src="storage/website/images/on.png" alt="event thumb" />
                        <div class="card-date"><span>17</span><br />May</div>
                    </div>
                    <div class="card-body">
                        <!-- location -->

                        <a href="event-single.html">
                            <h4 class="card-title">Returning Student Registration</h4>
                        </a>
                    </div>
                </div>
            </div>
            <!-- event -->
            <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                <div class="card border-0 rounded-0 hover-shadow">
                    <div class="card-img position-relative">
                        <img class="card-img-top rounded-0" src="storage/website/images/g.png" alt="event thumb" />
                        <div class="card-date"><span>24</span><br />May</div>
                    </div>
                    <div class="card-body">
                        <!-- location -->

                        <a href="event-single.html">
                            <h4 class="card-title">10 Graduation Ceremony</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile see all button -->
        <div class="row">
            <div class="col-12 text-center">
                <a href="course.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
            </div>
        </div>
    </div>
</section>
<!-- /events -->
@endsection