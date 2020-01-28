<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Compressed CSS generator with PHP</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/font-size.min.css">
    <link rel="stylesheet" href="src/css/margin.min.css">
</head>

<body>
    <div class="container">
        <form name="registrationForm" method="post">
            <div class="row justify-content-md-center text-center">
                <h1>Compressed css generator (margin, font size)</h1>
            </div>
            <div class="row justify-content-md-center">
                <div class="col col-lg-3">
                    <div class="form-group">
                        <input type="range" name="ageInputName" id="ageInputId" value="100" min="1" max="1000" oninput="ageOutputId.value = ageInputId.value">
                        <output name="ageOutputName" id="ageOutputId">100</output><span> px</span>
                    </div>
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
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="f">
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
        //validating if the folder already exists
        if (!file_exists('compressed-css')) {
            //creating the folder
            mkdir(__DIR__ . '/compressed-css/', 0777, true);
        }

        //Loading a variable "$limit" with the value of the input "range"
        $limit = $_POST['ageInputName'];

        //Validation of the "radio" input
        if ($_POST['exampleRadios'] == "m") {
            //Setting the directory and file name to save
            $my_file = 'compressed-css/margin.min.css';

            //fopen - Opens file or URL
            $handle = fopen($my_file, "w") or die('Cannot open file:  ' . $my_file);

            //Defining margin edges
            $array_sides = ["top", "bottom", "left", "right"];

            //Generating the css and saving the file
            for ($i = 1; $i <= $limit; $i++) {
                foreach ($array_sides as $sides) {
                    $css_pixel = ".margin-$sides-$i-px{margin-$sides:" . $i . "px;}";
                    $data = $css_pixel;

                    //fwrite() writes the contents of string to the file stream pointed to by handle. 
                    fwrite($handle, $data);
                }
            }
        } else {
            //Setting the directory and file name to save
            $my_file = 'compressed-css/font-size.min.css';

            //fopen - Opens file or URL
            $handle = fopen($my_file, "w") or die('Cannot open file:  ' . $my_file);

            //Generating the css and saving the file
            for ($i = 1; $i <= $limit; $i++) {
                $css_pixel = ".font-size-$i-px{font-size:" . $i . "px;}";
                $data = $css_pixel;

                //fwrite() writes the contents of string to the file stream pointed to by handle. 
                fwrite($handle, $data);
            }
        }
    }
    ?>
    <script src="src/js/query-3.4.1.slim.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
</body>

</html>