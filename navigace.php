   <nav class="navbar navbar-default">
        <div class="container-fluid">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Otevřít navigaci</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Databáze</a>
            </div>
            
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <ul class="nav navbar-nav">
            <li class="navigace-button"><a href="klienti.php">Klienti</a></li>
            <li class="navigace-button"><a href="zamestnanci.php">Zaměstnanci</a></li>
        </ul>
        
      <ul class="nav navbar-nav navbar-right">
            <li class="navigace-button navigace-novy"><a href="vlozit.php?vlozit=1">Nový klient</a></li>
            <li role="separator" class="divider"></li>
            <li class="navigace-button navigace-novy"><a href="vlozit.php?vlozit=2">Nový zaměstnanec</a></li>
            <li role="separator" class="divider"></li>
            <li class="navigace-button" id="login"><a href="#"><?php echo $login_session; ?></a></li>
            <li class="navigace-button"><a href="logout.php">Odhlásit</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
            
       </div>
    </nav>