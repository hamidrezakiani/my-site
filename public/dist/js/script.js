window.addEventListener("scroll", function () {
  if (document.body.scrollTop > 15 || document.documentElement.scrollTop > 15) {
      document.getElementById("header-box").classList.add("top-hide");
      document.getElementById("search-box").classList.add("search-box-top-hide");
  }else{
    document.getElementById("header-box").classList.remove("top-hide");
    document.getElementById("search-box").classList.remove("search-box-top-hide");
  }
});

document.getElementById("search-icon").addEventListener("click",function(){
   document.getElementById("search-box").classList.toggle("search-box-show");
   document.getElementById("shadow").classList.toggle("shadow-show");
});
document.getElementById("mobile-search-icon").addEventListener("click", function () {
  document.getElementById("search-box").classList.toggle("search-box-show");
  document.getElementById("shadow").classList.toggle("shadow-show");
});
document.getElementById("shadow").addEventListener("click", function () {
  document.getElementById("search-box").classList.toggle("search-box-show");
  document.getElementById("shadow").classList.toggle("shadow-show");
});

document.getElementById("toggle-menu").addEventListener("click",function(){
    document.getElementById("mobile-menu-box").classList.toggle("active");
});

var toggleModal = function(){
    document.getElementById('login-modal').classList.toggle('modal-active');
}
var signInButtons = document.getElementsByClassName("sign-in-button");
for (var i = 0; i < signInButtons.length; i++) {
    signInButtons[i].addEventListener("click", toggleModal, false);
}
document.getElementById("modal-backdoor").addEventListener('click',toggleModal,false);
var hideLoginModalButtons = document.getElementsByClassName("hide-login-modal");
for (var i = 0; i < hideLoginModalButtons.length; i++) {
    hideLoginModalButtons[i].addEventListener("click", toggleModal, false);
}
document.getElementById("delete-search").addEventListener("click", function () {
document.getElementById("search-input").value = "";
});
var footerItems = document.getElementsByClassName("footer-item");
var showItem = function(){
   this.querySelector("ul").classList.toggle("active-list");
}
for (var i = 0; i < footerItems.length; i++) {
  footerItems[i].addEventListener("click", showItem, false);
}

document.getElementById("register-tab-button").addEventListener('click',function(){
  this.classList.add('active');
   document.getElementById("login-tab-button").classList.remove('active');
   document.getElementById("login-modal-content").classList.remove('active-tab');
   document.getElementById("login-modal-footer").classList.remove('active-tab');
   document.getElementById("reset-password-div").classList.remove("active-tab");
   document.getElementById("register-modal-content").classList.add('active-tab');
   document.getElementById("register-modal-footer").classList.add('active-tab');
});

document.getElementById("login-tab-button").addEventListener('click',function(){
  this.classList.add('active');
   document.getElementById("register-tab-button").classList.remove('active');
   document.getElementById("register-modal-content").classList.remove('active-tab');
   document.getElementById("register-modal-footer").classList.remove('active-tab');
   document.getElementById("login-modal-content").classList.add('active-tab');
   document.getElementById("login-modal-footer").classList.add('active-tab');
   document.getElementById("reset-password-div").classList.add("active-tab");
});

document.getElementById('register-button').addEventListener('click',function(){
    document.getElementById('register-form').submit();
});

document.getElementById('login-button').addEventListener('click',function(){
    document.getElementById('login-form').submit();
});

$('.selected').on('click',function(){
   var language = document.getElementsByClassName('language');
   for(i=0;i<language.length;i++)
   {
      language[i].classList.toggle('ln-hide');
   }
})
