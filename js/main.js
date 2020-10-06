// SIDE MENU
function openSlideMenu() {
	document.getElementById('side-menu').style.width = '250px';
}

function closeSlideMenu() {
	document.getElementById('side-menu').style.width = '0';
}

// new

var sideNavChannelName = document.getElementsByClassName(
	'side-nav-channel-name'
);
//console.log(sideNavChannelName);

// var i;

// for (i = 0; i < sideNavChannelName.length; i++) {
// 	sideNavChannelName[i].addEventListener('click', function () {

// 		this.classList.toggle('active');

// 		var dropdownContent = this.nextElementSibling;
// 		if (dropdownContent.style.display === 'block') {
// 			dropdownContent.style.display = 'none';
// 		} else {
// 			dropdownContent.style.display = 'block';
// 		}
// 	});
// }
