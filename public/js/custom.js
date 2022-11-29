//   This one allows to add fields for options on-demand
$(document).ready(function() 
{  
  $(".add-more").click(function(){   
      var html = $(".copy").html();  
      $(".after-add-more").after(html);
     
  });  

  $("body").on("click",".remove",function(){   
      $(this).parents(".removable").remove();  
  });  
});  

//I am unable to obtain the selected radio(since am using same #id). this should obtain and return the selecte index manually usinfg hidden textfield
jQuery(function($) {
    $('#new_quiz').submit(function() {
        var ans = $('#ans');
        var choices=$('#choices');
        var radioButtons = $("#new_quiz input:radio[name='correct']");
            // this should get the index of the found radio button based on the list of all
        var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
        ans.val(selectedIndex);
    });
});

function conf() {
    return confirm("You are about perform a delete action! This cant be reversed!");
}

$(document).on("click", ".open-validateDialog", function () {
    var lesson_id = $(this).data('id');
    $("#course_token #lesson_id").val( lesson_id );
    document.getElementById("course_name").innerText= $(this).data('name');          
});

function showContent(contentIndex) 
{
    // alert(contentIndex);
    var i;
    var x = document.getElementsByClassName("contentTab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    document.getElementById(contentIndex).style.display = "block";  
}

