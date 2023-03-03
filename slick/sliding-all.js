
$(document).ready(function(){
$('.slidee1').slick({
infinite: true,
autoplay: true,
aautoplaySpeed: 1000,
infinite: true,
speed: 1500,
slidesToShow: 4,
slidesToScroll: 1,
responsive: [
{
breakpoint: 1200,
settings: {
slidesToShow: 3,
slidesToScroll: 1,
infinite: true,
dots: false
}
},
{
breakpoint: 1024,
settings: {
slidesToShow: 3,
slidesToScroll: 1,
infinite: true,
dots: false
}
},

{
breakpoint: 991,
settings: {
slidesToShow: 1,
slidesToScroll: 1,
infinite: true,
dots: false
}
},

{
breakpoint: 768,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
},
// You can unslick at a given breakpoint now by adding:
// settings: "unslick"
// instead of a settings object
]
});

$('.slidee2').slick({
autoplay: true,
aautoplaySpeed: 1000,
infinite: true,
speed: 1500,
slidesToShow: 6,
slidesToScroll: 3,
responsive: [
{
breakpoint: 1200,
settings: {
slidesToShow: 6,
slidesToScroll: 3,
infinite: true,
dots: false
}
},
{
breakpoint: 1024,
settings: {
slidesToShow: 6,
slidesToScroll: 3,
infinite: true,
dots: false
}
},
{
breakpoint: 992,
settings: {

slidesToShow: 1,
slidesToScroll: 1,
infinite: true,
dots: false
}
},
{
breakpoint: 768,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
},
// You can unslick at a given breakpoint now by adding:
// settings: "unslick"
// instead of a settings object
]
});

$('.slidee4').slick({
autoplay: true,
aautoplaySpeed: 1000,
infinite: true,
speed: 1500,
slidesToShow: 2,
slidesToScroll: 1,
responsive: [
{
breakpoint: 1200,
settings: {
slidesToShow: 2,
slidesToScroll: 1,
infinite: true,
dots: false
}
},
{
breakpoint: 1024,
settings: {
slidesToShow: 2,
slidesToScroll: 1,
infinite: true,
dots: false
}
},
{
breakpoint: 992,
settings: {

slidesToShow: 1,
slidesToScroll: 1,
infinite: true,
dots: false
}
},
{
breakpoint: 768,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
},
// You can unslick at a given breakpoint now by adding:
// settings: "unslick"
// instead of a settings object
]
});
});
