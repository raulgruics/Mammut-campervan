// Container-block-explore animation
function scrollApear() {

  var introText = document.querySelectorAll("");
  var introPosition = introText.getBoundingClientRect().top;
  var screenPosition = window.innerHeight ;

  if (introPosition < screenPosition) {
    introText.classList.add("intro-appear");
  }
}

window.addEventListener("scroll", scrollApear);
