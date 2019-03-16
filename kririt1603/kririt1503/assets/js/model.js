// all model js
                function becomeFocus() {
                    $('#bname').focus();
                    }
                // function become_An_Instructor(){
                //     var name = document.getElementById("bname").value;
                //     var email = document.getElementById("bemail").value;
                //     var mobile = document.getElementById("bmobile").value;
                //     var Expertise = document.getElementById("bExpertise").value;
                //     $.ajax({
                //         url: "Become_An_Instructor.php",
                //         data:{
                //         'name':name,
                //         'email':email,
                //         'mobile':mobile,
                //         'expertise':Expertise
                //         },
                //         type: "POST",
                //         success: function(data){
                //         $data=JSON.parse(data);
                //         $("#bmyform").html($data);
                //         document.getElementById("bname").readOnly = true;
                //         document.getElementById("bemail").readOnly = true;
                //         document.getElementById("bmobile").readOnly = true;
                //         document.getElementById("bExpertise").readOnly = true;
                //         },
                        
                //     });
                // }
                
// End

//mode enroll now student

                function enrollFocus() {
                    $('#ename').focus();
                    }
                // function enroll_now(){
                //     var name = document.getElementById("ename").value;
                //     var email = document.getElementById("eemail").value;
                //     var mobile = document.getElementById("emobile").value;
                //     var course = document.getElementById("course_name").value; 
                //     var course = document.getElementById("course_applied_for").value; 
                //     $.ajax({
                //         url: "Enroll_now.php",
                //         data:{
                //         'name':name,
                //         'email':email,
                //         'mobile':mobile,
                //         'course':course,
                //         'course_applied_for':course_applied_for
                //         },
                //         type: "POST",
                //         success: function(data){
                //         $data=JSON.parse(data);
                //         $("#emyform").html($data);
                //         document.getElementById("ename").readOnly = true;
                //         document.getElementById("eemail").readOnly = true;
                //         document.getElementById("emobile").readOnly = true;
                //         document.getElementById("course_name").readOnly = true;
                //         document.getElementById("course_applied_for").readOnly = true;
                //         },
                        
                //     });
                // }
                
// End

                document.addEventListener('keyup', function(e) {
                if (e.keyCode == 27) {
                //alert('fsdf');
                    document.getElementById('enroll_now').style.display = "none";
                }
            });
            $(document).on('open', '.modal', function () {
                $('input').attr('tabindex', "-1");
                $('.modal-body input').each(function(index, input) {
                    input.tabIndex = index + 1;
                });
            });
            
            $(document).on('close', '.modal', function () {
                $('input').each(function(index, input) {
                    input.tabIndex = index + 1;
                 });
            });
            
// mobile number js
//use in input tag onkeypress="return numbersonly(this, event)"
function numbersonly(myfield, e)
{
    var key;
    var keychar;

    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;

    keychar = String.fromCharCode(key);

    // control keys
    if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
        return true;

    // numbers
    else if ((("0123456789").indexOf(keychar) > -1))
        return true;

    // only one decimal point
    else if ((keychar == "."))
    {
        if (myfield.value.indexOf(keychar) > -1)
            return false;
    }
    else
        return false;
}
// End