document.addEventListener('DOMContentLoaded',()=>{
  const totalEl=document.getElementById('total');
  if(!totalEl) return;
  function update(){
    let sum=0;
    document.querySelectorAll('[data-price]').forEach(el=>{
      const p=parseFloat(el.dataset.price)||0;
      if(el.type==='checkbox'&&el.checked) sum+=p;
      if(el.tagName==='SELECT'){
        const opt=el.options[el.selectedIndex];
        sum+=parseFloat(opt.dataset.price)||0;
      }
    });
    totalEl.textContent=`${sum.toFixed(2)} €`;
  }
  document.querySelectorAll('[data-price]').forEach(el=>el.addEventListener('change',update));
  update();
});
