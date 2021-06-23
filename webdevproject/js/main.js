const search_icon = document.querySelector(".nav-search span");
const search_form = document.querySelector(".search-form");
search_icon.onclick = () => {
    search_form.classList.toggle("show");
};
const drop_icon = document.querySelector(".dropicon");
const dcontents = document.querySelector(".nav-search-drop-contents");
drop_icon.onclick = () => {
    dcontents.classList.toggle("show1");
};

/*window.onclick= function(event){
    if(!event.target.matches('.dropicon')){
        var dropdowns = document.getElementsByClassName(".nav-search-drop-contents");
        if(dropdowns.classList.contain('show1')){
            dropdowns.classList.remove("show1");
        }
        }
}*/
