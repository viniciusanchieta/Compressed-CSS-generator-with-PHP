<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="compressed-css/font-size.min.css">
</head>

<body>
    <div class="container">
        <form name="registrationForm" method="post">
            <div class="row justify-content-md-center text-center">
                <h1>Compressed css generator (margin, font size)</h1>
            </div>
            <div class="row justify-content-md-center">
                <div class="col col-lg-3">
                    <input type="range" name="ageInputName" id="ageInputId" value="100" min="1" max="1000" oninput="ageOutputId.value = ageInputId.value">
                    <output name="ageOutputName" id="ageOutputId">100</output>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col col-lg-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="m" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Margin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="f" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Font-size
                        </label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col col-lg-3">
                    <input type="submit" class="btn-submit btn btn-primary" value="Generate">
                </div>
            </div>
        </form>
    </div>
    <?php
    if ($_POST) {
        if (!file_exists('compressed-css')) {
            //creating the folder
            mkdir(__DIR__ . '/compressed-css/', 0777, true);
        }

        $limit = $_POST['ageInputName'];
        if ($_POST['exampleRadios'] == "m") {            
            $my_file = 'compressed-css/margin.min.css';
            $handle = fopen($my_file, "w") or die('Cannot open file:  ' . $my_file);
            $array_sides = ["top", "bottom", "left", "right"];

            for ($i = 1; $i <= $limit; $i++) {
                foreach ($array_sides as $sides) {
                    $css_pixel = ".margin-$sides-$i-px{margin-$sides:" . $i . "px;}";
                    $data = $css_pixel;    
                    fwrite($handle, $data);                
                }
            }
        } else {
            $my_file = 'compressed-css/font-size.min.css';
            $handle = fopen($my_file, "w") or die('Cannot open file:  ' . $my_file);

            for ($i = 1; $i <= $limit; $i++) {
                $css_pixel = ".font-size-$i-px{font-size:" . $i . "px;}";
                $data = $css_pixel;    
                fwrite($handle, $data);   
            }
        }
        //validating if the folder already exists
    }
    ?>
    <script src="src/js/query-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="src/js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="src/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>