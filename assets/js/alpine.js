document.addEventListener("alpine:init", () => {
  Alpine.data("global", () => ({
    show_nav_menu: is_win_large,
    show_nav_list: is_win_large,
    high_res_img_loaded: false,
    show_search_bar: false,
    show_search_bar_mobile: false,
    toggleNavMenu() {
      this.show_nav_menu = !this.show_nav_menu;
      headerNAV.classList.toggle("bg-[var(--color-text)]");
      headerNAV.classList.toggle("bg-transparent");
      headerNAV.classList.toggle("h-screen");
      headerNAV.classList.toggle("w-screen");
      headerNAV.classList.toggle("rounded-full");
      headerNAV.classList.toggle("fixed");
      headerNAV.classList.toggle("top-0");
      headerNAV.classList.toggle("left-[0px]");
      headerNAV.classList.toggle("z-[999]");
      title.classList.toggle("text-white");
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
