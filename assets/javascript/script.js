function triggerClick(){
	document.querySelector('#code_import').click();

}
function displayImage(e){
	if (e.files[0]) {
		var reader=new FileReader();
		reader.onload=function(e){
			document.querySelector('#add_code_default').setAttribute('src','./assets/img/bg_coding_zone1.png');
		}
		reader.readAsDataURL(e.files[0]);
	}
}
function displayProfileImage(e){
	if (e.files[0]) {
		var reader=new FileReader();
		reader.onload=function(e){
			document.querySelector('#add_code_default').setAttribute('src',e.target.result);
		}
		//alert(e.files[0]);
		reader.readAsDataURL(e.files[0]);
	}
}
const menu=document.querySelector('.menu');
const navlinks=document.querySelector('.nav-links');
const links=document.querySelector('.nav-links li');    
menu.addEventListener('click',()=>{
navlinks.classList.toggle("open");
});  // 