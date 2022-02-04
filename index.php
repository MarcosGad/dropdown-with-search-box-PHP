<?php 
$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

$query = "
    SELECT country_name FROM apps_countries 
    ORDER BY country_name ASC
";

$result = $connect->query($query);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- https://www.webslesson.info/2022/02/bootstrap-5-select-dropdown-with-search-box-using-vanilla-javascript-php-mysql.html -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="dselect.js"></script>

        <title>Select Dropdown with Search Box using JavaScript with PHP</title>
    </head>
    <body>

        <div class="container">
            <h1 class="mt-2 mb-3 text-center text-primary">Select Dropdown with Search Box using JavaScript with PHP</h1>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <select name="select_box" class="form-select" id="select_box">
                        <option value="">Select Country</option>
                        <?php 
                        foreach($result as $row)
                        {
                            echo '<option value="'.$row["country_name"].'">'.$row["country_name"].'</option>';
                        }
                        ?>  
                    </select>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>      
            <br />
            <br />
        </div>
    </body>
</html>

<script>

    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });

</script>
