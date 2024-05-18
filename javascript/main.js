const menu= document.querySelector('nav .container ul');
const navItems =menu.querySelectorAll('li');
const changeActiveItem = ()=>{
    navItems.forEach(item=> {
    
    const link =item.querySelector('a');
        link.classList.remove('active');
        
    })
}
navItems.forEach(item=> {
    const link =item.querySelector('a');
    link.addEventListener('click', () => {
        changeActiveItem();
        link.classList.add('active');
        
    })
})