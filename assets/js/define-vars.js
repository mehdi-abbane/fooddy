const is_win_large = window.innerWidth >= 640 ? true : false;
const a_items_in_menus = document.querySelectorAll(".a-items-in-menus");
const headerNav = document.querySelector("#header-nav");
const featuredRecipes =
	document.querySelector(".featured-recipes").childElementCount;
const scrollAmount = document.querySelector(".post-card").offsetWidth;
