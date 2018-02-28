var burger = document.getElementById('burger');
var popup;
var styles = [
	"min-width : 800px",
	"min-height : 800px",
	"top: 0",
	"bottom: 0",
	"left : 0",
	"right : 0",
	"position : absolute",
	"z-index : 4208",
	"background : pink",
	"cursor : pointer"
];
var isDisplayed = false;
burger.addEventListener('click', function(){
	if (!isDisplayed) {
		popup = document.createElement('div');
		popup.setAttribute('style', styles.join(';'));
		popup.addEventListener('click', function () {
			document.body.removeChild(this);
			isDisplayed = !isDisplayed;
		});
		document.body.appendChild(popup);
		isDisplayed = !isDisplayed;
	}
});