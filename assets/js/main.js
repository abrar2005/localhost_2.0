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

const customContextMenu = document.querySelector(".cm__main");
let allAnchors = document.querySelectorAll("a");

allAnchors.forEach((e) => {
	e.addEventListener("contextmenu", (e) => {
		e.preventDefault();
		let topPosition = e.clientY;
		let leftPosition = e.clientX;
		customContextMenu.classList.add("active");

		customContextMenu.style.left = leftPosition + "px";
		customContextMenu.style.top = topPosition + "px";

		document.querySelector(".fileActions").style.display = "block";

		console.log(e);
	});
});

document.addEventListener("contextmenu", (e) => {
	e.preventDefault();
	let topPosition = e.clientY;
	let leftPosition = e.clientX;
	customContextMenu.classList.add("active");

	customContextMenu.style.left = leftPosition + "px";
	customContextMenu.style.top = topPosition + "px";

	document.querySelector(".fileActions").style.display = "none";

	console.log(e);
});

window.addEventListener("click", () => {
	customContextMenu.classList.remove("active");
});

// ================================================= //
// New modal //
// ================================================= //

document.getElementById("new_folder_btn").addEventListener("click", () => {
	document.querySelector(".new_modal").classList.toggle("modal_active");
});
