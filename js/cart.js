document.addEventListener('DOMContentLoaded',()=>{
  document.querySelectorAll('.add-to-cart').forEach(btn=>{
    btn.addEventListener('click',e=>{
      e.preventDefault();
      fetch('cart.php?action=add',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body:JSON.stringify({tripId:btn.dataset.tripId})
      })
      .then(r=>r.json())
      .then(res=>{
        const msg=document.createElement('div');
        msg.textContent=res.success?'✅ Voyage ajouté':'❌ Erreur';
        Object.assign(msg.style,{position:'fixed',bottom:'1rem',left:'50%',transform:'translateX(-50%)',background:'#000a',color:'#fff',padding:'.5rem 1rem',borderRadius:'4px'});
        document.body.append(msg);
        setTimeout(()=>msg.remove(),2000);
      });
    });
  });
});
