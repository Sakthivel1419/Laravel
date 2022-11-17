$('.sidebar1 a').click(function(){
    console.log("inner");
    alert("hi");
    $('.sidebar1 .active').removeClass('active');
    $(this).parent().addClass('active');
});

// $(document).ready(function(){
//     //your stuff
// });