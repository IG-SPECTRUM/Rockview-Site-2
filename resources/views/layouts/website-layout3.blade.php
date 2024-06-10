<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>
        @yield("title")
    </title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../assets/website/plugins/bootstrap/bootstrap.min.css" />
    <!-- slick slider -->
    <link rel="stylesheet" href="../../assets/website/plugins/slick/slick.css" />
    <!-- themefy-icon -->
    <link rel="stylesheet" href="../../assets/website/plugins/themify-icons/themify-icons.css" />
    <!-- animation css -->
    <link rel="stylesheet" href="../../assets/website/plugins/animate/animate.css" />
    <!-- aos -->
    <link rel="stylesheet" href="../../assets/website/plugins/aos/aos.css" />
    <!-- venobox popup -->
    <link rel="stylesheet" href="../../assets/website/plugins/venobox/venobox.css" />

    <!-- Main Stylesheet -->
    <link href="../../assets/website/css/style.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="icon" type="image" sizes="32x32" href="../../storage/website/images/sample_rockview.png">
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/58523b857295ad7394f2cab5/1eu0h24j4';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>
<style>
/* For Webkit browsers (Chrome, Safari) */
::-webkit-scrollbar {
    width: 12px;
    /* Adjust the width of the scrollbar */
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    /* Background of the scrollbar track */
}

::-webkit-scrollbar-thumb {
    background: green;
    /* Color of the scrollbar thumb */
    border-radius: 6px;
    /* Rounded corners for the scrollbar thumb */
}

::-webkit-scrollbar-thumb:hover {
    background: darkgreen;
    /* Color of the scrollbar thumb on hover */
}

/* For Mozilla Firefox */
html {
    scrollbar-width: thin;
    /* Makes the scrollbar thin */
    scrollbar-color: green #f1f1f1;
    /* Color of the scrollbar thumb and track */
}
</style>
<style>
.loader {
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    /* existing CSS */
    display: flex;
    flex-direction: row-reverse;
    /* add this line to stack the child elements vertically */
    align-items: center;
}

.loader .pulse {
    width: 30px;
    height: 60px;
    background-color: gold;
    border-radius: -50%;
    animation: loader 0.5s ease-in-out infinite;
}

.loader .pulse1 {
    width: 30px;
    height: 30px;
    background-color: green;
    border-radius: -50%;
    animation: loader 0.5s ease-in-out infinite;
}

.loader .pulse2 {
    width: 30px;
    height: 30px;
    background-color: black;
    border-radius: 50%;
    animation: loader 0.5s ease-in-out infinite;
}

@keyframes loader {
    0% {
        transform: scale(0);
        opacity: 0;
    }

    50% {
        transform: scale(1);
        opacity: 1;
    }

    100% {
        transform: scale(0);
        opacity: 0;
    }
}

p {
    margin-top: 20px;
    /* add this line to create some space between the pulses and the paragraph */
}
</style>

<body>
    <div class="loader">
        <div class="pulse"></div>
        <div class="pulse1"></div>
        <div>
            <img src="../../storage/website/images/sample_rockview.png" alt="logo" width="200" />

        </div>

    </div>
    @include("includes/website-navbar3")
    @yield("content")
    @include("includes/website-footer")
    <script>
    window.onload = function() {
        setTimeout(function() {
            document.querySelector(".loader").style.display = "none";
        }, 1600);
    }
    </script>

    <script>
    window.onload = function() {
        setTimeout(function() {
            document.querySelector(".loader").style.display = "none";
        }, 1600);
    }
    </script>



<!-- jQuery -->
<script src="../../assets/website/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="../../assets/website/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="../../assets/website/plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="../../assets/website/plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="../../assets/website/plugins/venobox/venobox.min.js"></script>
<!-- mixitup filter -->
<script src="../../assets/website/plugins/mixitup/mixitup.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
</script>
<script src="../../assets/website/plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="../../assets/website/js/script.js"></script>


</body>

</html>