document.addEventListener("alpine:init", () => {
  Alpine.data("global", () => ({
    show_nav_menu: is_win_large,
    show_nav_list: is_win_large,
    high_res_img_loaded: false,
    show_search_bar: false,
    show_search_bar_mobile: false,
    toggleNavMenu() {
      this.show_nav_menu = !this.show_nav_menu;
      $("#header-nav").toggleClass(
        "bg-[var(--color-text)] bg-transparent h-screen w-screen rounded-full fixed top-0 left-0 z-[999] my-0 mx-0",
      );
      headerNAV.classList.toggle("my-0");
      headerNAV.classList.toggle("mx-0");
      this.show_nav_list = !this.show_nav_list;
      document.body.classList.toggle("overflow-hidden");
    },
    toggleSearchBar() {
      this.show_search_bar = !this.show_search_bar;
      this.show_nav_list = !this.show_search_bar;
    },

    toggleSearchBarMobile() {
      this.show_search_bar_mobile = !this.show_search_bar_mobile;
    },
  }));
});
