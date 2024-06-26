const sideMenu =document.querySelector('aside');
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");
const sidelinks = document.querySelectorAll(".side_link");
const windowPathname = window.location.pathname;

// show sidebar menu
menuBtn.addEventListener('click',()=>{
    sideMenu.style.display = 'block';
})

// close sidebar menu
closeBtn.addEventListener('click',()=>{
    sideMenu.style.display = 'none';
})

// change theme
themeToggler.addEventListener('click',()=>{
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

})

sidelinks.forEach(sidelink=>{
    if(sidelink.href.includes(windowPathname)){
        sidelink.classList.add('active');

    }
    
   
});
