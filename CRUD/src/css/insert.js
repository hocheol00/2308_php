let now = new Date();
let year = now.getFullYear();
let month = ("0" + (now.getMonth() + 1)).slice(-2);
let day = ("0" + now.getDate()).slice(-2);	
const TODAY = year + '-' + month + '-' + day;

const YMDDATE = document.querySelector('#YmdDate');
YMDDATE.setAttribute('value', TODAY);


// function nowdate() {
// 	let now = new Date();
// 	let year = now.getFullYear();
// 	let month = now.getMonth() + 1;
// 	let day = now.getDate();	
// 	const TODAY = year + '-' + month + '-' + day;
// }

