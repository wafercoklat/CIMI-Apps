real_escape_string($_POST['PL']);
    $query = "SELECT ID FROM users WHERE user_email = '{$email}' LIMIT 1;";
    $results = $mysqli->query($query);
    if($results->num_rows == 0)
    {
        echo "true";  //good to register
    }
    else
    {
        echo "false"; //already registered
    }
}
else
{
    echo "false"; //invalid post var
}

?>