<?php
session_start();
if(!isset($_SESSION['the_number']))
{
    //generation random number if session is set
    $_SESSION['the_number'] = rand(1, 100);
}

if(!isset($_SESSION['counter']))
{ 
    $_SESSION['counter'] = 0;
}
else
{
    $_SESSION['counter']++;
}
$rand = $_SESSION['the_number'];
$counter = $_SESSION['counter'];
$guess = isset($_POST['guess']) ? (int) $_POST['guess'] : false;
if($guess == $rand)
{
    unset($_SESSION['the_number']);
    unset($_SESSION['counter']);
}
?>

<!DOCTYPE html>
<html >
<head>
    <title>Thinking of a Number</title>
</head>
<body>
<h1>I'm Thinking of a Number 1-100</h1>

<?php

if ($guess != false)
{
    print "<hr />";
    print "The number you input is $guess <br />";

    if ($guess == $rand)
    {
        print "You are correct <br />";
        print "You guessed it in ".$counter." attempt(s).";
    }
    else if ($guess != $rand)
    {
        if($guess > $rand)
        {
            print "You are too high. <br />";
            print "Try again";
        }
        else if ($guess < $rand)
        {
            print "You are too low. <br />";
            print "Try again";
        }
    }
}
?>
<hr />
<?php if($guess != $rand): ?>
    <form action = "" method = "post">
        <fieldset>
            <label>Enter a number: </label>
            <input type = "text" name = "guess" /><br />
            <button type = "submit">Submit</button>
        </fieldset>
    </form>
<?php else: ?>
    <a href="index.php">Press Here to Restart</a>
<?php endif; ?>

</body>
</html>
