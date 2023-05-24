<?php require_once "Navbar.php" ?>
<body>
    <div id="particles-small">
        <script>particlesJS("particles-small", particleConfigSmall, "partiSmall");</script>
    </div>
    <div id="particles-big" class="hidden">

    </div>

    <div id="playMenu">
        <button class="clickButton"
                onclick="HideShowFade('playMenu', 'typeMenu')" >
                <span id="playButtonText">PLAY</span>
        </button>
    </div>
    <div id="typeMenu" class="hidden">
        <button class="clickButton-Small"
                onclick="HideShowFade('typeMenu', 'loginMenu')
                         HideShowFade('particles-small', 'particles-big')">
            <span id="loginButtonText">LOGIN</span>
        </button>
        <button class="clickButton-Small"
                onclick="HideShowFade('typeMenu', 'registerMenu')
                         HideShowFade('particles-small', 'particles-big')">
            <span id="registerButtonText">REGISTER</span>
        </button>
    </div>
    <div id="loginMenu" class="hidden">
        <form>
            <span class="bigSpan">LOGIN</span>
            <br>
            <input type="text" name="loginUsername" placeholder="username">
            <br>
            <input type="password" name="loginPassword" placeholder="password">
            <br>
            <input type="hidden" name="login">
            <button type="submit" class="clickButton-Smaller" id="PHPLoginButtonText">CONTINUE</button>
        </form>
    </div>
    <div id="registerMenu" class="hidden">
        <form>
            <span class="bigSpan">REGISTER</span>
            <br>
            <input type="email" name="registerEmail" placeholder="e-mail">
            <br>
            <input type="text" name="registerUsername" placeholder="username">
            <br>
            <input type="password" name="registerPassword" placeholder="password">
            <br>
            <input type="hidden" name="register">
            <button type="submit" class="clickButton-Small" id="PHPRegisterButtonText">BEGIN</button>
        </form>
    </div>

    <video autoplay muted loop id="BGVideo">
        <source src="Resources/WebBG.mp4" type="video/mp4"
    </video>
</body>
<script src="JavaScript/MenuToggles.js"></script>
</html>