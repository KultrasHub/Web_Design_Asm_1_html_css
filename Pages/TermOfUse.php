<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Term Of Use</title>
    <link rel="stylesheet" href="CSS/TermOfUseStyle.css">
    <link rel="stylesheet" href="CSS/BareBearsStyle.css">
    <link rel="stylesheet" href="CSS/Cookie.css">
    <script src="JS/BareBearsJavascript.js"></script>

</head>

<body>
    <header>
        <a href="Home.html" class="LogoName">
            <img class="logo" src="../Image/Essen/barebear.png" alt="logo">
            <span>Bare Bears</span>
        </a>

        <ul class="navLinks" id="navigationBar">
            <li onclick="location.href='Home.html'"><a href="Home.html">Home</a></li>
            <li onclick="location.href='AboutUs.html'"><a href="AboutUs.html">About Us</a></li>
            <li onclick="location.href='Fees.html'"><a href="Fees.html">Fees</a></li>
            <li onclick="location.href='FAQs.html'"><a href="FAQs.html">FAQs</a></li>
            <!--Online on desktop-->
            <li class="Browse" id="hoverBrowse">
                <k class="BrowseText">Browse</k>
                <ul class="DropDown">
                    <li class="DropDownContent">Browse Stores by Name
                        <ul class="DropDownContainer">
                            <div class="Holder">
                                <h3>Letters</h3>
                                <div class="letters">
                                    <a href="BrowseStore.html#A">A</a>
                                    <a href="BrowseStore.html#B">B</a>
                                    <a href="BrowseStore.html#C">C</a>
                                    <a href="BrowseStore.html#D">D</a>
                                    <a href="BrowseStore.html#E">E</a>
                                    <a href="BrowseStore.html#F">F</a>
                                    <a href="BrowseStore.html#G">G</a>

                                    <a href="BrowseStore.html#H">H</a>
                                    <a href="BrowseStore.html#I">I</a>

                                    <a href="BrowseStore.html#J">J</a>
                                    <a href="BrowseStore.html#K">K</a>
                                    <a href="BrowseStore.html#L">L</a>
                                    <a href="BrowseStore.html#M">M</a>

                                    <a href="BrowseStore.html#N">N</a>
                                    <a href="BrowseStore.html#O">O</a>
                                    <a href="BrowseStore.html#P">P</a>
                                    <a href="BrowseStore.html#Q">Q</a>

                                    <a href="BrowseStore.html#R">R</a>
                                    <a href="BrowseStore.html#S">S</a>
                                    <a href="BrowseStore.html#T">T</a>
                                    <a href="BrowseStore.html#U">U</a>

                                    <a href="BrowseStore.html#V">V</a>
                                    <a href="BrowseStore.html#W">W</a>
                                    <a href="BrowseStore.html#X">X</a>
                                    <a href="BrowseStore.html#Y">Y</a>
                                    <a href="BrowseStore.html#Z">Z</a>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="DropDownContent DropDownEnd">Browse Stores by Category
                        <ul class="DropDownContainer">
                            <li class="DropDownDetail" onclick="location.href='BrowseStoreCate.html'">
                                <span> Book Stores</span>
                            </li>
                            <li class="DropDownDetail" onclick="location.href='BrowseStoreCate.html'">
                                <span> Toy Stores</span>
                            </li>
                            <li class="DropDownDetail" onclick="location.href='BrowseStoreCate.html'">
                                <span> Clothing Stores</span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!--Online on lower than desktop-->
            <li id="buttonBrowse">
                <input type="checkbox" id='DropDown'>
                <label class="BrowseText" for="DropDown">
                    <div>Browse</div>
                </label>

                <ul class="DropDown">
                    <li class="DropDownContent">
                        <input type="checkbox" id='LettersDropDown'>
                        <label for="LettersDropDown" class="DropDownLabel">
                            <div>Browse Stores by Name</div>
                        </label>
                        <!--Box-->
                        <ul class="DropDownContainer">
                            <div class="Holder">
                                <h3>Letters</h3>
                                <div class="letters">
                                    <a href="BrowseStore.html#A">A</a>
                                    <a href="BrowseStore.html#B">B</a>
                                    <a href="BrowseStore.html#C">C</a>
                                    <a href="BrowseStore.html#D">D</a>
                                    <a href="BrowseStore.html#E">E</a>
                                    <a href="BrowseStore.html#F">F</a>
                                    <a href="BrowseStore.html#G">G</a>

                                    <a href="BrowseStore.html#H">H</a>
                                    <a href="BrowseStore.html#I">I</a>

                                    <a href="BrowseStore.html#J">J</a>
                                    <a href="BrowseStore.html#K">K</a>
                                    <a href="BrowseStore.html#L">L</a>
                                    <a href="BrowseStore.html#M">M</a>

                                    <a href="BrowseStore.html#N">N</a>
                                    <a href="BrowseStore.html#O">O</a>
                                    <a href="BrowseStore.html#P">P</a>
                                    <a href="BrowseStore.html#Q">Q</a>

                                    <a href="BrowseStore.html#R">R</a>
                                    <a href="BrowseStore.html#S">S</a>
                                    <a href="BrowseStore.html#T">T</a>
                                    <a href="BrowseStore.html#U">U</a>

                                    <a href="BrowseStore.html#V">V</a>
                                    <a href="BrowseStore.html#W">W</a>
                                    <a href="BrowseStore.html#X">X</a>
                                    <a href="BrowseStore.html#Y">Y</a>
                                    <a href="BrowseStore.html#Z">Z</a>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <!--Box-->
                    <li class="DropDownContent DropDownEnd">
                        <input type="checkbox" id='CateDropDown'>
                        <label for="CateDropDown" class="DropDownLabel">
                            <div>Browse Stores by Category</div>
                        </label>
                        <ul class="DropDownContainer">
                            <!--Detail-->
                            <li class="DropDownDetail" onclick="location.href='BrowseStoreCate.html'">
                                <span> Book Stores</span>
                            </li>
                            <!--Detail-->
                            <li class="DropDownDetail" onclick="location.href='BrowseStoreCate.html'">
                                <span> Toy Stores</span>
                            </li>
                            <!--Detail-->
                            <li class="DropDownDetail" onclick="location.href='BrowseStoreCate.html'">
                                <span> Clothing Stores</span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <a href="Contact.html" class="contact"> <button type="button" name="button">Contact</button></a>
            <a id="myAcount" class="myAcount" onclick="MyAccount()"><img src="../Image/Profolio/user.png" alt=""></a>
        </ul>
        <div class="headerSimulator">
            <div class="holder">
                <a href="" class="myAcount top_right" onclick="MyAccount()"><img src="../Image/Profolio/user.png"
                        alt=""></a>
                <label class="Ham" for="check" onclick="HamDisplay()">
                    <input type="checkbox" id="check" />
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
        </div>
    </header>
    <div class="background">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ccc" fill-opacity="1"
                    d="M0,224L40,208C80,192,160,160,240,128C320,96,400,64,480,80C560,96,640,160,720,202.7C800,245,880,267,960,256C1040,245,1120,203,1200,170.7C1280,139,1360,117,1400,106.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                </path>
            </svg>
        </div>
    </div>
    <div class="banner">
        <h3 class="BannerName">Bare Bears™ Term Of Use</h3>
        <div class="starter">
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
        </div>
    </div>
    <!--Cookies-->
    <div class="cookiesBar" id="cookies">
        <img src="../Image/FreeCookies.jpg" alt="cookies Logo">
        <span>We use cookies in this website to give you the best experience on our site and show relevant ads. To find
            out more, read <a href="PrivacyPolicy.html">privacy plicy</a> and <a href="">cookie Policy</a></span>
        <div onclick="HideCookie()"> <span>I understand</span></div>
    </div>
    <!--End Cookies-->
    <footer>
        <div class="UpperBar">
            <div class="logoText">Bare Bears <p>with barely best brands</p>
            </div>
            <div class="shop">
                <h1>Top Category</h1>
                <a href="BrowseStore.html">
                    <li>Book Stores</li>
                </a>
                <a href="BrowseStore.html">
                    <li>Toy Stores</li>
                </a>
            </div>
            <div class="Support">
                <h1>Support</h1>

                <a href="#">
                    <li>Order Status</li>
                </a>
                <a href="FAQs.html">
                    <li>FAQs</li>
                </a>
                <a href="Contact.html">
                    <li>Contact Us</li>
                </a>
                <a href="Fees.html">
                    <li>Fees</li>
                </a>
                <a href="#">
                    <li>Order Status</li>
                </a>
                <a href="#">
                    <li>Shipping Information</li>
                </a>
            </div>
            <div class="Language">
                <h1>Language</h1>
                <br>
                🌎
                <select class="language" name="language">

                    <option value="English"> English</option>
                    <option value="Vietnamese">Vietnamese</option>
                    <option value="Korean">Korean</option>
                </select>
            </div>
        </div>
        <div class="LowerBar">
            <section class="CopyRight">
                Copyright© Bare Bears 2021
            </section>
            <section class="Policy">
                <a href="TermOfUse.html">
                    <li>Term Of Service</li>
                </a>
                <a href="PrivacyPolicy.html">
                    <li>Privacy Policy</li>
                </a>
            </section>
        </div>
    </footer>
</body>

</html>
<script type="text/javascript" src="JS/Cookies.js"></script>