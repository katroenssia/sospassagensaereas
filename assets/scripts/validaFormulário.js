document.forms[0].addEventListener('submit', (e) => {
  e.preventDefault();

  //checa para ver se todos inputs estão validos
  checkingForms();
});

const checkingForms = () => {
  const inputs = document.querySelectorAll('[data-input-js]');

  const canSubmit = () => {
    let arrayInput = Array.from(inputs);

    const haveError = arrayInput.some((item) => {
      return item.classList.contains('error');
    });
    console.log(haveError);
    if (!haveError) {
      // document.forms[0].submit();
      showModal();
    }
  };
  inputs.forEach((input) => {
    if (['undefined', 'null', ''].includes(input.value)) {
      input.style.border = '2px solid #df4040';
      input.style.transition = 'border 0.3s ease';
      input.classList.add('error');
    } else {
      input.style.border = 'none';

      input.classList.remove('error');

      canSubmit();
    }
  });
};

function showModal() {
  document.querySelector('.modal').classList.add('active');

  document.querySelector('.btn-close-modal').addEventListener('click', () => {
    document.querySelector('.modal').classList.remove('active');
  });

  document.querySelectorAll('[data-input-js]').forEach((el) => {
    el.value = '';
  });
}

function mascara(o, f) {
  v_obj = o;
  v_fun = f;
  setTimeout('execmascara()', 1);
}
function execmascara() {
  v_obj.value = v_fun(v_obj.value);
}
function mtel(v) {
  v = v.replace(/\D/g, ''); //Remove tudo o que não é dígito
  v = v.replace(/^(\d{2})(\d)/g, '($1) $2'); //Coloca parênteses em volta dos dois primeiros dígitos
  v = v.replace(/(\d)(\d{4})$/, '$1-$2'); //Coloca hífen entre o quarto e o quinto dígitos
  return v;
}
function id(el) {
  return document.getElementById(el);
}
window.onload = function () {
  id('telefone').onkeydown = function () {
    mascara(this, mtel);
  };
};
