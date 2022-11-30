const textarea = document.getElementById('description');

textarea.value = "";

const btn = document.getElementById('save-event');
btn.addEventListener('click', function handleClick() {
    textarea.value = "";
});


