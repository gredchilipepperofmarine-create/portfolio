// 4hくらい？？？？
const tubSystem = () => {
  const tubBtn = document.querySelectorAll('.tubBtn');
  const tub = document.querySelectorAll('.tub');

  if(!tubBtn || !tub) return;

  const tubs = () => {
    tub.forEach((element) => {
    element.classList.add('isHide');
    })
    tubBtn.forEach((e) => {
    e.classList.remove('isOpen');
    })
  }

  tubBtn.forEach((tubMenu) => {
    tubMenu.addEventListener('click', (e) => {
      const getDate = e.currentTarget.dataset.btn;
      const serchTarget = document.querySelector(getDate);
      tubs();
      e.currentTarget.classList.add('isOpen');
      serchTarget.classList.remove('isHide');
    })
  })
}
tubSystem();

