Element.prototype.find = Element.prototype.querySelector;
Element.prototype.findAll = Element.prototype.querySelectorAll;
Element.prototype.on = Element.prototype.addEventListener;
var $ = function (e) {
  return document.querySelector(e);
};

var $$ = function (e) {
  return document.querySelectorAll(e);
}

var toggleHide = function (e, state) {
  if (!Array.isArray(e)) e = [e];
  e.forEach(function (e) {
    e.style.display = state;
  });
};

var numberVerify = function (T) {
  if (!Number.isInteger(Number(T)))
    return 0;
  return Number(T);
};

var genVaided = function (f) {
  return function (e) {
    if (f(e))
      e.target.classList.remove('warn')
    else
      e.target.classList.add('warn')
  }
};

var imageExtNameVaided = function (fileName) {
  var ext;
  var extName = fileName.split('.').pop();
  switch (extName) {
    case 'ppt':
    case 'pptx':
      ext = 'ppt.png';
      break;
    case 'doc':
    case 'docx':
      ext = 'doc.png';
      break;
    case 'xls':
    case 'xlsx':
      ext = 'xls.png';
      break;
    case 'jpg':
    case 'png':
      ext = 'jpg.png';
      break;
    case 'pdf':
      ext = 'pdf.png';
      break;
    case 'txt':
      ext = 'txt.png';
      break;
    default:
      ext = false;
  }
  return ext;
}

var get = function (key) {
  var v = sessionStorage.getItem(key);
  if (v)
    return v
  else {
    alert('不合法!')
    location.href = 'print-no1.html'
  }
};

var summary = function (pageNum, listOption, paperType, paperColor, num, distributionFee) {
  var a, b,
    c = 1,
    d = 0;
  if (paperType === 'single') {
    paperColor === '1' ? a = .15 : a = 1;
    listOption === '1' ? b = 1 : b = Number(listOption);
  } else {
    paperColor === '1' ? a = .2 : a = 1.5;
    listOption === '1' ? b = 2 : b = 2 * Number(listOption);
  }
  return parseFloat(num * (Math.ceil(pageNum / b) * a * c + d) + distributionFee).toFixed(2);
};

var getInputValue = function (name) {
  el = $$('[name=' + name + ']');
  if (el[0].type !== 'radio')
    return el[0].value;
  else
    return Array.from(el).filter(function (e) {
      return e.checked;
    })[0].value
}

function no1() {
  var file = $('#file');
  var fileSelect = $('.file-select');
  fileSelect.on('click', function () {
    file.click();
  });
  file.on('change', function (e) {
    var el = e.target;
    var file = el.files[0];
    var rootEl = fileSelect;
    var initState = [
      rootEl.find('.plus'),
      rootEl.find('.tip')
    ];
    var filenameEl = rootEl.find('.filename');
    var iconEl = rootEl.find('.icon');
    var image = imageExtNameVaided(file.name);
    if (image) {
      iconEl.innerHTML = '<img src="./img/' + image + '">';
      filenameEl.innerText = file.name;
      toggleHide(initState, 'none');
      toggleHide([iconEl, filenameEl], 'block');
      sessionStorage.setItem('filename', file.name)
    } else {
      el.value = '';
      toggleHide(initState, 'block');
      toggleHide([iconEl, filenameEl], 'none');
      alert('不支持该种格式！');
    }
  });

  /*
   * Vaided 
   */
  $('#file').on('vaided', function () {
    fileSelect.dispatchEvent(new CustomEvent('vaided'));
  })
  fileSelect.on('vaided', genVaided(function (e) {
    return e.target.find('input').files.length;
  }));

  var phoneNumberInput = document.getElementById('phoneNumber');
  phoneNumberInput.value = sessionStorage.getItem("PhoneNumber");
}

