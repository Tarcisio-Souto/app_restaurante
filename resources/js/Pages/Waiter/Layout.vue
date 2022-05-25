<template>
  <main>
    <header>
      <body id="body-pd">
        <header class="header" id="header">
          <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
          </div>
          <div class="header_img"><img src="" alt="" /></div>
        </header>
        <div class="l-navbar" id="nav-bar">
          <nav class="nav">
            <div>
              <a href="#" class="nav_logo">
                <i class="fas fa-solid fa-utensils nav_logo-icon"></i>
                <span class="nav_logo-name">Restaurante</span>
              </a>
              <div class="nav_list">
                <Link href="/tables" class="nav_link"><i class="bx bx-table nav_logo-icon"></i>Mesas</Link>
                <Link href="/products" class="nav_link"><i class="bx bxs-food-menu nav_icon"></i>Produtos</Link>
              </div>
            </div>
            <a href="#" class="nav_link">
              <i class="bx bx-log-out nav_icon"></i>
              <span class="nav_name">Sair</span>
            </a>
          </nav>
        </div>
        <!--Container Main start-->
        <div class="content">
          <article>
            <slot />
          </article>
        </div>
        <!--Container Main end-->
      </body>
    </header>
  </main>
</template>



<script>
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link,
  },
  mounted() {
    document.addEventListener("DOMContentLoaded", function (event) {
      const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId),
          bodypd = document.getElementById(bodyId),
          headerpd = document.getElementById(headerId);

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
          toggle.addEventListener("click", () => {
            // show navbar
            nav.classList.toggle("show");
            // change icon
            toggle.classList.toggle("bx-x");
            // add padding to body
            bodypd.classList.toggle("body-pd");
            // add padding to header
            headerpd.classList.toggle("body-pd");
          });
        }
      };

      showNavbar("header-toggle", "nav-bar", "body-pd", "header");

      /*===== LINK ACTIVE =====*/
      const linkColor = document.querySelectorAll(".nav_link");

      function colorLink() {
        if (linkColor) {
          linkColor.forEach((l) => l.classList.remove("active"));
          this.classList.add("active");
        }
      }
      linkColor.forEach((l) => l.addEventListener("click", colorLink));

      // Your code to run since DOM is loaded and ready
    });
  },
};
</script>