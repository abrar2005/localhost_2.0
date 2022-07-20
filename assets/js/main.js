var body = document.body;
var toggle = document.getElementById("theme-toggle");
var theme = window.localStorage.currentTheme;

body.classList.toggle(theme);

if (body.classList.contains("dark")) {
	toggle.innerHTML = "LIGHT";
} else if (body.classList.contains("light")) {
	toggle.innerHTML = "DARK";
}

toggle.addEventListener("click", () => {
	if (!theme) {
		theme = "light";
	} else if (theme === "dark") {
		// alert("dark");
		location.reload();
		body.classList.toggle("dark");
		localStorage.removeItem("currentTheme");
		localStorage.currentTheme = "light";
	} else if (theme === "light") {
		// alert("light");
		location.reload();
		body.classList.toggle("light");
		localStorage.removeItem("currentTheme");
		localStorage.currentTheme = "dark";
	}
});

// ================================================= //
// CONTEXT MENU //
// ================================================= //

const card = document.querySelector(".card");
const customContextMenu = document.querySelector(".custom-context-menu");

window.addEventListener("contextmenu", (e) => {
	alert("ss");
	e.preventDefault();
	let topPosition = e.clientY;
	let leftPosition = e.clientX;
	customContextMenu.classList.add("active");

	customContextMenu.style.left = leftPosition + "px";
	customContextMenu.style.top = topPosition + "px";
});

window.addEventListener("click", () => {
	customContextMenu.classList.remove("active");
});
