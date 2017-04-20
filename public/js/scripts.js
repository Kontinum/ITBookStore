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

    //add book form toggle
    var bookFormToggle = $('.addbook-toggle');
    var bookForm = $('.addbook-form');

    bookForm.hide();

    bookFormToggle.click(function(){
        bookForm.slideToggle(1000);

        if(bookFormToggle.hasClass('fa-arrow-down')){
            bookFormToggle.removeClass('fa-arrow-down');
            bookFormToggle.addClass('fa-arrow-up');
        }else{
            bookFormToggle.removeClass('fa-arrow-up');
            bookFormToggle.addClass('fa-arrow-down');
        }
    });
});