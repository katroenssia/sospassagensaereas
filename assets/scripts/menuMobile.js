document
  .querySelector('.hamburger')
  .addEventListener('click', function handlerMen() {
    document.querySelector('.menu').classList.add('active');

    if (document.querySelector('.menu').classList.contains('active')) {
      document.querySelector('.close-btn').addEventListener('click', () => {
        document.querySelector('.menu').classList.remove('active');
      });

      document.querySelectorAll('.link-menu').forEach((element) => {
        element.addEventListener('click', () => {
          document.querySelector('.menu.active').classList.remove('active');
        });
      });
    }
  });
