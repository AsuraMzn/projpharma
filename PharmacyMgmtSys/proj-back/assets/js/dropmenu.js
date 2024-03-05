const admin = document.querySelector("#admin");
const user = document.querySelector("#user");
const meds = document.querySelector("#meds");

admin.addEventListener('click', () => {
    let down = admin.querySelector("#down");
    let up = admin.querySelector("#up");

    admin.classList.toggle("show");
    if(down.style.display == 'inline'){
        down.style.display = 'none'
        up.style.display = 'inline';
    }else{
        down.style.display = 'inline'
        up.style.display = 'none';
    }
});

user.addEventListener('click', () => {
    let down = user.querySelector("#down");
    let up = user.querySelector("#up");

    user.classList.toggle("show");
    if(down.style.display == 'inline'){
        down.style.display = 'none'
        up.style.display = 'inline';
    }else{
        down.style.display = 'inline'
        up.style.display = 'none';
    }
});

meds.addEventListener('click', () => {
    let down = meds.querySelector("#down");
    let up = meds.querySelector("#up");

    meds.classList.toggle("show");
    if(down.style.display == 'inline'){
        down.style.display = 'none'
        up.style.display = 'inline';
    }else{
        down.style.display = 'inline'
        up.style.display = 'none';
    }
});