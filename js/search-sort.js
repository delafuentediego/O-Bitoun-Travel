document.addEventListener('DOMContentLoaded',()=>{
  const list=document.querySelector('.results-list'),
        sel=document.getElementById('sort-by');
  if(!list||!sel) return;
  sel.addEventListener('change',()=>{
    const items=Array.from(list.children),
          key=sel.value;
    items.sort((a,b)=>{
      const va=a.dataset[key], vb=b.dataset[key];
      return isNaN(va)?va.localeCompare(vb):va-vb;
    });
    list.innerHTML=''; items.forEach(i=>list.append(i));
  });
});
