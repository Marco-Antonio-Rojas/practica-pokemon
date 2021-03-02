const buscar = document.querySelector(".btn-buscar");
const buscarResponsive = document.querySelector(".btn-buscar-responsive");
const busqueda =  document.querySelector(".buscador__div");
const busquedaResponsive =  document.querySelector(".buscador__input-responsive");
const cerrar = document.querySelector(".btn-cerrar");
const menu = document.querySelector(".btn-menu");
const navMenu = document.querySelector(".buscador__menu");
const menuCerrar = document.querySelector(".menu-cerrar");


buscar.addEventListener("click",()=>{
	busqueda.style.display = "flex";
	busqueda.style.animation = "abrir-busqueda 1s forwards";
});

buscarResponsive.addEventListener("click",()=>{
	busquedaResponsive.style.display = "flex";
	busquedaResponsive.style.animation = "aparecer-derecha 1s forwards";
});

cerrar.addEventListener("click",()=>{
	busqueda.style.animation = "cerrar-busqueda 1s forwards";
	busqueda.style.display = "none";
});

menu.addEventListener("click",()=>{
	navMenu.style.display = "flex";
	navMenu.style.animation = "abrir-busqueda 1s forwards";
});

menuCerrar.addEventListener("click",()=>{
	navMenu.style.animation = "cerrar-busqueda 1s forwards";
	navMenu.style.display = "none";
});