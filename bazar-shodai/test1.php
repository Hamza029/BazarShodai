<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<style>
    #cart-button { 
        position: fixed;
        bottom: 15px;
        right: 15px; 
    } 
</style>

<script>
    
</script>

<body>
    

    <a id="cart-button" class="hoverable btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>

    <div class="container">
        <h4>COLORS</h4>
        <div class="red white-text">
            div with color
        </div>
        <div class="blue white-text lighten-2">
            div with color
        </div>
        <div class="purple white-text darken-2">
            div with color
        </div>

        <h4>BUTTONS</h4>
        <button class="btn">READ MORE</button>
        <button class="btn waves-effect">READ MORE</button>
        <button class="btn waves-effect waves-light">READ MORE</button>
        <button class="btn btn-large">READ MORE</button>
        <button class="btn waves-effect red">READ MORE</button>
        <button class="btn waves-effect red darken-3 white-text">READ MORE</button>
        <button class="btn brown"><i class="material-icons left">cloud</i>READ MORE</button>

        <h4>ALIGNMENTS</h4>
        <div>
            <h5 class="left-align">left align</h5>
        </div>
        <div>
            <h5 class="right-align">right align</h5>
        </div>
        <div>
            <h5 class="center-align">center align</h5>
        </div>

        <h4>QUICK FLOATS</h4>
        <div class="left">Left Float</div>
        <div class="right">Right Float</div>

        <!-- CLEAR -->
        <div class="clerafix"></div>


        <h4>HOVERABLE</h4>
        <div class="red white-text hoverable">Hoverable content</div>

        <h4>PULSE</h4>
        <div class="blue white-text _pulse">Pulse content</div>


        <h4>SHADOW</h4>
        <p class="z-depth-1">z-depth-1</p>
        <p class="z-depth-2">z-depth-1</p>
        <p class="z-depth-3 red">z-depth-1</p>
        <p class="z-depth-4">z-depth-1</p>
        <p class="z-depth-5">z-depth-1</p>


        <h4>FLOW TEXT</h4>
        <p class="flow-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi non esse cupiditate sunt molestias perspiciatis, iure quaerat animi mollitia eos itaque ipsam ullam porro necessitatibus cumque exercitationem beatae officia voluptas! In, laudantium ducimus dolore, labore corrupti, ex a ea velit quos quaerat doloribus quis non ullam quisquam reiciendis excepturi? Voluptatibus.</p>


        <h4>RESPONSIVE IMAGE</h4>
        <img src="https://i.pinimg.com/originals/f9/23/f8/f923f8e0c66c6f45eace8c86a302189c.jpg" alt=""
            class="responsive-img hoverable">
        <img src="https://img5.goodfon.com/wallpaper/nbig/0/f2/the-witcher-3-wild-hunt-hunter-vedmak-geralt-geralt-protagon.jpg" alt=""
            class="responsive-img circle">


        <nav>
            <div class="nav-wrapper blue">
                <a href="#" class="brand-logo">LOGO</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </nav>

        <br><br>

        <nav>
            <div class="nav-wrapper red">
                <a href="#" class="right brand-logo">LOGO</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </nav>

        <br><br>

        <nav>
            <div class="nav-wrapper green">
                <a href="#" class="center brand-logo">LOGO</a>
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!">One</a></li>
                    <li><a href="#!">Two</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">Three</a></li>
                </ul>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li>
                        <a href="" class="dropdown-button" data-activates="dropdown1">
                            Dropdown
                        </a>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </nav>


        <h4>SEARCHBAR</h4>
        <nav>
            <div class="nav-wrapper">
                <form action="">
                    <div class="input-field">
                        <input id="search" type="search" required>
                        <label for="search" class="label-icon">
                            <i class="material-icons">search</i>
                        </label>
                    </div>
                </form>
            </div>
        </nav>


        <h4>CARD</h4>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Card Title</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Card Title</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Card Title</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>







        

    </div>


    
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
        $(document).ready(function(){
            M.toast({html: 'I am a toast!'});
        });
    </script>
</body>



</html>