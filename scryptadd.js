const openpopUpadd=document.getElementById('open_pop_upadd');
const pop_up_closeadd= document.getElementById('pop_up_closeadd');
const popUpadd=document.getElementById('pop_upadd');
openpopUpadd.addEventListener('click',function(e){
  e.preventDefault();
  popUpadd.classList.add('active');
  })
  pop_up_closeadd.addEventListener('click', () => {
  popUpadd.classList.remove('active');
  })