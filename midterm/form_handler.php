<?php

    $count = 1;
    $favcol = [];

    if(isset($_GET['fos']))
    {
        $mail = $_GET['mail'];
        $pass = $_GET['pass'];
        $gender = $_GET['gender'];
        // $favcol = isset($_GET['rang1']) ? $_GET['rang1'] : " ";
        // $favcol .= ' '.isset($_GET['rang2']) ? $_GET['rang2'] : " ";
        // $favcol .=' '. isset($_GET['rang3']) ? $_GET['rang3'] : " ";

        for($i=0; $i<3; $i++)
        {
            if(isset($_GET["rang$count"]))
            {
               array_push($favcol, $_GET["rang$count"]);
            }
            $count++;
        }

        $sender = $_GET['fos'];
        passValidate($pass, $mail, $gender, $favcol);
    }
    else
    {
        redirect();
    }
    function passValidate($password, $em, $gen, $fav)
    {
        if(strlen($password)< 8 || strlen($password) > 16)
        {
            echo("<script> alert('Password Must Be Between 8 and 16 digites'); window.location.href=\"form.html\";</script>");
            return;
        }
        if(count($fav)<1)
        {
            echo "mail: $em <br/>Gender: $gen <br/>Favorite Color: No Favorite Color!";
        }
        else
        {

            echo "mail: $em <br/>Gender: $gen <br/>Favorite Color:";

            for($i=0; $i<count($fav); $i++)
            {
                echo "<div style='width 100px; height:100px; background-color:$fav[$i]'>$fav[$i]</div>";
            }
            
        }
    }
    function redirect()
    {
        echo("<script> alert('not from the form DITCH!'); window.location.href=\"form.html\";</script>");
        // header("location:form.html");
    }
?>