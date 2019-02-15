$(function() {



   $('.file1').on('change', function (e) {
       $('.file-name1').html(e.target.files[0].name);
   });

    $('.file2').on('change', function (e) {
        $('.file-name2').html(e.target.files[0].name);
    });



});



