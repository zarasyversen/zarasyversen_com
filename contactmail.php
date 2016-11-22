<?php
/* Set e-mail recipient */
$myemail  = "zarasyversen@hotmail.com" ;

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['name'], "Enter your name");
$email    = check_input($_POST['email'], "Insert your email");
$message = check_input($_POST['comment'], "Write your comments"); 


$headers .= "From: Min hemsida";

/* Let's create the message for the e-mail */
$subject = "Message from zarasyversen.com";
$message = "Hey!

Someone contacted you through zarasyversen.com

Name: $yourname
E-mail: $email

Message:
$message

End of message
";


/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thanks page */
header('Location: index.html#sayhello');
exit();

/* Functions we use */

function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?> 
