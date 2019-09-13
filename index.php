<head>
    <title>LinkedIn Feed</title>
    <?php
        //Background-Image
        // To set the Background-Image, please enter the name of the folder in the background.config
        // The Folder should contain 5 images with the names bg0.jpg, bg1.jpg, ..., bg4.jpg
        // The Image will be chosen randomly
        $bgfolder = file_get_contents("background.config");
        $rand = rand(0, 4);
        $background = $bgfolder . "/bg" . $rand . ".jpg";

        //Calculate Timeout
        $columns = [];
        $columns[0] = count(scandir("column1")) -2;
        $columns[1] = count(scandir("column2")) -2;
        $columns[2] = count(scandir("column3")) -2;
        $columns[3] = count(scandir("column4")) -2;
        sort($columns);
        $minlength = $columns[0];
        $minlength = $minlength * 100;
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        * {
        box-sizing: border-box;
        }

        body {
        margin: 0;
        font-family: Arial;
        background-image: url("<?php echo $background;?>");
        background-attachment:fixed;
        background-size: cover;
        }

        ul {
            list-style: none;
        }

        .header {
        text-align: center;
        padding: 32px;
        }

        .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        padding: 0 4px;
        float: left;
        }

        /* Create four equal columns that sits next to each other */
        .column {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
        max-width: 25%;
        padding: 0 4px;
        }

        .column img {
        margin-top: 8px;
        vertical-align: middle;
        width: 100%;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
        .column {
            -ms-flex: 50%;
            flex: 50%;
            max-width: 50%;
        }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
        .column {
            -ms-flex: 100%;
            flex: 100%;
            max-width: 100%;
        }
        }
    </style>
</head>
<body onload="pageScroll(); StartExtendPage();">
    <div class="row">
        <ul class="column" id="1">
            <?php
                $folder = scandir("column1");
                foreach($folder as $pic){
                    if($pic == "." or $pic == ".."){
                        // Do nothing
                    } else {?>
                        <li><img src="column1/<?php echo $pic;?>"></li>
                    <?php
                    }
                }
            ?>
        </ul>
        <ul class="column" id="2">
            <?php
                $folder = scandir("column2");
                foreach($folder as $pic){
                    if($pic == "." or $pic == ".."){
                        // Do nothing
                    } else {?>
                        <li><img src="column2/<?php echo $pic;?>"></li>
                    <?php
                    }
                }
            ?>
        </ul>
        <ul class="column" id="3">
            <?php
                $folder = scandir("column3");
                foreach($folder as $pic){
                    if($pic == "." or $pic == ".."){
                        // Do nothing
                    } else {?>
                        <li><img src="column3/<?php echo $pic;?>"></li>
                    <?php
                    }
                }
            ?>
        </ul>
        <ul class="column" id="4">
            <?php
                $folder = scandir("column4");
                foreach($folder as $pic){
                    if($pic == "." or $pic == ".."){
                        // Do nothing
                    } else {?>
                        <li><img src="column4/<?php echo $pic;?>"></li>
                    <?php
                    }
                }
            ?>
        </ul>
    </div>
    <script>
        // Scroll down
        function pageScroll() {
            window.scrollBy(0,1);
            scrolldelay = setTimeout(pageScroll,16);
        }
        function StartExtendPage() {
            console.log("Page extension started... Timeout in <?php echo $minlength;?> ms.");
            StartExtendDelay = setTimeout(extendPage,<?php echo $minlength;?>);
        }
        function extendPage() {
            //1
            <?php
                $folder = scandir("column1");
                foreach($folder as $pic){
                    if($pic == "." or $pic == ".."){
                        // Do nothing
                    } else {?>
                        var node = document.createElement("LI"); 
                        var img = document.createElement("img");
                        img.src = "column1/<?php echo $pic; ?>";
                        node.appendChild(img);
                        document.getElementById("1").appendChild(node);
                    <?php
                    }
                }
            ?>
            //2
            <?php
                $folder = scandir("column2");
                foreach($folder as $pic){
                    if($pic == "." or $pic == ".."){
                        // Do nothing
                    } else {?>
                        var node = document.createElement("LI"); 
                        var img = document.createElement("img");
                        img.src = "column2/<?php echo $pic; ?>";
                        node.appendChild(img);
                        document.getElementById("2").appendChild(node);
                    <?php
                    }
                }
            ?>
            //3
            <?php
                $folder = scandir("column3");
                foreach($folder as $pic){
                    if($pic == "." or $pic == ".."){
                        // Do nothing
                    } else {?>
                        var node = document.createElement("LI"); 
                        var img = document.createElement("img");
                        img.src = "column3/<?php echo $pic; ?>";
                        node.appendChild(img);
                        document.getElementById("3").appendChild(node);
                    <?php
                    }
                }
            ?>
            //4
            <?php
                $folder = scandir("column4");
                foreach($folder as $pic){
                    if($pic == "." or $pic == ".."){
                        // Do nothing
                    } else {?>
                        var node = document.createElement("LI"); 
                        var img = document.createElement("img");
                        img.src = "column4/<?php echo $pic; ?>";
                        node.appendChild(img);
                        document.getElementById("4").appendChild(node);
                    <?php
                    }
                }
            ?>
            console.log("Extension successfull.");
            extendDelay = setTimeout(extendPage,<?php echo $minlength; ?>);
        }
    </script>
</body>