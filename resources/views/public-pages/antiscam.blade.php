@extends("layouts/website-layout")
@section("title")
    Anti-scam
@endsection
@section("content")
<!-- page title -->
<section class="page-title-section overlay" data-background="storage/website/images/backgrounds/back.gif">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">ANTI SCAM
                            STATEMENT</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>

            </div>
        </div>
    </div>

</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title"></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">

                <div id="fh5co-course-categories" class="py-5">
                    <div class="container">
                        <div class="row animate-box">
                            <div class="col-md-12 text-center fh5co-heading">
                                <h3></h3>
                                <strong>We strictly prohibit any misuse of our logo and name for scams. Legal action
                                    will be taken against offenders.</strong>
                                <br>
                                <h4>LIST OF PHONE NUMBERS ASSOCIATED WITH ROCKVIEW UNIVERSITY ZAMBIA</h4>
                                <ul>
                                    <li class="bold-blue">+260973184161</li>
                                    <li class="bold-green">+260967976961</li>
                                    <li class="bold-orange">+260955151517</li>
                                </ul>
                                <ul>
                                    <li class="bold-blue">+260760900354</li>
                                    <li class="bold-green">+260771651211</li>
                                    <li class="bold-orange">+260763982271</li>
                                </ul>
                                <ul>
                                    <li class="bold-blue">+260771650791</li>
                                    <li class="bold-green">+260761745853</li>
                                    <li class="bold-orange">+260763984089</li>
                                </ul>
                                <ul>
                                    <li class="bold-green">+260763983102</li>
                                </ul>
                                <a href="mailto:info@rockview.ac.zm">
                                    <button class="button">REPORT A SCAM RELATING TO ROCKVIEW UNIVERSITY</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
            ul {
                list-style-type: none;
                padding: 0;
            }

            li {
                display: inline-block;
                margin-right: 10px;
            }

            .bold-blue {
                font-weight: bold;
                color: blue;
            }

            .bold-green {
                font-weight: bold;
                color: green;
            }

            .bold-orange {
                font-weight: bold;
                color: orange;
            }

            .normal {
                font-weight: normal;
                color: black;
            }

            .button {
                padding: 15px 30px;
                font-size: 18px;
                background-color: #ff0000;
                color: #ffffff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                animation: flash 1s infinite alternate;
            }

            @keyframes flash {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0.5;
                }
            }
            </style>
        </div>
    </div>
</section>
<!-- /contact -->


<!-- /gmap -->

@endsection