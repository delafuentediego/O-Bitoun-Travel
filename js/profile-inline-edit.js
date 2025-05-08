document.addEventListener('DOMContentLoaded',()=>{
  const container=document.querySelector('.profile-container');
  if(!container) return;
  let changed=false;
  container.querySelectorAll('.edit-btn').forEach(btn=>{
    btn.addEventListener('click',()=>{
      const input=btn.previousElementSibling, old=input.value;
      input.readOnly=false; input.focus();
      const save=document.createElement('button');
      save.textContent='✓'; save.className='save-btn';
      const cancel=document.createElement('button');
      cancel.textContent='✕'; cancel.className='cancel-btn';
      btn.after(cancel); btn.after(save);
      save.addEventListener('click',()=>{
        input.readOnly=true; save.remove(); cancel.remove();
        changed=true; container.querySelector('.btn').disabled=!changed;
      });
      cancel.addEventListener('click',()=>{
        input.value=old; input.readOnly=true; save.remove(); cancel.remove();
      });
    });
  });
});
