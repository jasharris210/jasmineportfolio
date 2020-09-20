<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jasmine Portfolio" />
    <meta name="description" content= "<!--description of website-->"/>
    <meta name="keywords" content="jasmine, harris, portfolio, digital, designer, ux, ui, front-end, developer, graphic" />
    <title> I am Jasmine </title>
    <link rel="stylesheet" type="text/css" href="static/contact.css" />
</head>
<body>

    <h3 class = "sent"></h3>
    
    <a href="menu.html">
        <img id = "button" src="Assets/portButton.png">
    </a>

    <h1> <span class = "firstCon">Contact</span> Contact <span class = "thirdCon">Contact</span></h1>

    <h3 class = "fill">Fill out the Form Below</h3>


    <form class="form" action="contact_send.php" method="post" enctype="text/plain">
        <p class = "nameFill" type="name">
            <label>Name: </label>
            <input id = "name" type = "text" placeholder="Write your name here.."></input>
        </p>

        <p class = "emailFill" type="email">
            <label>Email Address: </label>
            <input id = "email" type = "email" placeholder="How should I reach you..."></input>
        </p>
        <p class = "subjectFill" type="subject">
            <label>Subject:</label>
            <input id = "subject" type = "text" placeholder="Write your subject..."></input>
        </p>

        <p class = "messageFill" type="message">
            <label>Message: </label>
            <textarea type = "text" id = "message"  placeholder="What's your message..."></textarea>
        </p>
        <button type="submit" value = "Send an Email" onclick = "sendEmail()" name = "submit">Send Message</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script> 
    function sendEmail(){
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var message = $("#message");

        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(message)){
             $.ajax({
                 url: 'contact_send.php',
                 method: 'POST',
                 dataType: 'json',
                 data: {
                        name: name.val(), 
                        email: email.val(), 
                        subject: subject.val(), 
                        message: message.val()
                        }, success: function(response){
                            $('.form')[0].reset(); 
                            $('.sent').text("Message sent Successfully!");
                            }

                });
        }
    }  
    function isNotEmpty(caller){
        if(caller.val==" "){
            caller.css('border','1px solid red');
            return false;
        }
        else{
            caller.css('border', '');
            return true; 
        }

    }
</script>

</body>
</html>
