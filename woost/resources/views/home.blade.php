<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel</title>

<!-- Fonts -->
<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" /> -->

<!--====== Favicon Icon ======-->
<link
    rel="shortcut icon"
    href="assets/images/favicon.png"
    type="image/png" />

<!--====== Slick CSS ======-->
<!-- @vite('resources/assets/css/tiny-slider.css') -->
<link rel="stylesheet" href="assets/css/tiny-slider.css" />

<!--====== Line Icons CSS ======-->
<!-- @vite('resources/assets/css/lineicons.css') -->
<link rel="stylesheet" href="assets/css/lineicons.css" />

<!--====== Tailwind CSS ======-->
<link rel="stylesheet" href="assets/css/tailwindcss.css" />



</head>

<body>
    <!--====== HEADER PART START ======-->

    <section class="header_area">
        <div class="navbar-area fixed top-0 left-0 w-full z-20 transition-all duration-[300ms]">
            <div class="container px-4 relative">
                <div class="flex flex-wrap items-center">
                    <div class="w-full">
                        <nav class="flex items-center justify-between navbar-nav py-3 navbar navbar-expand-lg
                ">
                            <a class="navbar-brand mr-5" href="index.html">
                                <img src="assets/images/logo.svg" alt="Logo" />
                            </a>

                            <button
                                class="block navbar-toggler focus:outline-none lg:hidden">
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                            </button>

                            <div class="absolute left-0 z-20 hidden w-full px-5 py-3 duration-[300ms] lg:w-auto lg:block top-full mt-full lg:static  shadow lg:shadow-none"
                            id="navbarOne">
                                <ul id="nav" class="items-center content-start mr-auto lg:justify-end navbar-nav lg:flex
                    ">
                                    <li class="nav-item ml-5 lg:ml-[44px]">
                                        <a class="page-scroll active" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item ml-5 lg:ml-[44px]">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <li class="nav-item ml-5 lg:ml-[44px]">
                                        <a class="page-scroll" href="#services">Services</a>
                                    </li>
                                    <li class="nav-item ml-5 lg:ml-[44px]">
                                        <a class="page-scroll" href="#work">Projects</a>
                                    </li>
                                    <li class="nav-item ml-5 lg:ml-[44px]">
                                        <a class="page-scroll" href="#pricing">Pricing</a>
                                    </li>
                                    <li class="nav-item ml-5 lg:ml-[44px]">
                                        <a class="page-scroll" href="#blog">Blog</a>
                                    </li>
                                    <li class="nav-item ml-5 lg:ml-[44px]">
                                        <a class="page-scroll" href="#contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar collapse -->
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- header navbar -->

        <div
            id="home"
            class="
          header_hero
          bg-[#FBFBFF]
          relative
          z-10
          overflow-hidden
          lg:flex
          items-center
          h-[800px] h:2xl-[900px]
        ">
            <div class="absolute opacity-40 z-[-10] top-[150] left-[10%]">
                <img src="assets/images/shape/shape-1.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] top-[150] left-[30%]">
                <img src="assets/images/shape/shape-2.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] top-[200] left-[40%]">
                <img src="assets/images/shape/shape-3.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] top-[120px] left-[50%]">
                <img src="assets/images/shape/shape-4.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] top-[34%] left-[48%]">
                <img src="assets/images/shape/shape-1.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] top-[60%] left-[80px]">
                <img src="assets/images/shape/shape-4.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] top-[55%] left-[38%]">
                <img src="assets/images/shape/shape-3.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] bottom-[25px] left-[13%]">
                <img src="assets/images/shape/shape-2.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] bottom-[200] left-1/4">
                <img src="assets/images/shape/shape-4.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] bottom-20 left-[35%]">
                <img src="assets/images/shape/shape-1.svg" alt="shape" />
            </div>
            <!-- hero shape -->
            <div class="absolute opacity-40 z-[-10] bottom-1/4 left-[42%]">
                <img src="assets/images/shape/shape-2.svg" alt="shape" />
            </div>
            <!-- hero shape -->

            <div class="container px-4">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2">
                        <div class="header_hero_content pt-[160px] lg:pt-0">
                            <h2
                                class="
                    hero_title
                    text-[#38424D] text-[32px]
                    sm:text-[42px]
                    md:text-[55px]
                    lg:text-[42px]
                    xl:text-[55px]
                    font-extrabold
                    leading-snug
                  ">
                                Creative Multipurpose Tailwind CSS
                                <span class="text-[#F94F4F]">Template</span>
                            </h2>
                            <p class="mt-8 max-w-[525px] md:text-lg">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                diam nonumy eirmod tempor invidunt ut labore et dolore magna.
                            </p>
                            <div class="hero_btn mt-10">
                                <a class="main-btn" href="javascript:void(0)">Get Started</a>
                            </div>
                        </div>
                        <!-- header hero content -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
            <div
                class="
            header_shape
            absolute
            top-0
            right-0
            h-full
            w-1/2
            hidden
            lg:block
          "></div>

            <div
                class="
            header_image
            flex
            items-center
            lg:absolute
            top-0
            right-0
            w-full
            lg:w-1/2
            h-auto
            lg:h-full
            mx-auto
            mt-[52px]
            lg:mt-0
            px-5
            lg:px-0
          ">
                <div class="image 2xl:pl-25">
                    <img
                        src="assets/images/header-image.svg"
                        alt="Header Image"
                        class="max-w-full lg:w-auto xl:max-w-screen-md" />
                </div>
            </div>
            <!-- header image -->
        </div>
        <!-- header hero -->
    </section>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section class="services_area pt-[80px] md:pt-[120px]" id="about">
        <div class="container px-4">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-1/2">
                    <div class="section_title text-center pb-6">
                        <h5 class="text-base md:text-xl font-semibold text-[#F94F4F]">
                            About
                        </h5>
                        <h4 class="text-[#38424D] text-2xl md:text-4xl font-bold mt-4">
                            Work Process
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="flex flex-wrap justify-center">
                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-write"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-3xl
                  ">
                                Research
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>
                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-bulb"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-3xl
                  ">
                                Prototype
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>
                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-checkmark-circle"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-3xl
                  ">
                                Build
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="why" class="about_area pt-[80px] md:pt-[120px] relative">
        <div
            class="
          about_image
          flex
          items-end
          justify-end
          lg:absolute
          top-0
          left-0
          w-full
          lg:w-1/2
          h-auto
          lg:h-full
          mx-auto
          mt-[52px]
          px-5
          lg:px-0
        ">
            <div class="image lg:pr-[52px]">
                <img
                    src="assets/images/about.svg"
                    alt="about"
                    class="max-w-full lg:w-auto lg:max-w-screen-md" />
            </div>
        </div>
        <!-- about image -->
        <div class="container px-4">
            <div class="flex flex-wrap justify-end">
                <div class="w-full lg:w-1/2">
                    <div class="about_content mx-4 pt-[44px] lg:pt-[60px] lg:pb-[60px]">
                        <div class="section_title pb-[36px]">
                            <h5 class="text-base md:text-xl font-semibold text-[#F94F4F]">
                                Why Choose Us
                            </h5>
                            <h4 class="text-[#38424D] text-2xl md:text-4xl font-bold mt-4">
                                Your Goal is Our Achievement
                            </h4>
                        </div>
                        <!-- section title -->
                        <p>
                            Nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                            erat sed diam voluptua. At vero eos et accusam et justo duo
                            dolores et rebum. Stet clita kasd gubergren, no sea takimata
                            sanctus.
                        </p>
                        <ul class="about_list pt-3">
                            <li class="flex mt-5">
                                <div class="about_check">
                                    <i
                                        class="
                        lni lni-checkmark-circle
                        w-7
                        h-7
                        flex
                        items-center
                        justify-center
                        text-white
                        bg-[#F94F4F]
                        rounded-full
                        text-base
                        mt-1
                      ">
                                    </i>
                                </div>
                                <div class="about_list_content pl-5 pr-2">
                                    <p>
                                        Vero eos et accusam et justo duo dolores et rebum. Stet
                                        clita kasd gubergrenv
                                    </p>
                                </div>
                            </li>
                            <li class="flex mt-5">
                                <div class="about_check">
                                    <i
                                        class="
                        lni lni-checkmark-circle
                        w-7
                        h-7
                        flex
                        items-center
                        justify-center
                        text-white
                        bg-[#F94F4F]
                        rounded-full
                        text-base
                        mt-1
                      ">
                                    </i>
                                </div>
                                <div class="about_list_content pl-5 pr-2">
                                    <p>
                                        At vero eos et accusam et justo duo dolores et rebum. Stet
                                        clita kasd gubergrenv
                                    </p>
                                </div>
                            </li>
                            <li class="flex mt-5">
                                <div class="about_check">
                                    <i
                                        class="
                        lni lni-checkmark-circle
                        w-7
                        h-7
                        flex
                        items-center
                        justify-center
                        text-white
                        bg-[#F94F4F]
                        rounded-full
                        text-base
                        mt-1
                      ">
                                    </i>
                                </div>
                                <div class="about_list_content pl-5 pr-2">
                                    <p>
                                        Dvero eos et accusam et justo duo dolores et rebum. Stet
                                        clita kasd gubergrenv
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- about content -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section
        id="services"
        class="services_area pt-[80px] md:pt-[120px] pb-[80px] md:pb-[120px]">
        <div class="container px-4">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-1/2">
                    <div class="section_title text-center pb-6">
                        <h5 class="text-base md:text-xl font-semibold text-[#F94F4F]">
                            What We Do
                        </h5>
                        <h4 class="text-[#38424D] text-2xl md:text-4xl font-bold mt-4">
                            Our Services
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="flex flex-wrap justify-center">
                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-layout"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5 xl:mt-10">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-2xl
                    lg:text-xl
                    xl:text-3xl
                  ">
                                Web Design
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>

                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-bullhorn"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5 xl:mt-10">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-2xl
                    lg:text-xl
                    xl:text-3xl
                  ">
                                Digital Marketing
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>

                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-mobile"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5 xl:mt-10">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-2xl
                    lg:text-xl
                    xl:text-3xl
                  ">
                                Mobile Apps
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>

                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-seo"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5 xl:mt-10">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-2xl
                    lg:text-xl
                    xl:text-3xl
                  ">
                                SEO Consultancy
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>

                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-layers"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5 xl:mt-10">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-2xl
                    lg:text-xl
                    xl:text-3xl
                  ">
                                Graphic Design
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>

                <div class="w-full sm:w-10/12 md:w-6/12 lg:w-4/12">
                    <div class="single_service group">
                        <div class="relative inline-block">
                            <i class="group-hover:text-white lni lni-briefcase"> </i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="94"
                                height="92"
                                viewBox="0 0 94 92">
                                <path
                                    class="
                      fill-[#fff1f1]
                      group-hover:fill-[#f94f4f]
                      transition-all
                      duration-300
                    "
                                    id="Polygon_12"
                                    data-name="Polygon 12"
                                    d="M42.212,2.315a11,11,0,0,1,9.576,0l28.138,13.6a11,11,0,0,1,5.938,7.465L92.83,54.018A11,11,0,0,1,90.717,63.3L71.22,87.842A11,11,0,0,1,62.607,92H31.393a11,11,0,0,1-8.613-4.158L3.283,63.3A11,11,0,0,1,1.17,54.018L8.136,23.383a11,11,0,0,1,5.938-7.465Z" />
                            </svg>
                        </div>
                        <div class="services_content mt-5 xl:mt-10">
                            <h3
                                class="
                    services_title
                    text-[#38424D]
                    font-semibold
                    text-xl
                    md:text-2xl
                    lg:text-xl
                    xl:text-3xl
                  ">
                                Business Consultancy
                            </h3>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consetetur sadi aliquyam erat, sed
                                diam voluptua. At vero eos accusam et justo duo dolores
                            </p>
                        </div>
                    </div>
                    <!-- single services -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== WORK PART START ======-->

    <section
        id="work"
        class="
        work_area
        bg-[#FBFBFF]
        pt-[80px]
        md:pt-[120px]
        pb-[80px]
        md:pb-[120px]
      ">
        <div class="container px-4">
            <div class="flex flex-wrap justify-center">
                <div class="w-ull lg:w-1/2">
                    <div class="section_title text-center pb-6">
                        <h5 class="text-base md:text-xl font-semibold text-[#F94F4F]">
                            Works
                        </h5>
                        <h4 class="text-[#38424D] text-2xl md:text-4xl font-bold mt-4">
                            Some of Our Recent Works
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
        <div class="container px-4-fluid">
            <div class="work_wrapper relative">
                <div class="flex flex-wrap work_active">
                    <div class="w-full lg:w-3/12">
                        <div class="max-w-[370px] mx-auto">
                            <div
                                class="rounded-xl overflow-hidden my-8 bg-white shadow mx-3">
                                <div class="work_image">
                                    <img
                                        src="assets/images/work-1.jpg"
                                        alt="work"
                                        class="w-full" />
                                </div>
                                <div class="p-7 relative">
                                    <a
                                        href="javascript:void(0)"
                                        class="
                        w-11
                        h-11
                        flex
                        items-center
                        justify-center
                        rounded-full
                        text-lg text-[#38424D]
                        absolute
                        -top-5
                        right-7
                        bg-white
                        transition-all
                        duration-300
                        shadow
                        hover:bg-[#f94f4f] hover:text-white
                      ">
                                        <i class="lni lni-chevron-right"> </i>
                                    </a>
                                    <h4 class="work_title text-xl md:text-2xl">
                                        <a
                                            href="javascript:void(0)"
                                            class="text-[#38424d] hover:text-[#f94f4f]">
                                            Marketing
                                        </a>
                                    </h4>
                                    <p class="mt-2">NoCodeAPI</p>
                                </div>
                            </div>
                        </div>
                        <!-- single work -->
                    </div>
                    <div class="w-full lg:w-3/12">
                        <div class="max-w-[370px] mx-auto">
                            <div
                                class="rounded-xl overflow-hidden my-8 bg-white shadow mx-3">
                                <div class="work_image">
                                    <img
                                        src="assets/images/work-2.jpg"
                                        alt="work"
                                        class="w-full" />
                                </div>
                                <div class="p-7 relative">
                                    <a
                                        href="javascript:void(0)"
                                        class="
                        w-11
                        h-11
                        flex
                        items-center
                        justify-center
                        rounded-full
                        text-lg text-[#38424D]
                        absolute
                        -top-5
                        right-7
                        bg-white
                        transition-all
                        duration-300
                        shadow
                        hover:bg-[#f94f4f] hover:text-white
                      ">
                                        <i class="lni lni-chevron-right"> </i>
                                    </a>
                                    <h4 class="work_title text-xl md:text-2xl">
                                        <a
                                            href="javascript:void(0)"
                                            class="text-[#38424d] hover:text-[#f94f4f]">
                                            Creative Design
                                        </a>
                                    </h4>
                                    <p class="mt-2">UIdeck</p>
                                </div>
                            </div>
                        </div>
                        <!-- single work -->
                    </div>
                    <div class="w-full lg:w-3/12">
                        <div class="max-w-[370px] mx-auto">
                            <div
                                class="rounded-xl overflow-hidden my-8 bg-white shadow mx-3">
                                <div class="work_image">
                                    <img
                                        src="assets/images/work-3.jpg"
                                        alt="work"
                                        class="w-full" />
                                </div>
                                <div class="p-7 relative">
                                    <a
                                        href="javascript:void(0)"
                                        class="
                        w-11
                        h-11
                        flex
                        items-center
                        justify-center
                        rounded-full
                        text-lg text-[#38424D]
                        absolute
                        -top-5
                        right-7
                        bg-white
                        transition-all
                        duration-300
                        shadow
                        hover:bg-[#F94F4F] hover:text-white
                      ">
                                        <i class="lni lni-chevron-right"> </i>
                                    </a>
                                    <h4 class="work_title text-xl md:text-2xl xl:text-xl">
                                        <a
                                            href="javascript:void(0)"
                                            class="text-[#38424d] hover:text-[#f94f4f]">
                                            Web Design
                                        </a>
                                    </h4>
                                    <p class="mt-2">GrayGrids</p>
                                </div>
                            </div>
                        </div>
                        <!-- single work -->
                    </div>
                    <div class="w-full lg:w-3/12">
                        <div class="max-w-[370px] mx-auto">
                            <div
                                class="rounded-xl overflow-hidden my-8 bg-white shadow mx-3">
                                <div class="work_image">
                                    <img
                                        src="assets/images/work-4.jpg"
                                        alt="work"
                                        class="w-full" />
                                </div>
                                <div class="p-7 relative">
                                    <a
                                        href="javascript:void(0)"
                                        class="
                        w-11
                        h-11
                        flex
                        items-center
                        justify-center
                        rounded-full
                        text-lg text-[#38424D]
                        absolute
                        -top-5
                        right-7
                        bg-white
                        transition-all
                        duration-300
                        shadow
                        hover:bg-[#f94f4f] hover:text-white
                      ">
                                        <i class="lni lni-chevron-right"> </i>
                                    </a>
                                    <h4 class="work_title text-xl md:text-2xl">
                                        <a
                                            href="javascript:void(0)"
                                            class="text-[#38424d] hover:text-[#f94f4f]">
                                            Analysis
                                        </a>
                                    </h4>
                                    <p class="mt-2">Ayro UI</p>
                                </div>
                            </div>
                        </div>
                        <!-- single work -->
                    </div>
                    <div class="w-full lg:w-3/12">
                        <div class="max-w-[370px] mx-auto">
                            <div
                                class="rounded-xl overflow-hidden my-8 bg-white shadow mx-3">
                                <div class="work_image">
                                    <img
                                        src="assets/images/work-5.jpg"
                                        alt="work"
                                        class="w-full" />
                                </div>
                                <div class="p-7 relative">
                                    <a
                                        href="javascript:void(0)"
                                        class="
                        w-11
                        h-11
                        flex
                        items-center
                        justify-center
                        rounded-full
                        text-lg text-[#38424D]
                        absolute
                        -top-5
                        right-7
                        bg-white
                        transition-all
                        duration-300
                        shadow
                        hover:bg-[#f94f4f] hover:text-white
                      ">
                                        <i class="lni lni-chevron-right"> </i>
                                    </a>
                                    <h4 class="work_title text-xl md:text-2xl">
                                        <a
                                            href="javascript:void(0)"
                                            class="text-[#38424d] hover:text-[#f94f4f]">
                                            SMM
                                        </a>
                                    </h4>
                                    <p class="mt-2">LineIcons</p>
                                </div>
                            </div>
                        </div>
                        <!-- single work -->
                    </div>
                    <div class="w-full lg:w-3/12">
                        <div class="max-w-[370px] mx-auto">
                            <div
                                class="rounded-xl overflow-hidden my-8 bg-white shadow mx-3">
                                <div class="work_image">
                                    <img
                                        src="assets/images/work-2.jpg"
                                        alt="work"
                                        class="w-full" />
                                </div>
                                <div class="p-7 relative">
                                    <a
                                        href="javascript:void(0)"
                                        class="
                        w-11
                        h-11
                        flex
                        items-center
                        justify-center
                        rounded-full
                        text-lg text-[#38424D]
                        absolute
                        -top-5
                        right-7
                        bg-white
                        transition-all
                        duration-300
                        shadow
                        hover:bg-[#f94f4f] hover:text-white
                      ">
                                        <i class="lni lni-chevron-right"> </i>
                                    </a>
                                    <h4 class="work_title text-xl md:text-2xl">
                                        <a
                                            href="javascript:void(0)"
                                            class="text-[#38424d] hover:text-[#f94f4f]">
                                            SEO
                                        </a>
                                    </h4>
                                    <p class="mt-2">PageBulb</p>
                                </div>
                            </div>
                        </div>
                        <!-- single work -->
                    </div>
                    <div class="w-full lg:w-3/12">
                        <div class="max-w-[370px] mx-auto">
                            <div
                                class="rounded-xl overflow-hidden my-8 bg-white shadow mx-3">
                                <div class="work_image">
                                    <img
                                        src="assets/images/work-4.jpg"
                                        alt="work"
                                        class="w-full" />
                                </div>
                                <div class="p-7 relative">
                                    <a
                                        href="javascript:void(0)"
                                        class="
                        w-11
                        h-11
                        flex
                        items-center
                        justify-center
                        rounded-full
                        text-lg text-[#38424D]
                        absolute
                        -top-5
                        right-7
                        bg-white
                        transition-all
                        duration-300
                        shadow
                        hover:bg-[#f94f4f] hover:text-white
                      ">
                                        <i class="lni lni-chevron-right"> </i>
                                    </a>
                                    <h4 class="work_title text-xl md:text-2xl">
                                        <a
                                            href="javascript:void(0)"
                                            class="text-[#38424d] hover:text-[#f94f4f]">
                                            Mobile App
                                        </a>
                                    </h4>
                                    <p class="mt-2">Rocket Internet LTD</p>
                                </div>
                            </div>
                        </div>
                        <!-- single work -->
                    </div>
                </div>
                <!-- row -->
            </div>
        </div>
        <!-- container -->
    </section>

    <!--====== WORK PART ENDS ======-->

    <!--====== PRICING PLAN PART START ======-->

    <section
        id="pricing"
        class="pricing_area pt-[80px] md:pt-[120px] pb-[80px] md:pb-[120px]">
        <div class="container px-4">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-1/2">
                    <div class="section_title text-center pb-6">
                        <h5 class="text-base md:text-xl font-semibold text-[#F94F4F]">
                            Pricing Plans
                        </h5>
                        <h4 class="text-[#38424D] text-2xl md:text-4xl font-bold mt-4">
                            Choose Your Plan
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="flex flex-wrap">
                <div class="w-full">
                    <div class="pricing_menu mt-8 pb-8">
                        <ul class="flex justify-center">
                            <li class="nav-item">
                                <button
                                    class="
                      active
                      bg-[#FBFBFF]
                      text-[#747E88]
                      py-3
                      px-8
                      rounded-tl-full rounded-bl-full
                    "
                                    data-tab-target="#monthlyPlan">
                                    Monthly
                                </button>
                            </li>
                            <li class="nav-item">
                                <button
                                    class="
                      bg-[#FBFBFF]
                      text-[#747E88]
                      py-3
                      px-8
                      rounded-tr-full rounded-br-full
                    "
                                    data-tab-target="#yearlyPlan">
                                    Yearly
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- pricing menu -->

                    <div class="pricing_content mt-6_area">
                        <div class="tab-content">
                            <div class="active tab-pane" id="monthlyPlan" data-tab-content>
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full sm:w-9/12 md:w-7/12 lg:w-4/12">
                                        <div
                                            class="
                          single_pricing
                          border-2 border-dashed border-[#E8E8E8]
                          rounded-xl
                          p-6
                          md:p-10
                          transition-all
                          duration-300
                          group
                          hover:border-[#f94f4f] hover:shadow
                          text-center
                          mt-8
                          mx-3
                        ">
                                            <div class="pricing_title relative inline-block">
                                                <h4
                                                    class="
                              absolute
                              top-1/2
                              left-1/2
                              transform
                              -translate-x-1/2 -translate-y-1/2
                              font-semibold
                              text-xl text-[#f94f4f]
                              transition-all
                              duration-300
                              group-hover:text-white
                            ">
                                                    Basic
                                                </h4>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="112"
                                                    height="110"
                                                    viewBox="0 0 112 110">
                                                    <path
                                                        class="
                                services_shape
                                fill-[#fff1f1]
                                group-hover:fill-[#f94f4f]
                                transition-all
                                duration-300
                              "
                                                        id="Polygon_15"
                                                        data-name="Polygon 15"
                                                        d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" />
                                                </svg>
                                            </div>
                                            <div class="pricing_content mt-6">
                                                <span
                                                    class="
                              pricing_price
                              font-bold
                              text-[#38424D] text-4xl
                            ">
                                                    $19.00</span>
                                                <p class="mt-4 leading-[36px]">
                                                    Lorem ipsum dolor sit am consetetur sadi aliquyam
                                                    erat sed diam voluptua vero eos accusam et justo duo
                                                    dolores
                                                </p>
                                                <a
                                                    href="javascript:void(0)"
                                                    class="main-btn pricing_btn">
                                                    Choose Plan
                                                </a>
                                            </div>
                                        </div>
                                        <!-- single pricing -->
                                    </div>

                                    <div class="w-full sm:w-9/12 md:w-7/12 lg:w-4/12">
                                        <div
                                            class="
                          active
                          single_pricing
                          border-2 border-dashed border-[#E8E8E8]
                          rounded-xl
                          p-6
                          md:p-10
                          transition-all
                          duration-300
                          group
                          hover:border-[#f94f4f] hover:shadow
                          text-center
                          mt-8
                          mx-3
                          active
                        ">
                                            <div class="pricing_title relative inline-block">
                                                <h4
                                                    class="
                              absolute
                              top-1/2
                              left-1/2
                              transform
                              -translate-x-1/2 -translate-y-1/2
                              font-semibold
                              text-xl text-white
                              transition-all
                              duration-300
                              group-hover:text-white
                            ">
                                                    Standard
                                                </h4>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="112"
                                                    height="110"
                                                    viewBox="0 0 112 110">
                                                    <path
                                                        class="
                                services_shape
                                fill-[#fff1f1]
                                group-hover:fill-[#f94f4f]
                                transition-all
                                duration-300
                              "
                                                        id="Polygon_15"
                                                        data-name="Polygon 15"
                                                        d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" />
                                                </svg>
                                            </div>
                                            <div class="pricing_content mt-6">
                                                <span
                                                    class="
                              pricing_price
                              font-bold
                              text-[#38424D] text-4xl
                            ">
                                                    $39.00</span>
                                                <p class="mt-4 leading-[36px]">
                                                    Lorem ipsum dolor sit am consetetur sadi aliquyam
                                                    erat sed diam voluptua vero eos accusam et justo duo
                                                    dolores
                                                </p>
                                                <a
                                                    href="javascript:void(0)"
                                                    class="main-btn pricing_btn">
                                                    Choose Plan
                                                </a>
                                            </div>
                                        </div>
                                        <!-- single pricing -->
                                    </div>

                                    <div class="w-full sm:w-9/12 md:w-7/12 lg:w-4/12">
                                        <div
                                            class="
                          single_pricing
                          border-2 border-dashed border-[#E8E8E8]
                          rounded-xl
                          p-6
                          md:p-10
                          transition-all
                          duration-300
                          group
                          hover:border-[#f94f4f] hover:shadow
                          text-center
                          mt-8
                          mx-3
                        ">
                                            <div class="pricing_title relative inline-block">
                                                <h4
                                                    class="
                              absolute
                              top-1/2
                              left-1/2
                              transform
                              -translate-x-1/2 -translate-y-1/2
                              font-semibold
                              text-xl text-[#f94f4f]
                              transition-all
                              duration-300
                              group-hover:text-white
                            ">
                                                    Premium
                                                </h4>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="112"
                                                    height="110"
                                                    viewBox="0 0 112 110">
                                                    <path
                                                        class="
                                services_shape
                                fill-[#fff1f1]
                                group-hover:fill-[#f94f4f]
                                transition-all
                                duration-300
                              "
                                                        id="Polygon_15"
                                                        data-name="Polygon 15"
                                                        d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" />
                                                </svg>
                                            </div>
                                            <div class="pricing_content mt-6">
                                                <span
                                                    class="
                              pricing_price
                              font-bold
                              text-[#38424D] text-4xl
                            ">
                                                    $99.00</span>
                                                <p class="mt-4 leading-[36px]">
                                                    Lorem ipsum dolor sit am consetetur sadi aliquyam
                                                    erat sed diam voluptua vero eos accusam et justo duo
                                                    dolores
                                                </p>
                                                <a
                                                    href="javascript:void(0)"
                                                    class="main-btn pricing_btn">
                                                    Choose Plan
                                                </a>
                                            </div>
                                        </div>
                                        <!-- single pricing -->
                                    </div>
                                </div>
                                <!-- row -->
                            </div>
                            <div class="tab-pane" id="yearlyPlan" data-tab-content>
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full sm:w-9/12 md:w-7/12 lg:w-4/12">
                                        <div
                                            class="
                          single_pricing
                          border-2 border-dashed border-[#E8E8E8]
                          rounded-xl
                          p-6
                          md:p-10
                          transition-all
                          duration-300
                          group
                          hover:border-[#f94f4f] hover:shadow
                          text-center
                          mt-8
                          mx-3
                        ">
                                            <div class="pricing_title relative inline-block">
                                                <h4
                                                    class="
                              absolute
                              top-1/2
                              left-1/2
                              transform
                              -translate-x-1/2 -translate-y-1/2
                              font-semibold
                              text-xl text-[#f94f4f]
                              transition-all
                              duration-300
                              group-hover:text-white
                            ">
                                                    Basic
                                                </h4>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="112"
                                                    height="110"
                                                    viewBox="0 0 112 110">
                                                    <path
                                                        class="
                                services_shape
                                fill-[#fff1f1]
                                group-hover:fill-[#f94f4f]
                                transition-all
                                duration-300
                              "
                                                        id="Polygon_15"
                                                        data-name="Polygon 15"
                                                        d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" />
                                                </svg>
                                            </div>
                                            <div class="pricing_content mt-6">
                                                <span
                                                    class="
                              pricing_price
                              font-bold
                              text-[#38424D] text-4xl
                            ">
                                                    $99.00</span>
                                                <p class="mt-4 leading-[36px]">
                                                    Lorem ipsum dolor sit am consetetur sadi aliquyam
                                                    erat sed diam voluptua vero eos accusam et justo duo
                                                    dolores
                                                </p>
                                                <a
                                                    href="javascript:void(0)"
                                                    class="main-btn pricing_btn">
                                                    Choose Plan
                                                </a>
                                            </div>
                                        </div>
                                        <!-- single pricing -->
                                    </div>

                                    <div class="w-full sm:w-9/12 md:w-7/12 lg:w-4/12">
                                        <div
                                            class="
                          single_pricing
                          active
                          border-2 border-dashed border-[#E8E8E8]
                          rounded-xl
                          p-6
                          md:p-10
                          transition-all
                          duration-300
                          group
                          hover:border-[#f94f4f] hover:shadow
                          text-center
                          mt-8
                          mx-3
                          active
                        ">
                                            <div class="pricing_title relative inline-block">
                                                <h4
                                                    class="
                              absolute
                              top-1/2
                              left-1/2
                              transform
                              -translate-x-1/2 -translate-y-1/2
                              font-semibold
                              text-xl text-white
                              transition-all
                              duration-300
                              group-hover:text-white
                            ">
                                                    Standard
                                                </h4>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="112"
                                                    height="110"
                                                    viewBox="0 0 112 110">
                                                    <path
                                                        class="
                                services_shape
                                fill-[#fff1f1]
                                group-hover:fill-[#f94f4f]
                                transition-all
                                duration-300
                              "
                                                        id="Polygon_15"
                                                        data-name="Polygon 15"
                                                        d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" />
                                                </svg>
                                            </div>
                                            <div class="pricing_content mt-6">
                                                <span
                                                    class="
                              pricing_price
                              font-bold
                              text-[#38424D] text-4xl
                            ">
                                                    $199.00</span>
                                                <p class="mt-4 leading-[36px]">
                                                    Lorem ipsum dolor sit am consetetur sadi aliquyam
                                                    erat sed diam voluptua vero eos accusam et justo duo
                                                    dolores
                                                </p>
                                                <a
                                                    href="javascript:void(0)"
                                                    class="main-btn pricing_btn">
                                                    Choose Plan
                                                </a>
                                            </div>
                                        </div>
                                        <!-- single pricing -->
                                    </div>

                                    <div class="w-full sm:w-9/12 md:w-7/12 lg:w-4/12">
                                        <div
                                            class="
                          single_pricing
                          border-2 border-dashed border-[#E8E8E8]
                          rounded-xl
                          p-6
                          md:p-10
                          transition-all
                          duration-300
                          group
                          hover:border-[#f94f4f] hover:shadow
                          text-center
                          mt-8
                          mx-3
                        ">
                                            <div class="pricing_title relative inline-block">
                                                <h4
                                                    class="
                              absolute
                              top-1/2
                              left-1/2
                              transform
                              -translate-x-1/2 -translate-y-1/2
                              font-semibold
                              text-xl text-[#f94f4f]
                              transition-all
                              duration-300
                              group-hover:text-white
                            ">
                                                    Premium
                                                </h4>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="112"
                                                    height="110"
                                                    viewBox="0 0 112 110">
                                                    <path
                                                        class="
                                services_shape
                                fill-[#fff1f1]
                                group-hover:fill-[#f94f4f]
                                transition-all
                                duration-300
                              "
                                                        id="Polygon_15"
                                                        data-name="Polygon 15"
                                                        d="M51.2,2.329a11,11,0,0,1,9.6,0L96.15,19.478a11,11,0,0,1,5.927,7.466l8.76,38.665a11,11,0,0,1-2.1,9.258l-24.508,30.96A11,11,0,0,1,75.6,110H36.4a11,11,0,0,1-8.625-4.173L3.266,74.867a11,11,0,0,1-2.1-9.258l8.76-38.665a11,11,0,0,1,5.927-7.466Z" />
                                                </svg>
                                            </div>
                                            <div class="pricing_content mt-6">
                                                <span
                                                    class="
                              pricing_price
                              font-bold
                              text-[#38424D] text-4xl
                            ">
                                                    $499.00</span>
                                                <p class="mt-4 leading-[36px]">
                                                    Lorem ipsum dolor sit am consetetur sadi aliquyam
                                                    erat sed diam voluptua vero eos accusam et justo duo
                                                    dolores
                                                </p>
                                                <a
                                                    href="javascript:void(0)"
                                                    class="main-btn pricing_btn">
                                                    Choose Plan
                                                </a>
                                            </div>
                                        </div>
                                        <!-- single pricing -->
                                    </div>
                                </div>
                                <!-- row -->
                            </div>
                        </div>
                    </div>
                    <!-- pricing menu -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== PRICING PLAN PART ENDS ======-->

    <!--====== TEAM PART START ======-->

    <section
        id="team"
        class="
        team_area
        bg-[#FBFBFF]
        pt-[80px]
        md:pt-[120px]
        pb-[80px]
        md:pb-[120px]
      ">
        <div class="container px-4">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-1/2">
                    <div class="section_title text-center pb-6">
                        <h5 class="text-base md:text-xl font-semibold text-[#F94F4F]">
                            Team
                        </h5>
                        <h4 class="text-[#38424D] text-2xl md:text-4xl font-bold mt-4">
                            Meet Our Team Members
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="team-wrapper relative">
                <div class="flex flex-wrap team_active">
                    <div class="w-full lg:w-4/12">
                        <div class="single_team_item max-w-[405px] mx-auto">
                            <div
                                class="
                    shadow
                    rounded-xl
                    my-8
                    overflow-hidden
                    bg-white
                    transition-all
                    duration-300
                    group
                    hover:bg-[#f94f4f]
                    mx-3
                    group
                  ">
                                <div class="team_image relative">
                                    <img
                                        src="assets/images/team-1.jpg"
                                        alt="team"
                                        class="w-full" />
                                    <ul class="social absolute z-10 top-4 right-8">
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-facebook-filled"> </i>
                                            </a>
                                        </li>
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-twitter-filled"> </i>
                                            </a>
                                        </li>
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-linkedin-original"> </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team_content py-5 px-8 relative">
                                    <h4
                                        class="
                        team_name
                        text-xl
                        md:text-2xl
                        text-[#38424D]
                        group-hover:text-white
                      ">
                                        Chris Dave
                                    </h4>
                                    <p
                                        class="
                        mt-2
                        transition-all
                        duration-[300ms]
                        group-hover:text-white
                      ">
                                        Founder and CEO
                                    </p>
                                </div>
                            </div>
                            <!-- single team -->
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12">
                        <div class="single_team_item max-w-[405px] mx-auto">
                            <div
                                class="
                    shadow
                    rounded-xl
                    my-8
                    overflow-hidden
                    bg-white
                    transition-all
                    duration-300
                    group
                    hover:bg-[#f94f4f]
                    mx-3
                    group
                  ">
                                <div class="team_image relative">
                                    <img
                                        src="assets/images/team-3.jpg"
                                        alt="team"
                                        class="w-full" />
                                    <ul class="social absolute z-10 top-4 right-8">
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-facebook-filled"> </i>
                                            </a>
                                        </li>
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-twitter-filled"> </i>
                                            </a>
                                        </li>
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-linkedin-original"> </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team_content py-5 px-8 relative">
                                    <h4
                                        class="
                        team_name
                        text-xl
                        md:text-2xl
                        text-[#38424D]
                        group-hover:text-white
                      ">
                                        Sarah Doe
                                    </h4>
                                    <p
                                        class="
                        mt-2
                        transition-all
                        duration-[300ms]
                        group-hover:text-white
                      ">
                                        UI Designer
                                    </p>
                                </div>
                            </div>
                            <!-- single team -->
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12">
                        <div class="single_team_item max-w-[405px] mx-auto">
                            <div
                                class="
                    shadow
                    rounded-xl
                    my-8
                    overflow-hidden
                    bg-white
                    transition-all
                    duration-300
                    group
                    hover:bg-[#f94f4f]
                    mx-3
                    group
                  ">
                                <div class="team_image relative">
                                    <img
                                        src="assets/images/team-5.jpg"
                                        alt="team"
                                        class="w-full" />
                                    <ul class="social absolute z-10 top-4 right-8">
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-facebook-filled"> </i>
                                            </a>
                                        </li>
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-twitter-filled"> </i>
                                            </a>
                                        </li>
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-linkedin-original"> </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team_content py-5 px-8 relative">
                                    <h4
                                        class="
                        team_name
                        text-xl
                        md:text-2xl
                        text-[#38424D]
                        group-hover:text-white
                      ">
                                        Rob Hope
                                    </h4>
                                    <p
                                        class="
                        mt-2
                        transition-all
                        duration-[300ms]
                        group-hover:text-white
                      ">
                                        Dr. Software Engineer
                                    </p>
                                </div>
                            </div>
                            <!-- single team -->
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12">
                        <div class="single_team_item max-w-[405px] mx-auto">
                            <div
                                class="
                    shadow
                    rounded-xl
                    my-8
                    overflow-hidden
                    bg-white
                    transition-all
                    duration-300
                    group
                    hover:bg-[#f94f4f]
                    mx-3
                    group
                  ">
                                <div class="team_image relative">
                                    <img
                                        src="assets/images/team-2.jpg"
                                        alt="team"
                                        class="w-full" />
                                    <ul class="social absolute z-10 top-4 right-8">
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-facebook-filled"> </i>
                                            </a>
                                        </li>
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-twitter-filled"> </i>
                                            </a>
                                        </li>
                                        <li
                                            class="
                          mt-4
                          opacity-0
                          invisible
                          transform
                          translate-x-full
                          group-hover:opacity-100
                          transition-all
                          duration-300
                          group-hover:visible group-hover:translate-x-0
                        ">
                                            <a
                                                href="javascript:void(0)"
                                                class="
                            w-9
                            h-9
                            flex
                            items-center
                            justify-center
                            rounded-full
                            border-2 border-solid border-white
                            text-white
                            bg-transparent
                            hover:bg-[#f94f4f] hover:border-[#f94f4f]
                          ">
                                                <i class="lni lni-linkedin-original"> </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="team_content py-5 px-8 relative">
                                    <h4
                                        class="
                        team_name
                        text-xl
                        md:text-2xl
                        text-[#38424D]
                        group-hover:text-white
                      ">
                                        Micheal Jordan
                                    </h4>
                                    <p
                                        class="
                        mt-2
                        transition-all
                        duration-[300ms]
                        group-hover:text-white
                      ">
                                        Business Development Manager
                                    </p>
                                </div>
                            </div>
                            <!-- single team -->
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
        </div>
        <!-- container -->
    </section>

    <!--====== TEAM PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="blog" class="blog_area pt-[80px] md:pt-[120px]">
        <div class="container px-4">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-1/2">
                    <div class="section_title text-center pb-6">
                        <h5 class="text-base md:text-xl font-semibold text-[#F94F4F]">
                            Blog
                        </h5>
                        <h4 class="text-[#38424D] text-2xl md:text-4xl font-bold mt-4">
                            From The Blog
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="flex flex-wrap justify-center lg:justify-start">
                <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
                    <div
                        class="
                single_blog
                mx-3
                mt-8
                rounded-xl
                bg-white
                transition-all
                duration-[300ms]
                overflow-hidden
                hover:shadow-lg
              ">
                        <div class="blog_image">
                            <img src="assets/images/blog-1.jpg" alt="blog" class="w-full" />
                        </div>
                        <div class="blog_content p-4 md:p-5">
                            <ul class="blog_meta flex justify-between">
                                <li class="text-[#747E88] text-sm md:text-base">
                                    By:
                                    <a
                                        href="javascript:void(0)"
                                        class="text-[#747E88] hover:text-[#F94F4F]">
                                        Musharof Chowdury
                                    </a>
                                </li>
                                <li class="text-[#747E88] text-sm md:text-base">
                                    15 June 2024
                                </li>
                            </ul>
                            <h3 class="blog_title">
                                <a
                                    href="javascript:void(0)"
                                    class="
                      block
                      text-[#38424D]
                      font-semibold
                      mt-5
                      hover:text-[#f94f4f]
                      text-xl
                      sm:text-2xl
                    ">
                                    How to track your business revenue
                                </a>
                            </h3>
                            <a
                                href="javascript:void(0)"
                                class="
                    inline-block
                    text-[#38424D]
                    font-semibold
                    mt-6
                    hover:text-[#f94f4f]
                  ">
                                Read More
                            </a>
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
                    <div
                        class="
                single_blog
                mx-3
                mt-8
                rounded-xl
                bg-white
                transition-all
                duration-[300ms]
                overflow-hidden
                hover:shadow-lg
              ">
                        <div class="blog_image">
                            <img src="assets/images/blog-2.jpg" alt="blog" class="w-full" />
                        </div>
                        <div class="blog_content p-4 md:p-5">
                            <ul class="blog_meta flex justify-between">
                                <li class="text-[#747E88] text-sm md:text-base">
                                    By:
                                    <a
                                        href="javascript:void(0)"
                                        class="text-[#747E88] hover:text-[#F94F4F]">
                                        Musharof Chowdury
                                    </a>
                                </li>
                                <li class="text-[#747E88] text-sm md:text-base">
                                    15 June 2024
                                </li>
                            </ul>
                            <h3 class="blog_title">
                                <a
                                    href="javascript:void(0)"
                                    class="
                      block
                      text-[#38424D]
                      font-semibold
                      mt-5
                      hover:text-[#f94f4f]
                      text-xl
                      sm:text-2xl
                    ">
                                    Improving products depending on feedback
                                </a>
                            </h3>
                            <a
                                href="javascript:void(0)"
                                class="
                    inline-block
                    text-[#38424D]
                    font-semibold
                    mt-6
                    hover:text-[#f94f4f]
                  ">
                                Read More
                            </a>
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
                    <div
                        class="
                single_blog
                mx-3
                mt-8
                rounded-xl
                bg-white
                transition-all
                duration-[300ms]
                overflow-hidden
                hover:shadow-lg
              ">
                        <div class="blog_image">
                            <img src="assets/images/blog-3.jpg" alt="blog" class="w-full" />
                        </div>
                        <div class="blog_content p-4 md:p-5">
                            <ul class="blog_meta flex justify-between">
                                <li class="text-[#747E88] text-sm md:text-base">
                                    By:
                                    <a
                                        href="javascript:void(0)"
                                        class="text-[#747E88] hover:text-[#F94F4F]">
                                        Musharof Chowdury
                                    </a>
                                </li>
                                <li class="text-[#747E88] text-sm md:text-base">
                                    15 June 2024
                                </li>
                            </ul>
                            <h3 class="blog_title">
                                <a
                                    href="javascript:void(0)"
                                    class="
                      block
                      text-[#38424D]
                      font-semibold
                      mt-5
                      hover:text-[#f94f4f]
                      text-xl
                      sm:text-2xl
                    ">
                                    How to diversify your audience
                                </a>
                            </h3>
                            <a
                                href="javascript:void(0)"
                                class="
                    inline-block
                    text-[#38424D]
                    font-semibold
                    mt-6
                    hover:text-[#f94f4f]
                  ">
                                Read More
                            </a>
                        </div>
                    </div>
                    <!-- row -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== BLOG PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section
        id="contact"
        class="contact_area relative pt-[72px] pb-[80px] md:pb-[120px]">
        <div
            class="
          contact_image
          lg:absolute
          top-0
          left-0
          w-full
          lg:w-1/2
          h-auto
          lg:h-full
          mx-auto
          mt-[52px]
          lg:mt-0
          px-5
          lg:px-0
          flex
          items-center
          justify-end
        ">
            <div class="image lg:pr-[52px]">
                <img
                    src="assets/images/contact.svg"
                    alt="about"
                    class="max-w-full lg:max-w-screen-md lg:w-auto" />
            </div>
        </div>
        <!-- about image -->

        <div class="container px-4">
            <div class="flex flex-wrap justify-end">
                <div class="w-full lg:w-1/2">
                    <div class="contact_wrapper mt-[44px]">
                        <div class="section_title pb-4">
                            <h5 class="text-base md:text-xl font-semibold text-[#F94F4F]">
                                Contact
                            </h5>
                            <h4 class="text-[#38424D] text-2xl md:text-4xl font-bold mt-4">
                                Get In Touch
                            </h4>
                            <p class="mt-5">
                                Lorem ipsum dolor sitrg amet, consetetur sadipscing elitr sed
                                diam nonumy eirmod tempor invidunt ut labore et dolore magna.
                            </p>
                        </div>
                        <!-- section title -->

                        <div class="contact_form">
                            <form id="contact-form" action="#" method="POST">
                                <div class="flex flex-wrap">
                                    <div class="w-full md:w-1/2">
                                        <div class="mx-3">
                                            <div class="single_form mt-8">
                                                <input
                                                    name="name"
                                                    id="name"
                                                    type="text"
                                                    placeholder="Name"
                                                    class="
                              w-full
                              rounded-md
                              py-4
                              px-6
                              border border-solid border-[#747E88]
                            " />
                                            </div>
                                            <!-- single form -->
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <div class="mx-3">
                                            <div class="single_form mt-8">
                                                <input
                                                    name="email"
                                                    id="email"
                                                    type="email"
                                                    placeholder="Email"
                                                    class="
                              w-full
                              rounded-md
                              py-4
                              px-6
                              border border-solid border-[#747E88]
                            " />
                                            </div>
                                            <!-- single form -->
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="mx-3">
                                            <div class="single_form mt-8">
                                                <textarea
                                                    name="message"
                                                    id="message"
                                                    placeholder="Message"
                                                    rows="5"
                                                    class="
                              w-full
                              rounded-md
                              py-4
                              px-6
                              border border-solid border-[#747E88]
                              resize-none
                            ">
                          </textarea>
                                            </div>
                                            <!-- single form -->
                                        </div>
                                    </div>
                                    <p class="form-message mx-3"></p>
                                    <div class="w-full">
                                        <div class="mx-3">
                                            <div class="single_form mt-8">
                                                <button type="submit" class="main-btn contact-btn">
                                                    Submit
                                                </button>
                                            </div>
                                            <!-- single form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- row -->
                            </form>
                        </div>
                        <!-- contact form -->
                    </div>
                    <!-- contact wrapper -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer_area bg-[#38424D] relative z-[999]">
        <div
            class="
          shape
          absolute
          z-[-1]
          left-0
          bottom-0
          opacity-5
          overflow-hidden
          w-1/3
        ">
            <img src="assets/images/footer-shape-left.png" alt="" />
        </div>
        <div
            class="
          shape
          absolute
          right-0
          top-0
          opacity-5
          h-full
          overflow-hidden
          w-1/3
          z-[-1]
        ">
            <img src="assets/images/footer-shape-right.png" alt="" />
        </div>
        <div class="container px-4">
            <div class="footer_widget pt-[72px] pb-[80px] md:pb-[120px]">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full md:w-1/2 lg:w-3/12">
                        <div class="footer_about mt-[52px] mx-3">
                            <div class="footer_logo">
                                <a href="javascript:void(0)">
                                    <img src="assets/images/logo-footer.svg" alt="" />
                                </a>
                            </div>
                            <div class="footer_content mt-8">
                                <p class="text-white">
                                    Lorem ipsum dolor sitco nsetetu nonumy eirmod tempor
                                    invidunt ut labore et dolore magna uyam erat, sed diam.
                                </p>
                            </div>
                        </div>
                        <!-- footer about -->
                    </div>
                    <div class="w-full md:w-1/2 lg:w-5/12">
                        <div class="footer_link_wrapper flex flex-wrap mx-3">
                            <div class="footer_link w-1/2 md:pl-[52px] mt-[52px]">
                                <h2 class="footer_title text-xl font-semibold text-white">
                                    Quick Links
                                </h2>
                                <ul class="link pt-4">
                                    <li>
                                        <a
                                            href="javascript:void(0)"
                                            class="
                          text-white
                          mt-4
                          hover:text-[#F94F4F]
                          inline-block
                        ">
                                            Company
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="javascript:void(0)"
                                            class="
                          text-white
                          mt-4
                          hover:text-[#F94F4F]
                          inline-block
                        ">
                                            Privacy Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="javascript:void(0)"
                                            class="
                          text-white
                          mt-4
                          hover:text-[#F94F4F]
                          inline-block
                        ">
                                            About
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- footer link -->
                            <div class="footer_link w-1/2 md:pl-[52px] mt-[52px]">
                                <h2 class="footer_title text-xl font-semibold text-white">
                                    Resources
                                </h2>
                                <ul class="link pt-4">
                                    <li>
                                        <a
                                            href="javascript:void(0)"
                                            class="
                          text-white
                          mt-4
                          hover:text-[#F94F4F]
                          inline-block
                        ">
                                            Support
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="javascript:void(0)"
                                            class="
                          text-white
                          mt-4
                          hover:text-[#F94F4F]
                          inline-block
                        ">
                                            Contact
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="javascript:void(0)"
                                            class="
                          text-white
                          mt-4
                          hover:text-[#F94F4F]
                          inline-block
                        ">
                                            Terms
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- footer link -->
                        </div>
                        <!-- footer link wrapper -->
                    </div>
                    <div class="w-full md:w-2/3 lg:w-4/12">
                        <div class="footer_subscribe mt-[52px] mx-3">
                            <h2 class="footer_title text-xl font-semibold text-white">
                                Newsletter
                            </h2>
                            <div class="subscribe_form text-right mt-[36px] relative">
                                <form action="#">
                                    <input
                                        type="text"
                                        placeholder="Enter email"
                                        class="
                        w-full
                        py-5
                        px-6
                        bg-white
                        text-[#38424D]
                        rounded-full
                        border-none
                      " />
                                    <button class="main-btn subscribe-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <!-- footer subscribe -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- footer widget -->
            <div
                class="
            footer_copyright
            pt-3
            pb-6
            border-t-2 border-solid border-white border-opacity-10
            sm:flex
            justify-between
          ">
                <div class="footer_social pt-4 mx-3 text-center">
                    <ul class="social flex justify-center sm:justify-start">
                        <li class="mr-3">
                            <a href="https://facebook.com/uideckHQ">
                                <i class="lni lni-facebook-filled"> </i>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="https://twitter.com/uideckHQ">
                                <i class="lni lni-twitter-filled"> </i>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="https://instagram.com/uideckHQ">
                                <i class="lni lni-instagram-filled"> </i>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="javascript:void(0)">
                                <i class="lni lni-linkedin-original"> </i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- footer social -->
                <div class="footer_copyright_content pt-4 text-center">
                    <p class="text-white">
                        Designed and Developed by
                        <a
                            href="https://uideck.com"
                            rel="nofollow"
                            class="text-white hover:text-[#F94F4F]">
                            UIdeck
                        </a>
                        and
                        <a
                            href="https://tailwindtemplates.co"
                            rel="nofollow"
                            class="text-white hover:text-[#F94F4F]">
                            Tailwind Templates
                        </a>
                    </p>
                </div>
                <!-- footer copyright content -->
            </div>
            <!-- footer copyright -->
        </div>
        <!-- container -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a
        href="#"
        class="
        scroll-top
        w-11
        h-11
        bg-[#F94F4F]
        flex
        justify-center
        items-center
        text-white
        fixed
        bottom-8
        right-8
        rounded-md
        text-lg
        transition-all
        duration-300
        z-[999]
      ">
        <i class="lni lni-chevron-up"> </i>
    </a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== Tiny Slider js ======-->
    <!-- @vite('resources/assets/js/tiny-slider.js') -->
    <script src="assets/js/tiny-slider.js"></script>

    <!--====== Main js ======-->
    <!-- @vite('resources/assets/js/main.js') -->

    <script src="assets/js/main.js"></script>
</body>

</html>