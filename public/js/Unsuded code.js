$(function userAction(){
   

    const delete_btn=document.getElementById('delete_user');
    delete_btn.addEventListener("click", 
    function() {
        if (window.confirm('This action cannot be reversed. Do you wish to continue?')) {
            //continue to delete
        }
    });
});