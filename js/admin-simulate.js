document.addEventListener('DOMContentLoaded',()=>{
  const body=document.getElementById('user-table-body');
  if(!body) return;
  const users=[
    {id:1,name:'Alice',email:'alice@mail.com',active:true},
    {id:2,name:'Bob',  email:'bob@mail.com',  active:false}
  ];
  users.forEach(u=>{
    const tr=document.createElement('tr');
    tr.innerHTML=`
      <td>${u.id}</td>
      <td>${u.name}</td>
      <td>${u.email}</td>
      <td><input type="checkbox" ${u.active?'checked':''}></td>
      <td><button data-id="${u.id}">Appliquer</button></td>`;
    body.appendChild(tr);
  });
  body.querySelectorAll('button').forEach(btn=>{
    btn.addEventListener('click',()=>{
      const chk=btn.parentNode.previousElementSibling.querySelector('input');
      btn.disabled=true; chk.disabled=true;
      setTimeout(()=>{ btn.disabled=false; chk.disabled=false; },3000);
    });
  });
});
