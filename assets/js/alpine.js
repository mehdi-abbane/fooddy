document.addEventListener("alpine:init", () => {
	Alpine.data("global", () => ({
		is_win_large: is_win_large,
		current_slide: 0,
		total_slides: is_win_large ? 3 : 4,
		show_nav_menu: is_win_large,
		show_nav_list: is_win_large,
		high_res_img_loaded: false,
		show_search_bar: false,
		show_search_bar_mobile: false,
		init() {
			if (!is_win_large) {
				a_items_in_menus.forEach(
					(el, i) => (el.style.paddingLeft = `${el.dataset.indent}px`),
				);
			}

			this.$refs.featured_scroll.scrollTo({ left: 0, behavior: "smooth" });
			this.current_slide = 0;
			const featured_posts =
				document.querySelector(".featured-recipes").childElementCount;
			this.total_slides = featured_posts / 2;
		},
		toggleNavMenu() {
			this.show_nav_menu = !this.show_nav_menu;
			[
				"bg-[var(--color-text)]",
				"bg-transparent",
				"h-screen",
				"w-screen",
				"rounded-full",
				"fixed",
				"top-0",
				"left-0",
				"z-[999]",
				"my-0",
				"mx-0",
			].forEach((cls) => headerNav.classList.toggle(cls));
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
		scrollLeft() {
			if (this.current_slide == 0) return;
			console.log("left");
			this.current_slide--;
			this.$refs.featured_scroll.scrollBy({ left: -300, behavior: "smooth" });
		},
		scrollRight() {
			if (this.current_slide >= this.total_slides) return;
			console.log("right");
			this.current_slide++;
			this.$refs.featured_scroll.scrollBy({ left: 300, behavior: "smooth" });
		},
	}));
});
