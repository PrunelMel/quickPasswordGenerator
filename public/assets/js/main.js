const observer = new IntersectionObserver((entries)=>{
    entries.forEach((entry) => {
        console.log(entry);
        if(entry.isIntersecting){
            entry.target.classList.add('show');
        }
        else{
            entry.target.classList.remove('show');
        }

    });
});

const hiddenElements = document.querySelectorAll('.hidde');
const hiddenImg = document.querySelectorAll('.hiddeImg');
hiddenElements.forEach((el) => observer.observe(el));
hiddenImg.forEach((el) => observer.observe(el));