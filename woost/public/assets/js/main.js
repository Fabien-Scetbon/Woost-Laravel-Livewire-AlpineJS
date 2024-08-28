(function () {
  /*=====================================
    Sticky
    ======================================= */
  window.onscroll = function () {
    const header_navbar = document.querySelector(".navbar-area");
    const sticky = header_navbar.offsetTop;

    if (window.scrollY > sticky) {
      header_navbar.classList.add("sticky");
    } else {
      header_navbar.classList.remove("sticky");
    }

    // show or hide the back-top-top button
    const backToTo = document.querySelector(".scroll-top");
    if (
      document.body.scrollTop > 50 ||
      document.documentElement.scrollTop > 50
    ) {
      backToTo.style.display = "flex";
    } else {
      backToTo.style.display = "none";
    }
  };

  // for menu scroll
  const pageLink = document.querySelectorAll(".page-scroll");

  pageLink.forEach((elem) => {
    elem.addEventListener("click", (e) => {
      e.preventDefault();
      document.querySelector(elem.getAttribute("href")).scrollIntoView({
        behavior: "smooth",
        offsetTop: 1 - 60,
      });
    });
  });

  // section menu active
  function onScroll(event) {
    const sections = document.querySelectorAll(".page-scroll");
    const scrollPos =
      window.scrollY ||
      document.documentElement.scrollTop ||
      document.body.scrollTop;

    for (let i = 0; i < sections.length; i++) {
      const currLink = sections[i];
      const val = currLink.getAttribute("href");
      const refElement = document.querySelector(val);
      const scrollTopMinus = scrollPos + 73;
      if (
        refElement.offsetTop <= scrollTopMinus &&
        refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
      ) {
        document.querySelector(".page-scroll").classList.remove("active");
        currLink.classList.add("active");
      } else {
        currLink.classList.remove("active");
      }
    }
  }

  window.document.addEventListener("scroll", onScroll);

  //===== close navbar-collapse when a  clicked
  let navbarToggler = document.querySelector(".navbar-toggler");
  const navbarCollapse = document.querySelector(".navbar-collapse");

  document.querySelectorAll(".page-scroll").forEach((e) =>
    e.addEventListener("click", () => {
      navbarToggler.classList.remove("active");
      navbarCollapse.classList.remove("show");
    })
  );
  navbarToggler.addEventListener("click", function () {
    navbarToggler.classList.toggle("active");
    navbarCollapse.classList.toggle("show");
  });

  //======== tiny slider for work
  tns({
    container: ".work_active",
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayText: [" ", " "],
    mouseDrag: true,
    gutter: 0,
    nav: true,
    controls: false,
    controlsText: [
      '<i class="lni lni-chevron-left prev"></i>',
      '<i class="lni lni-chevron-right next"></i>',
    ],
    items: 5,

    responsive: {
      0: {
        items: 1,
      },
      570: {
        items: 2,
      },
      850: {
        items: 3,
      },
      1200: {
        items: 4,
      },
      1400: {
        items: 5,
      },
    },
  });
  //======== tiny slider for team
  tns({
    container: ".team_active",
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayText: [" ", " "],
    mouseDrag: true,
    gutter: 0,
    nav: true,
    controls: false,
    controlsText: [
      '<i class="lni lni-chevron-left prev"></i>',
      '<i class="lni lni-chevron-right next"></i>',
    ],
    items: 5,

    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      1050: {
        items: 3,
      },
    },
  });

  // ================ pricing tab
  const tabs = document.querySelectorAll("[data-tab-target]");
  const tabContents = document.querySelectorAll("[data-tab-content]");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const target = document.querySelector(tab.dataset.tabTarget);
      tabContents.forEach((tabContent) => {
        tabContent.classList.remove("active");
      });
      tabs.forEach((tab) => {
        tab.classList.remove("active");
      });
      tab.classList.add("active");
      target.classList.add("active");
    });
  });
})();
