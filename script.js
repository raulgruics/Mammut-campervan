function scrollApear(){
    var introText = document.querySelector(".container-block-explore");
    var introPosition = introText.getBoundingClientRect().top;
    var screenPosition = window.innerHeight  / 3;

    if(introPosition < screenPosition){ 
        introText.classList.add('intro-appear');

    }
}

window.addEventListener('scroll',scrollApear)