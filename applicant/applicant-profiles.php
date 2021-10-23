<?php
require_once(__DIR__.'/../php/db-config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profiles</title>

    <!-- Custom fonts for this template-->
    <link href="/thesis_git/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="/thesis_git/css/main.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/thesis_git/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/thesis_git/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>



<div class="container">
    <h3 class="mt-4 mb-4">LIST OF APPLICANT PROFILES</h3>
    <form action="inbox-review.php" method="post">
        <?php 

$ft_tables="applicant_details";
if (isset($_POST['ft_tables2'])) {
    $ft_tables = $_POST['ft_tables2'];
}
else{
	
}
$ftable2 = 'applicant_details';
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "thesis_1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

                        $employeeQuery = "SELECT COLUMN_NAME FROM
                        INFORMATION_SCHEMA.COLUMNS 
                        WHERE TABLE_NAME = '$ft_tables'";

                        //start of display
                        //$schemaQuery = "SELECT * FROM $ft_tables";
                        //DATE_FORMAT((dateBirth),'%b %d, %Y')
                        $schemaQuery = "SELECT applicant_id, firstname, lastname, gender,  DATE_FORMAT(dateBirth,'%b %d, %Y') as birthday, city, state, zipcode FROM $ft_tables";
                        echo "<input class=\"form-control\" id=\"ft_tables\" type=\"text\" name=\"ft_tables\" value=\"$ft_tables\"  hidden>";
                        echo "<div>";
                        echo "<table class='col-sm-12'>
                        <tr>";
                        $result3 = mysqli_query($connect, $schemaQuery);
                        $result2 = mysqli_query($connect, $employeeQuery);
                            $th2 = "";
                            while($row2 = mysqli_fetch_array($result2))
                            {
                                $fetchedCol= $row2['COLUMN_NAME'];
                                // if($row2['COLUMN_NAME']=="applicant_id"){
                                //     //echo "<th style=\"font-size:16px;\">$fetchedCol";
                                //     echo "<th class=\"mb-4\" style=\"font-size:16px;\">Applicant No.";
                                //     echo "<hr>";
                                // }
                                if($row2['COLUMN_NAME']=="firstname"){
                                    echo "<th class=\"mb-4\" style=\"font-size:16px;\">Firstname";
                                    echo "<hr>";
                                }
                                else if($row2['COLUMN_NAME']=="lastname"){
                                    echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Lastname";
                                    echo "<hr>";
                                }
                                else if($row2['COLUMN_NAME']=="gender"){
                                    echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Gender";
                                    echo "<hr>";
                                }
                                else if($row2['COLUMN_NAME']=="dateBirth"){
                                    echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Date of Birth";
                                    echo "<hr>";
                                }
                                else if($row2['COLUMN_NAME']=="city"){
                                    echo "<th class=\"mb-4\"  style=\"font-size:16px;\">City";
                                    echo "<hr>";
                                }
                                else if($row2['COLUMN_NAME']=="state"){
                                    echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Province";
                                    echo "<hr>";
                                }
                                else if($row2['COLUMN_NAME']=="zipcode"){
                                    echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Postal Code";
                                    echo "<hr>";
                                }
                                else{
                                    
                                }
                                
                            }
                            echo "<th class=\"mb-4\"  style=\"font-size:16px;\">Actions";
                            echo "<hr>";
                        echo "</th> </tr>";

                            
                            if($ft_tables=="applicant_details"){
                                while($row = mysqli_fetch_array($result3))
                                {
                                $row_num = $row['applicant_id'];
                                echo "<tr>";                                
                                //echo "<td>" .  "<font style=\"font-size: 14px;\" >" . $row['applicant_id'] . "</font>"."</td>";
                                echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['firstname'] . "</font>" ."</td>";
                                echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['lastname'] . "</font>" ."</td>";
                                echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['gender'] . "</font>" ."</td>";
                                echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['birthday'] . "</font>" ."</td>";
                                echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['city'] . "</font>" ."</td>";
                                echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['state'] . "</font>" ."</td>";
                                echo "<td>" .  "<font style=\"font-size: 14px;\">" . $row['zipcode'] . "</font>" ."</td>";
                                echo "<td>" . "<button type=\"submit\" class=\"btn btn-warning mb-2\" value=$row_num id=\"tds2\" name=\"tds2\" >Edit</button>"."</td>";
                                echo "</tr>";
                                }
                            }
                            
                                echo "</table>";
                                
                                mysqli_close($connect);
                    
                        //end of display start of original
						
                        ?>
            

</form>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
           
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('button').click(function() {
    let xhr = new XMLHttpRequest();
    let url = new URL('https://localhost/thesis_git/php/inbox-review.php');
    var row = $(this).closest("tr");
    var tds2 = row.find("td:nth-child(1)").text();

    //alert("You have clicked "+ tds2 +"!");

    
    $.ajax({
        type: "POST",
        url: "inbox-review.php",
        data: {tds2 : tds2},
        success: function (data) {
            console.log(data);
                    xhr.open('GET', url);
                    
            }        
        });
    });
});
</script>
        

</body>
</html>