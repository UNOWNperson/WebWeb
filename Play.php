<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <script src="JavaScript/GenericFunctions.js"></script>
    <script src="ParticleJS/app.js"></script>
    <script src="ParticleJS/particles.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <div id="navbarButtons">
            <a href="News.php">News</a>
            <a href="Play.php">Avalon</a>
            <a href="Updates.php">Updates</a>
        </div>
        <a href="Settings.php" id="settingsIcon"><img src="Resources/user.png" id="userIcon"></a>
    </div>

    <div id="particles-small">
        <script>particlesJS("particles-small", particleConfigBlackBackground, "partiSmall");</script>
    </div>

    <div id="particles-big" class="hidden"></div>

    <div id="playMenu">
        <button id="playButton" onmouseenter="ChangeText('id', 'playButtonText', '> PLAY <')" onmouseleave="ChangeText('id', 'playButtonText', 'PLAY')"><span id="playButtonText">PLAY</span></button>
    </div>
    <div id="typeMenu" class="hidden">
        <button id="loginButton" class="LoginRegisterButton">Login</button>
        <br />
        <button id="registerButton" class="LoginRegisterButton" onclick="showElement('Placeholder')">Register</button>
    </div>
    <div id="loginMenu" class="hidden">
        <form>
            <input type="text" placeholder="username">
            <br>
            <input type="password" placeholder="password">
            <br>
            <button type="submit">> Login <</button>
        </form>
    </div>

    <video autoplay muted loop id="BGVideo">
        <source src="Resources/WebBG.mp4" type="video/mp4"
    </video>
</body>
<script src="JavaScript/MenuToggles.js"></script>
</html>
