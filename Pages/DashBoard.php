<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/TermOfUseStyle.css">
    <link rel="stylesheet" href="Css/DashBoardStyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Dates', 'Active', 'New Member'],
            ['20/05/2021', 4, 1],
            ['', 5, 2],
            ['20/05/2021', 2, 3],
            ['', 4, 1],
            ['21/05/2021', 12, 4],
            ['', 2, 0],
            ['23/05/2021', 8, 3]
        ]);

        var options = {
            title: '',
            hAxis: {
                title: 'Dates',
                titleTextStyle: {
                    color: '#333'
                }
            },
            vAxis: {
                minValue: 0,
                maxValue: 15
            },
            backgroundColor: "#f5f5f5"

        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Pro Seller', 'FbB', 'FbM '],
            ['18/05/2021', 1312, 2421, 214],
            ['', 521, 214, 512],
            ['', 289, 2781, 28],
            ['26/05/2021', 1321, 540, 2829]
        ]);

        var options = {
            title: '',
            curveType: 'function',
            legend: {
                position: 'bottom'
            },
            backgroundColor: "#f5f5f5"
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
    </script>
    <title>Dash Board</title>
</head>

<body>
    <input type="checkBox" id="check">
    <header>
        <div class="left">
            <label class="Ham" for="check">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </label>
            <img src="../Image/Essen/barebear.png" alt="">
            <span class="LogoName">Bare Bears</span>
        </div>
        <div class="right">
            <a class="home" href="Home.php">Home</a>
            <div class="SearchBox">
                <input type="text" placeholder="no developed yet">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <div class="LogOut" onclick="location.href='MyAccount-Login.php'">
                Log Out
            </div>
        </div>
    </header>
    <!--SideBar-->
    <div class="sideBar">
        <div class="sideButton"><i class="fa fa-desktop"></i><span>DashBoard</span></div>
        <div class="sideButton"><i class="fa fa-info-circle"></i><span>About Us</span></div>
        <div class="sideButton"><i class="fa fa-handshake-o" aria-hidden="true"></i><span>Term Of Service</span></div>
        <div class="sideButton"><i class="fa fa-user-secret" aria-hidden="true"></i></i><span>Privacy Policy</span>
        </div>
        <div class="sideButton"><i class="fa fa-wrench" aria-hidden="true"></i></i><span>Setting</span></div>
    </div>
    <div class="main">
        <!--Dash Board-->
        <div class="DashBoard" id="DashBoard">
            <div class="overview">
                <div class="overviewBox">
                    <div class="info">
                        <span class="data">29</span>
                        <span class="title">Activea Users this week</span>
                    </div>
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <div class="overviewBox">
                    <div class="info">
                        <span class="data">8</span>
                        <span class="title">New members this week</span>
                    </div>
                    <i class="fa fa-user-times" aria-hidden="true"></i>
                </div>
                <div class="overviewBox">
                    <div class="info">
                        <span class="data">3</span>
                        <span class="title">New Purchases this week</span>
                    </div>
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </div>
                <div class="overviewBox">
                    <div class="info">
                        <span class="data">1000</span>
                        <span class="title">New searches this week</span>
                    </div>
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
            </div>
            <div class="charts">
                <span class="Title">Charts over the last 7 days</span>
                <div class="container">
                    <div class="chartBox">
                        <div class="chartName"><span> Active and New Users</span></div>
                        <div id="chart_div" style="width: 95%; height: 250px;"></div>
                    </div>
                    <div class="chartBox">
                        <div class="chartName"><span> Revenue</span></div>
                        <div id="curve_chart" style="width: 100%; height: 250px"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--End DashBoard-->
        <!--About Us-->
        <div class="AboutUs" id="AboutUs">
            <form action="Upload.php" method="post" enctype="multipart/form-data">
                <div class="Starter">
                    <h1>Our Team</h1>
                </div>

                <div class="display">

                    <div class="box">
                        <?php 
                        $targetFile="../Uploads/AboutUs/kultras.png";
                        if(file_exists("../Uploads/AboutUs/kultras.png"))
                        {
                            $targetFile="../Uploads/AboutUs/kultras.png";
                        }
                        echo'<img id="KhoaPreview" class="clickImg" src='.$targetFile.' alt="">'
                        ?>
                        <div class="shadowCover"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                        <div class="fileUploadBox">
                            <input class="imgUploader" type="file" id="KhoaUpload" name="KhoaUpload">
                        </div>
                        <br>
                        <span class="name">Tran Nguyen Anh Khoa</span>
                        <br>
                        <span class="id"> s3863956</span>

                    </div>
                    <div class="box">
                        <?php  
                    $targetFile;
                    if(file_exists("../Uploads/AboutUs/kent.png"))
                    {
                        $targetFile="../Uploads/AboutUs/kent.png";
                    }
                        echo'<img id="KentPreview"class="clickImg" src='.$targetFile.' alt="">'
                        ?>
                        <div class="shadowCover"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                        <div class="fileUploadBox">
                            <input class="imgUploader" type="file" id="KentUpload" name="KentUpload">
                        </div>
                        <br>
                        <span class="name">Luu Minh Khang</span>
                        <br>
                        <span class="id"> s3863969</span>

                    </div>
                    <div class="box">
                        <?php 
                        $targetFile="../Uploads/AboutUs/phong.png";
                        if(file_exists("../Uploads/AboutUs/phong.png"))
                        {
                            $targetFile="../Uploads/AboutUs/phong.png";
                        }
                        echo'<img id="PhongPreview" class="clickImg" src='.$targetFile.' alt="">'
                        ?>
                        <div class="shadowCover"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                        <div class="fileUploadBox">
                            <input class="imgUploader" type="file" id="PhongUpload" name="PhongUpload">
                        </div>
                        <br>
                        <span class="name">Ho Buu Quoc Phong</span>
                        <br>
                        <span class="id"> s3803566</span>

                    </div>
                </div>
                <div class="submitBox">
                    <input type="submit" value="complete" name="submitBut">
                </div>
            </form>
        </div>
        <!--End About Us-->
        <!--TermOfUse-->
        <div class="banner tos" id="TermOfService">
            <h3 class="BannerName">Bare Bears™ Term Of Use</h3>
            <div class="starter" id="contentTOS">
                <?php 
                //extract data from file
                $path="../Uploads/TermOfUse/TermOfUse.txt";
                $file=file_get_contents($path);
                //break text info paragraphs
                $paragraphs=explode("-----",$file);
                echo'
                <p class="Welcome">'.$paragraphs[0].'</p>
                <p class="Subwelcome">'.$paragraphs[1].' </p>
                <p class="Announcement"> '.$paragraphs[2].'</p>
                <p class="contentHead">'.$paragraphs[3].'</p>
                <p>'.$paragraphs[4].'</p>
                <p class="contentHead">'.$paragraphs[5].'</p>
                <p>'.$paragraphs[6].'</p>
                <p class="contentHead">'.$paragraphs[7].'</p>
                <p>'.$paragraphs[8].'</p>

                <p class="contentHead">'.$paragraphs[9].'</p>
                <p>'.$paragraphs[10].'</p>
                <p class="contentHead">'.$paragraphs[11].'</p>
                <p>'.$paragraphs[12].'
                </p>

                <p class="ending">'.$paragraphs[13].'
                </p>'
                ?>
                <!--Hidden Input when edited data will be sent to-->
                <div class="hiddenInput">
                    <form action="editText_TOS.php" method="post" enctype="multipart/form-data" onsubmit="">
                        <div style="display:none;">
                            <textarea class="hiddenTOS" name="textAreaTOS" id="hiddenTOS" cols="30"
                                rows="10"></textarea>

                        </div>
                        <div class="textButtonBox">
                            <input type="submit" name="submit" class="textButton" onclick="CollectTOS();">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Privacy Policy-->
        <div class="banner pol" id="PrivacyPolicy">
            <h3 class="BannerName">Bare Bears™ Policy</h3>
            <div class="starter" id="contentPol">
                <?php 
                //extract data from file
                $path="../Uploads/PrivacyPolicy/PrivacyPolicy.txt";
                $file=file_get_contents($path);
                //break text info paragraphs
                $paragraphs=explode("-----",$file);
                echo'
                <p class="Welcome">'.$paragraphs[0].'</p>
                <p class="Subwelcome">'.$paragraphs[1].' </p>
                <p class="Announcement"> '.$paragraphs[2].'</p>
                <p class="contentHead">'.$paragraphs[3].'</p>
                <p>'.$paragraphs[4].'</p>
                <p class="contentHead">'.$paragraphs[5].'</p>
                <p>'.$paragraphs[6].'</p>
                <p class="contentHead">'.$paragraphs[7].'</p>
                <p>'.$paragraphs[8].'</p>

                <p class="contentHead">'.$paragraphs[9].'</p>
                <p>'.$paragraphs[10].'</p>
                <p class="contentHead">'.$paragraphs[11].'</p>
                <p>'.$paragraphs[12].'
                </p>

                <p class="ending">'.$paragraphs[13].'
                </p>'
                ?>
                <!--Hidden Input when edited data will be sent to-->
                <div class="hiddenInput">
                    <form action="editText_Pol.php" method="post" enctype="multipart/form-data" onsubmit="">
                        <div style="display:none;">
                            <textarea class="hiddenPol" name="textAreaPol" id="hiddenPol" cols="30"
                                rows="10"></textarea>

                        </div>
                        <div class="textButtonBox">
                            <input type="submit" name="submit" class="textButton" onclick="CollectPol();">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End Privacy Policy-->
        <!--Setting-->
        <div class="Setting" id="Setting">
            <img src="../Image/DashBoardImg/waula.jpg" alt="">
            <span>This sectiom is underdevelopment!</span>
        </div>
        <!--textBox-->
        <div class="textBox" id="textBox">
            <!--A cancel form serving as a container-->
            <form action="" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault()">
                <div class="EditTitle">Edit</div>
                <textarea name="editBox" id="editBox" cols="90" rows="15"></textarea>
                <input type="checkBox" name="checkBox" class="checkBox" value="1" id="TOSCheckBox">
                <div class="buttonArea">
                    <button type="button" class="textButton" onclick="CancelTextBox();"> Cancel
                    </button>
                    <button type="button" class="textButton" onclick="SaveTextBox();"> Complete
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="JS/Dashboard_Edit_AboutUs.js"></script>
<script type="text/javascript" src="JS/DashBoard_Edit_TextBox.js"></script>
<script type="text/javascript" src="JS/DashBoardSideBar.js"></script>

</html>