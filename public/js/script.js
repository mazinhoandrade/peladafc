const c = e => document.querySelector(e);
c('.busca').focus();
let vtotal = 100;
let vdesconto;
let des;
let total;

document.querySelector('#a').addEventListener('click', () => {
    vdesconto = document.querySelector('#pega').value;
    
    document.querySelector('#desconto') .innerHTML = `${vdesconto} R$`;
});