function no2() {
  var form = $('form');
  var proSetting = $('.pro-setting button');
  proSetting.on('click', function (e) {
    var el = $('.pro-setting-detail');
    if (e.target.dataset.open === '0') {
      el.style.display = 'block';
      e.target.dataset.open = '1';
    } else {
      el.style.display = 'none';
      e.target.dataset.open = '0';
    }
  });
  document.body.on('click', function (e) {
    if (!e.target.closest('.pro-setting-detail, .pro-setting button') && proSetting.dataset.open === '1')
      proSetting.dispatchEvent(new Event('click'));
  })
  var copiesNumberRoot = $('.copies-number');
  var copiesNumber = copiesNumberRoot.find('input');
  copiesNumberRoot.find('.plus').on('click', function (e) {
    var v = copiesNumber.value;
    if (numberVerify(v))
      copiesNumber.value = numberVerify(v) + 1;
    else
      copiesNumber.value = 1;
    copiesNumber.dispatchEvent(new Event('change', {
      "bubbles": true
    }));
  });
  copiesNumberRoot.find('.minus').on('click', function (e) {
    var v = copiesNumber.value;
    if (numberVerify(v) && v != 1)
      copiesNumber.value = numberVerify(v) - 1;
    else
      copiesNumber.value = 1;
    copiesNumber.dispatchEvent(new Event('change', {
      "bubbles": true
    }));
  });
  copiesNumber.on('change', function (e) {
    var v = copiesNumber.value;
    if (!numberVerify(v))
      copiesNumber.value = 1;
  });

  var doubleSide = $('#double-side');
  form.on('change', function (e) {
    var pageNum = getInputValue('page-end') - getInputValue('page-begin') + 1;
    $('.total span').innerText = summary(
      pageNum,
      getInputValue('list-option'),
      getInputValue('paper-type'),
      getInputValue('paper-color'),
      copiesNumber.value,
      +getInputValue('distribution-fee')
    );

    if (pageNum === 1) {
      doubleSide.setAttribute('disabled', 'disabled');
      $('#single-side').click();
    }else{
      if(doubleSide.getAttribute('disabled'));
        doubleSide.removeAttribute('disabled');
    }
  });
  form.dispatchEvent(new Event('change'));

  /**
   * PageSelect
   */
  var pageSelect = $('.page-select');
  var pageSelectInput = Array.from(pageSelect.findAll('input'));
  pageSelectInput[0].on('vaided', function () {
    pageSelect.dispatchEvent(new CustomEvent('vaided'));
  });
  pageSelect.on('vaided', genVaided(function (e) {
    var pageBegin = pageSelectInput[0].value;
    var pageEnd = pageSelectInput[1].value;
    return [pageBegin, pageEnd].every(function (n) {
      return numberVerify(n)
    }) && (pageEnd - pageBegin) > -1;
  }));
  var avatarRoot = $('.avatar-wrapper');
  var image = imageExtNameVaided(get('filename'));
  avatarRoot.find('.file-avatar').innerHTML = '<img src="./img/' + image + '">';
  avatarRoot.find('.filename').innerText = get('filename');
}

function pay() {
  var fileDetail = $('.file-detail');
  fileDetail.find('img').src = './img/' + imageExtNameVaided(get('filename'));
  fileDetail.find('.pay-filename').innerText = get('filename');
  var fileDetailSub = fileDetail.findAll('.space-between span');
  fileDetailSub[0].innerText = (get('paper-type') === 'single' ? '单面' : '双面') + ' ' + get('page-size');
  fileDetailSub[1].innerText = 'X ' + get('num')
  $('.pay-list-option').innerText = get('list-option') === '9' ? '3 X 3' : get('list-option') === '6' ? '2 X 3' : '无';
  $('.pay-shop-name').innerText = get('shopName');
  $('.distribution-option').innerText = get('distribution-fee') === '0' ? '不配送' : get('distribution-fee') === '1' ? '当天配送' : '立即配送';
  $('.num-begin').innerText = get('page-begin');
  $('.num-end').innerText = get('page-end');
  $('.total span').innerText = summary(get('page-end') - get('page-begin') + 1, get('list-option'),
    get('paper-type'), get('paper-color'), get('num'), get('distribution-fee'));
}

$('form').on('submit', function (e) {
  var el = e.target;
  var elements = Array.from(el.elements);

  elements.forEach(function (el) {
    el.dispatchEvent(new CustomEvent('vaided'))
  });
  if (el.find('.warn')) {
    e.preventDefault();
    return;
  }

  elements.forEach(function (el) {
    if (el.type !== 'radio' && el.name && el.value)
      sessionStorage.setItem(el.name, el.value)
    if (el.type === 'radio' && el.checked)
      sessionStorage.setItem(el.name, el.value)
  });
});