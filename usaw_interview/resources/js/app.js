import './bootstrap';

let possibilities = [
	"m.",
	" an interview.",
	" a project.",
	" myself."
];

showPossibilites();

window.setInterval(function () {
	showPossibilites();
}, possibilities.length * 1000);

function showPossibilites() {
	possibilities.forEach((possibility, itertion) => {
		setTimeout(function() {
			document.getElementById("nowWeAreAllConfused").innerHTML = possibility;
		}, itertion * 1000);
	});
}