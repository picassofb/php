<?php

require_once("includes/database.php");
require_once("includes/color.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1>Welcome :)</h1>
    </div>
</div>

<br><br>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover table-striped table-bordered" id="table_colors">
            <tr>
                <th>Colors</th>
                <th>Votes</th>
            </tr>
                <?php

                    $result = Color::find_all_colors();

                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td> <a href='#'  onclick=\"countVotes('" . $row['Color'] . "');\">" . $row['Color'] . "  </a></td>";
                        echo "<td id='" . $row['Color'] . "' class = 'vote' ></td>";
                        echo "</tr>";
                    }


                ?>
            <tr>
                <th><a href="#" onclick="sumVotes();">Total</a></th>
                <th id="total"></th>
            </tr>

        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-md-offset-3">
        <a class="btn btn-primary" href="test.zip" role="button">Download Project</a>
    </div>
</div>


<script type="text/javascript">

    // Function to read the number of votes of a color clicked
    function countVotes(color) {
        $.ajax({
            type: "GET",
            url: 'obtain_votes.php',
            data: "color="+color,
            success:function(votes) {
                $("#" + color).html(votes);
            }
        });
    }

    //Function to Sum all votes clicked
    function sumVotes() {
        var sum = 0;
        $("#table_colors").each(function() {
            $(this).find('.vote').each(function(){
                //Sum only if number
                var value = parseInt( $(this).html());
                if (!isNaN(value)){
                    sum += value;
                }

            });
        });
        $("#total").html(sum);
    }
</script>

</body>
</html>
