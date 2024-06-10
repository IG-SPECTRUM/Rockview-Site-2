@extends("layouts/website-layout")
@section("title")
    Our Programs
@endsection


<style>
.card {
    height: 100%;
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card img {
    max-width: 100%;
    height: auto;
}
</style>

@section("content")
<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/back.gif">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">ADMISSION
                            TYPES
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-light text-lg">Rockview University admission programs include full-time and distance
                    learning options. Full-time programs involve on-campus, immersive education, while distance learning
                    offers flexible, remote study, allowing students to balance education with other commitments..</p>

            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- contact -->


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled">
                    <!-- notice item -->
                    <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                        <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0"><span
                                class="h2 d-block"></span>FACULTIES</div>
                        <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                            <p class="mb-0"> Rockview University is a distinguished institution of higher learning known
                                for its commitment to academic excellence and innovation. Offering a diverse range of
                                programs, it prepares students for success in their chosen fields through quality
                                education and research opportunities. With a focus on fostering a vibrant academic
                                community, Rockview University is dedicated to nurturing the talents and aspirations of
                                its students while contributing to the advancement of knowledge in various disciplines.
                            </p>
                            </p>
                        </div>
                        <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="#all"
                                class="btn btn-primary">Scroll below</a></div>
                    </li>
                    <!-- notice item -->


                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container card border-black rounded-0 hover-shadow" style="background-color: #efe7e7;">
    <section class="section" id="all">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-unstyled">
                        <!-- notice item -->
                        <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                            <div class="d-md-table-cell text-center p-4  text-white mb-4 mb-md-0"
                                style="background-color: green;"><span class="h2 d-block"></span> FULL-TIME PROGRAMME
                            </div>
                            <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                                <a href="notice-single.html" class="h4 mb-3 d-block">Full-time programs require students
                                    to attend classes on campus for a fixed number of hours per week</a>
                                <p class="mb-0">Admissions at Rockview University on Full-time enrollment are as
                                    follows; January and June!</p>
                            </div>
                            <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="apply.php"
                                    class="btn btn-primary">Apply Now</a></div>
                        </li>
                        <!-- notice item -->


                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div id="fh5co-course">
        <div class="container">
            <div class="row animate-box"></div>
            <div class="row">
                @forelse($available_schools as $school)
                    <div class="col-md-4 animate-box">
                        <div class="card border-primary rounded-0 hover-shadow">
                            <div class="card-body text-center">
                                <img src="storage/website/images/course.png" alt="">
                                <h3><a href="soe-01.html">{{ $school->name }}</a></h3>
                                <a href="soe-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection