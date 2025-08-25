const toggleBTN = document.querySelector("#toggle-btn");
const headerNAV = document.querySelector("#header-nav");
toggleBTN.querySelectorAll("img").forEach((e) => {
	e.classList.toggle("hidden");
});
const title = document.querySelector("#title");
const headerMENU = document.querySelector("#header-nav-menu");
headerMENU.classList.toggle("opacity-0");
toggleBTN.addEventListener("click", () => {
	toggleBTN.querySelectorAll("img").forEach((e) => {
		e.classList.toggle("hidden");
	});
	headerNAV.classList.toggle("rounded-[50px]");
	headerMENU.classList.toggle("h-0");
	headerMENU.classList.toggle("opacity-[1]");
	headerNAV.classList.toggle("bg-[var(--color-text)]");
	headerNAV.classList.toggle("absolute");
	headerNAV.classList.toggle("relative");
	headerNAV.classList.toggle("w-screen");
	headerNAV.classList.toggle("h-screen");
	document.body.classList.toggle("overflow-hidden");
	title.classList.toggle("text-white");
});
