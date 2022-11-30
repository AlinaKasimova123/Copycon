let offset = $('.cookie').offset();
let height = $('.cookie').height();
console.log(height);
console.log(offset);
let top = offset.top + height + "px";
let right = offset.left + width + "px";

$('.slider-content').css( {
    'position': 'absolute',
    'right': right,
    'top': top
});