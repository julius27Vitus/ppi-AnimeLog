function validation(event, continues) {
  event.preventDefault()
  const $select = document.getElementById('status')
  const $modal = document.getElementById('info-modal')
  const $title = document.getElementById('title-modal')
  const $info = document.getElementById('info-text')
  const $btnClose = document.getElementById('btn-close-modal')
  const $check1 = document.getElementById('customCheck1')
  const $check2 = document.getElementById('customCheck2')
  const $check3 = document.getElementById('customCheck3')
  const $check4 = document.getElementById('customCheck4')
  const $check5 = document.getElementById('customCheck5')
  const $check6 = document.getElementById('customCheck6')
  const $check7 = document.getElementById('customCheck7')
  let someone = false

  if ($check1.checked) {
    someone = true
  } else if ($check2.checked) {
    someone = true
  } else if ($check3.checked) {
    someone = true
  } else if ($check4.checked) {
    someone = true
  } else if ($check5.checked) {
    someone = true
  } else if ($check6.checked) {
    someone = true
  } else if ($check7.checked) {
    someone = true
  }      

  if ($select.value === 'Status') {
    $title.innerHTML = 'Erro'
    $info.innerHTML = 'Selecione um status para o anime.'
    $modal.style.display = 'block'
    $btnClose.addEventListener('click', closeModal)
  } else if (!someone) {
    $title.innerHTML = 'Erro'
    $info.innerHTML = 'Selecione um ou mais gêneros para o anime.'
    $modal.style.display = 'block'
    $btnClose.addEventListener('click', closeModal)
  } else {
    $title.innerHTML = 'Cadastrado'
    $info.innerHTML = 'O anime foi adicionado ao catálogo.'
    $modal.style.display = 'block'
    $btnClose.addEventListener('click', () => {
      const xhr = new XMLHttpRequest()
      
      xhr.open('GET', 'catalogo.html')

      continues.submit()
    })
  }
}

function closeModal() {
  const $modal = document.getElementById('info-modal')

  $modal.style.display = 'none'
}