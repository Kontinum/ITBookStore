$('document').ready(function(){
    //info-box delay and slide
    $('.info-box').delay(3000).slideUp(1000);

    //subcategory toggle
    var subcategoryList = $('.subcategory-list');
    var subcategoryToggle = $('.subcategory-toggle');

    subcategoryList.hide();
    subcategoryToggle.click(function () {
        $(this).parent().next().slideToggle(700);
    });
});