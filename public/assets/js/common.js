$(function(){
 
$('button#add3').click(function(){
 
  var tr_form1 = 
    '<input type="file" name="inphoto1[]">' +
    '<label><input type="text" name="inphoto2[]"></label>' ;
  $(tr_form1).appendTo($('.photo_entry '));
 
});
$('button#add').click(function(){
  
  var tr_form2 = 
    '<textarea name="report_shosai[]">';
  $(tr_form2).appendTo($('.shosai_photo'));

});

$('button#add_photo').click(function(){
 
  var tr_form3 = 
    '<input type="file" name="report_photo[]">';
  $(tr_form3).appendTo($('.shosai_photo'));

});

// $('button#add_sonota').click(function(){
 
//   var tr_form4 = 
//     '<label><input type="file" name="report_photo"></label>';
//   $(tr_form4).appendTo($('.add'));

// });


  // $('button#add').click(function(){
 
  //   var tr_form3 = 
  //   '<label><input type="file" name="report_photo"></label>';
  //   $(tr_form3).append($('.shosai_photo'));
 
  // });

});