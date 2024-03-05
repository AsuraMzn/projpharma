function handleDisplay(event) {
    const target = event.target;
    const mainListId = target.closest('ul').id;
    const displayType = target.getAttribute('data-display');
    console.log(mainListId);
    console.log(displayType);
    console.log(target);

    // Hide all display-element divs
    document.querySelectorAll('.display-element').forEach(element => {
        element.style.display = 'none';
    });

    // Show the target display-element div
    const targetElementId = `${mainListId}-${displayType}`;
    const targetElement = document.getElementById(targetElementId);
    if (targetElement) {
        console.log(`Showing display-element with id ${targetElementId}`);
        targetElement.style.display = 'block';
    } else {
        console.log(`No display-element found with id ${targetElementId}`);
    }
}

document.querySelectorAll('.main-list .sub-list li a').forEach(a => {
    a.addEventListener('click', handleDisplay);
});

document.querySelectorAll('.main-list .sub-list li').forEach(li => {
    li.addEventListener('click', handleDisplay);
});
