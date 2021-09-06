$(document).ready(function () {
    /*SIDE MENU*/
    $('.sidenav').sidenav();

    var elem = document.querySelector('.collapsible.expandable');
    var instance = M.Collapsible.init(elem, {
    accordion: false
    });

    /*STICKY TOP 330PX USERMENU*/
    $(window).scroll(function(){
        if($(window).scrollTop() >= 56)
        {
            $("#addBecomeFixed").addClass("becomeFixed");
        }
        else
            $("#addBecomeFixed").removeClass("becomeFixed");
    });

    /*SELECT INPUT*/
    $(document).ready(function () {
        $('select').formSelect();
    });

    /*AUTHOR MODAL*/
    $(document).ready(function(){
        $('#modalAuthor').modal();
      });   
    
    $(document).ready(function() {
        $('input#input_text, textarea#textarea2').characterCounter();
    });
    
    // /*FEEDBACK*/
    $('#btnFeedback').on('click', function (e){
          e.preventDefault();
          checkFeedback();
    });

    $('body').on('click', 'a.intBor', function (e) {
        e.preventDefault();
        let that = $(this);
        let like = $(this).data("like");
        let id = $(this).parent().parent().data("id");

        $.ajax({
            url: "logic/interesting.php",
            dataType: "json",
            method: "post",
            data: {
                mystery: id,
                interesting: like,
                interestingRequest: true
            },
            success: function (data) {
                that.addClass("backgroundClick");
                that.find("span").html(data);
            },
            error: function (status) {
                if(status == 500)
                    alert("Error has been occured");
                else if(status == 404)
                    alert("Necessary page not found");
            }
        });
    });

    $('body').on('click', 'a.dc', function (e) {
        e.preventDefault();
        deleteCategory($(this));
    });

    $(".dm").click(function (e) {
        e.preventDefault();
        deleteMystery($(this));
    });

});

var correct;
function checkFeedback(){
    correct = true;
    
    var title = checkTitle();
    var message = CheckMessage();
      
    if(correct)
    {
        $.ajax({
            url : "logic/feedback.php",
            method : "POST",
            dataType : "json",
            data : {
                "title" : title,
                "textarea2" : message,
                "btnFeedback" : true
            },
            success : function(data){
                document.getElementById("resultMessage").innerHTML="Your message has been sent successfully";
                document.getElementById("title").value="";
                document.getElementById("textarea2").value="";
                setInterval(function(){
                    document.getElementById("resultMessage").innerHTML="";
                }, 5000);
                $('input#input_text, textarea#textarea2').characterCounter();
            },
            error : function(status){
                if(status == 500 || status == 409 || status == 404)
                document.getElementById("resultMessage").innerHTML="Problem has been occured.";
                else if(status == 422)
                document.getElementById("resultMessage").innerHTML=`Data is not defined.`;
            }
        });
    }
    else{
    }
}
function checkTitle(){
    let tag = document.getElementById("title");
    let title = tag.value.trim();
    let nextSpan =tag.nextElementSibling;
    let request = /.{2,100}/;
    //let nextP = fullName.nextElementSibling;
    let message = "Enter title";
    return checkMyTextBox(title, request, nextSpan, message);
}

function CheckMessage() {
    let message = document.getElementById("textarea2").value;
    message = message.trim();
    if(message == '')
        {
        correct=false;
        document.getElementById("textarea2").nextElementSibling.innerHTML=`<i class='fas fa-exclamation-circle mr-2'></i>` + "Enter your message.";
        return 0;
        }
    else{
        document.getElementById("textarea2").nextElementSibling.innerHTML="";
        return message;
    }
}
////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// L O G I N ////////////////////////////////////////
function checkLogin(){
    correct = true;

    let username = checkUsername();
    let password = checkPassword();

    if(correct)
        return true;
    else
        return false;
}
function checkUsername(){
    let tag = document.getElementById("username");
    let username = tag.value.trim();
    let nextSpan = tag.nextElementSibling;
    let request = /^[a-z]+([_-]?[a-z0-9]){4,40}$/;
    let message = "Username must have at least five characters and start with a letter. All characters must be non-capital letters.";
    return checkMyTextBox(username, request, nextSpan, message);
}
function checkPassword(){
    let tag = document.getElementById("password");
    let password = tag.value.trim();
    let nextSpan = tag.nextElementSibling;
    // let id ="password";
    let request = /.{6,}/;
    let message = "Password must have at least six characters.";
    return checkMyTextBox(password, request, nextSpan, message);
}



/*CHECK CHECKBOXES*/
function checkMyTextBox(data, criteria, tag, message)
{
    if(!criteria.test(data))
        {
        tag.innerHTML=`<i class='fas fa-exclamation-circle mr-2'></i>` + message;
        correct = false;
        return 0;
        }
    else
        {
        tag.innerHTML="";
        return data;
        }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////// INTERESTING / BORING  ///////////////////////////////////////
    

/* ADMIN PANEL ***************************************************************************************/
/* DELETE ****************************************************************************************/
function deleteCategory(that){
    let name = that.next().html();
    let id = that.data("cid");
    console.log(id);
    console.log(name);
    Swal.fire({
        title: `Are you sure you want to delete category ${name}?`,
        text: "This will also delete all mysteries from this category!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "logic/deleteCategory.php",
                dataType: "json",
                method: "post",
                data: {
                    category: id,
                    categoryRequest: true
                },
                success: function (data) {
                    location.reload();
                },
                error: function (status) {
                    if (status == 500) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Error has been occured'
                        });
                    }
                }
            });
        }
        })
}
function deleteMystery(that){
    let name = that.parent().next().html();
    let id = that.data("mid");
    console.log(name);
    console.log(id);
    Swal.fire({
        title: `Are you sure you want to delete mystery ''${name}''?`,
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
            url: "logic/deleteMystery.php",
            dataType: "json",
            method: "post",
            data: {
                mystery: id,
                mysteryRequest: true
            },
            success: function (data) {
                location.reload();
            },
            error: function (status) {
                if (status == 500) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error has been occured'
                    });
                }
            }
        });
}})}

/* I N S E R T    C A T E G O R Y  ****************************************************************************************/
function checkCategory(){
    let name = document.getElementById("categoryName").value;
    if(name == '')
    {
        document.getElementById("categoryName").nextElementSibling.innerHTML = "Enter category name";
        return false;
    }

    let file = document.getElementById("fileName").value;
    if (file == '') {
        $(".file").html("Insert image");
        return false;
    }
    return true;
}

/* I N S E R T    M Y S T E R Y  ****************************************************************************************/

function checkMystery(){
    let checker = true;
    if($("#mysteryName").val() == '')
    {
        $("#mysteryName").next().html("Enter mystery name");
        checker = false;
    }
    if(document.getElementById("selectCategory").value == '0') {
        $("#sel").html("Choose category");
        checker = false;

    }
    let file = document.getElementById("fileCat").value;
    if (file == '') {
        $("#filem").html("Insert image");
        checker = false;
    }
    if (document.getElementById("textarea2").value == '')
    {
        $("#textarea2").next().html("Enter mystery");
        checker = false;
    }

    if(checker)
        return true;
    else
        return false;
}

/* E D I T     C A T E G O R Y  ****************************************************************************************/
function checkEditC(){
    if(document.getElementById("editc").value != '0') 
    {
        return true;
    }
    else {
        return false;
    }
}

function checkEditM() {
    if (document.getElementById("editm").value != '0') {
        return true;
    }
    else {
        return false;
    }
}
