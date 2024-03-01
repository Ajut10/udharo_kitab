const sidelinks = document.querySelectorAll(".side_link");
const windowPathname = window.location.pathname;
sidelinks.forEach(sidelink=>{
    if(sidelink.href.includes(windowPathname)){
        sidelink.classList.add('active');

    }
    
   
});