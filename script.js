// Container-block-explore animation 
function scrollApear(){
    var introText = document.querySelector(".container-block-explore");
    var introPosition = introText.getBoundingClientRect().top;
    var screenPosition = window.innerHeight  / 2.5;

    if(introPosition < screenPosition){ 
        introText.classList.add('intro-appear');

    }
}

window.addEventListener('scroll',scrollApear)




