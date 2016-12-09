<nav class="navbar navbar-default">
    <div class="container-fluid">
       
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
                <img height="35" width="35" src="/assets/images/logo.png">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
            
            <ul class="nav navbar-nav">
                
                {menudata}
                <li>
                    <a href="{link}">{name}</a>
                </li>
                {/menudata}
            </ul>
            <p class="navbar-text navbar-right">Role: {userrole}</p>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>