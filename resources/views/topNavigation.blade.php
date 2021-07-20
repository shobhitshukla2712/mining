<ul class="nav navbar-nav navbar-right cl-effect-15">
    <?php
    if( is_array( $userData ) && ( count( $userData ) == 0 ) )
    {
    ?>
        <li class="hidden"><a class="page-scroll" href="#page-top"></a> </li>
        <li><a class="page-scroll scroll" href="#home">Home</a></li>
        <li><a class="page-scroll scroll" href="#about">About</a></li>
        <li><a class="page-scroll scroll" href="#stats">Stats</a></li>
        <li><a class="page-scroll scroll" href="#contact">Contact</a></li>
        <li><a class="btn_login_link">Login</a></li>
    <?php
    }
    else
    {
    ?>
        <li class="hidden"><a class="page-scroll" href="#page-top"></a> </li>
        <?php
        if( Request::path() == '/' )
        {
        ?>
            <li><a class="page-scroll scroll" href="#home">Home</a></li>
            <li><a class="page-scroll scroll" href="#about">About</a></li>
            <li><a class="page-scroll scroll" href="#stats">Stats</a></li>
            <li><a class="page-scroll scroll" href="#contact">Contact</a></li>
        <?php
        }
        else
        {
        ?>
            <li><a class="page-scroll" href="{{ url('/#home') }}">Home</a></li>
            <li><a class="page-scroll" href="{{ url('/#about') }}">About</a></li>
            <li><a class="page-scroll" href="{{ url('/#stats') }}">Stats</a></li>
            <li><a class="page-scroll" href="{{ url('/#contact') }}">Contact</a></li>
        <?php  
        }
        ?>

        <li><a class="page-scroll" href="{{ url('profile') }}">Profile</a></li>
        <li><a class="page-scroll" href="{{ url('logout') }}">Logout</a></li>
    <?php
    }
    ?>
</ul>