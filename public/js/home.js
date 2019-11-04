let headerTextMenu = document.getElementById('header_text');
let headerText = document.getElementById('title');

function scrollEvent() {
	if(this.pageYOffset > 160) {
		console.log("show header");
		headerTextMenu.style.visibility = "visible";
		headerText.style.visibility = "hidden";
	} else if(this.pageYOffset < 160) {
		console.log("hide header");
		headerTextMenu.style.visibility = "hidden";
		headerText.style.visibility = "visible";
	}
}


window.addEventListener("scroll", function () {
    scrollEvent();
}, false);


function sort_all() {
	$.ajax({
		url: '/private/actions/projects_tag.php?t=all',
	}).done(function(data) {
		$('.projects').html(data);
	});
}
function sort_frontend() {
	$.ajax({
		url: '/private/actions/projects_tag.php?t=frontend',
	}).done(function(data) {
		$('.projects').html(data);
	});
}
function sort_backend() {
	$.ajax({
		url: '/private/actions/projects_tag.php?t=backend',
	}).done(function(data) {
		$('.projects').html(data);
	});
}
function sort_apps() {
	$.ajax({
		url: '/private/actions/projects_tag.php?t=app',
	}).done(function(data) {
		$('.projects').html(data);
	});
}
function sort_school() {
	$.ajax({
		url: '/private/actions/projects_tag.php?t=school',
	}).done(function(data) {
		$('.projects').html(data);
	});
}