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
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="soe-01.html">School of Education</a></h3>
                            <p>Dedicated to nurturing the next generation of educators, facilitating research that
                                enhances the field of education, and collaborating with the broader community to improve
                                educational outcomes for all learners.</p>
                            <a href="soe-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="shs-01.php">School of Health Sciences</a></h3>
                            <p>Dedicated to educating future healthcare professionals, conducting impactful research,
                                and working collaboratively with healthcare organizations to improve the overall health
                                of individuals and communities.</p>
                            <a href="shs-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="sobs-01.php">School of Business Studies</a></h3>
                            <p>Dedicated to educating the next generation of business leaders, and fostering connections
                                with the business community to drive innovation and success in the world of commerce and
                                entrepreneurship.</p>
                            <a href="sobs-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="sot-01.php">School of Technology</a></h3>
                            <p>Dedicated to educating the next generation of professionals, and forging connections with
                                the tech industry to prepare students for successful careers in the fast-paced world of
                                technology.</p>
                            <a href="sot-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="sons-01.php">School of Natural Sciences</a></h3>
                            <p>Delve into foundational clinical science, diagnostic techniques, and patient care in our
                                comprehensive Diploma in Clinical Sciences General program. Equip yourself with
                                essential skills for diverse healthcare careers.</p>
                            <a href="sons-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="soa-01.php">School of Agricultural Sciences</a></h3>
                            <p>The School of Agricultural Science faculty educates future agricultural professionals,
                                conducts research to improve agricultural practices, and collaborates for sustainable
                                and responsible agriculture.</p>
                            <a href="soa-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="postgrad-01.php">School of Post Graduate Studies</a></h3>
                            <p>The faculty in the School of Post Graduate Studies aims to enrich graduate education,
                                empower students, and promote academic excellence and innovation.</p>
                            <a href="postgrad-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="cert-01.php">Short Courses</a></h3>
                            <p>Offering condensed, practical learning experiences in diverse fields such as auto
                                mechanics, power electrical for skills enhancement, professional development, and quick
                                knowledge acquisition.</p>
                            <a href="cert-01.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<hr>
<br>
<br>
<div class="container card border-black rounded-0 hover-shadow" style="background-color: #1f1b3c;">
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-unstyled">
                        <!-- notice item -->

                        <!-- notice item -->
                        <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                            <div class="d-md-table-cell text-center p-4  text-white mb-4 mb-md-0"
                                style="background-color: green;"><span class="h2 d-block"></span> DISTANCE LEARNING
                            </div>
                            <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                                <a href="notice-single.html" class="h4 mb-3 d-block">Distance learning programs require
                                    students to attend classes on campus for a fixed period during the year</a>
                                <p class="mb-0">Admissions at Rockview University on distance learning are as follows;
                                    April, August and December!</p>
                            </div>
                            <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="apply.php"
                                    class="btn btn-primary">Apply Now</a></div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div id="fh5co-course">
        <div class="container">
            <div class="row animate-box"></div>
            <div class="row">
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="soe-02.php">School of Education</a></h3>
                            <p>Dedicated to nurturing the next generation of educators, facilitating research that
                                enhances the field of education, and collaborating with the broader community to improve
                                educational outcomes for all learners.</p>
                            <a href="soe-02.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="shs-02.php">School of Health Sciences</a></h3>
                            <p>Dedicated to educating future healthcare professionals, conducting impactful research,
                                and working collaboratively with healthcare organizations to improve the overall health
                                of individuals and communities.</p>
                            <a href="shs-02.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="sobs-02.php">School of Business Studies</a></h3>
                            <p>Dedicated to educating the next generation of business leaders, and fostering connections
                                with the business community to drive innovation and success in the world of commerce and
                                entrepreneurship.</p>
                            <a href="sobs-02.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="sot-02.php">School of Technology</a></h3>
                            <p>Dedicated to educating the next generation of professionals, and forging connections with
                                the tech industry to prepare students for successful careers in the fast-paced world of
                                technology.</p>
                            <a href="sot-02.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="sons-02.php">School of Natural Sciences</a></h3>
                            <p>Delve into foundational clinical science, diagnostic techniques, and patient care in our
                                comprehensive Diploma in Clinical Sciences General program. Equip yourself with
                                essential skills for diverse healthcare careers.</p>
                            <a href="sons-02.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="soa-02.php">School of Agricultural Sciences</a></h3>
                            <p>The School of Agricultural Science faculty educates future agricultural professionals,
                                conducts research to improve agricultural practices, and collaborates for sustainable
                                and responsible agriculture.</p>
                            <a href="soa-02.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="postgrad-02.php">School of Post Graduate Studies</a></h3>
                            <p>The faculty in the School of Post Graduate Studies aims to enrich graduate education,
                                empower students, and promote academic excellence and innovation.</p>
                            <a href="postgrad-02.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="card border-primary rounded-0 hover-shadow">
                        <div class="card-body text-center">
                            <img src="storage/website/images/course.png" alt="">
                            <h3><a href="cert-02.php">Short Courses</a></h3>
                            <p>Offering condensed, practical learning experiences in diverse fields such as auto
                                mechanics, power electrical for skills enhancement, professional development, and quick
                                knowledge acquisition.</p>
                            <a href="cert-02.php" class="btn btn-primary btn-sm btn-course">View Programs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<br><br>

@include("includes/website-footer")