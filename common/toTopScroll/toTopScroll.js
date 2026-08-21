( () => {

  const targetArea = document.querySelector('.scrollTargetArea');
  const topButton = document.querySelector('.toTopScroll');

  const options = {
    root: null,
    rootMargin: '-45% 0px 0px 0px'
  }

  const action = (entries) =>{
    entries.forEach((entry) => {
      if(entry.isIntersecting) {
        topButton.classList.add('open');
      } else {
        topButton.classList.remove('open');
      }
    })
  }
  const observer = new IntersectionObserver(action, options);
  observer.observe(targetArea);

})();