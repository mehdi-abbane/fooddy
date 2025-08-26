document.addEventListener("alpine:init", () => {
  Alpine.data("global", () => ({
    show_nav_menu: false,
    high_res_img_loaded: false,
    setBg() {
      this.show_nav_menu = !this.show_nav_menu;
      headerNAV.classList.toggle("bg-[var(--color-text)]");
      headerNAV.classList.toggle("h-screen");
      headerNAV.classList.toggle("fixed");
      headerNAV.classList.toggle("top-0");
      headerNAV.classList.toggle("rounded-[50px]");
      title.classList.toggle("text-white");
      document.body.classList.toggle("overflow-hidden");
    },
  }));
});
