<?php
    include_once 'config.php';

    $id=$_GET["ID"];
    $volba=$_GET["switch"];
?>
<!doctype html>
<html lang="cs">
   <?php
        include_once 'head.php';
    ?>
<body class="container">
     <?php
        include 'navigace.php';
    ?>
<header>
    <h1></h1>
</header>
    <?php
    switch($volba)
    {
        case 1:
            {
                $result = dibi::query('SELECT * FROM klienti WHERE ID_klienti =', $id);
                $all = $result->fetchAll(); 
                ?>
        <article class="table-responsive">
            <table class="table table-hover table-striped" id="my-table">
                <thead>
                    <tr>
                        <th>ID</th><th>ICO</th><th>Název</th><th>Jméno</th><th>Příjmení</th><th>Telefon</th><th>Email</th><th>Ulice</th><th>Město</th><th>PSČ</th><th>Stát</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($all as $row)
                        {
                        ?>
                            
                    <tr>
                        <td><?php echo $row->ID_Klienti; ?></td><td><?php echo $row->ICO ?></td><td><?php echo $row->Nazev ?></td><td><?php echo $row->Jmeno; ?></td><td><?php echo $row->Prijmeni; ?></td><td><?php echo $row->Telefon; ?></td><td><?php echo $row->Email; ?></td><td><?php echo $row->Ulice; ?></td><td><?php echo $row->Mesto ?></td><td><?php echo $row->PSC ?></td><td><?php echo $row->Stat ?></td>
                    </tr>
            <?php } ?>
            </tbody>
            </table>
        </article>    
            <?php
            }break;
        case 2:
            {
                $result = dibi::query('SELECT * FROM zamestnanci WHERE ID_zamestnanci =', $id);
                $all = $result->fetchAll(); 
                ?>
                    <section>
                        <article class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tr><th>ID</th><th>Jmeno</th><th>Prijmeni</th><th>Uživatelské jméno</th></tr>
                                <?php
                                    foreach($all as $row)
                                        {
                                ?>
                                    <tr><td><?php echo $row->ID_zamestnanci; ?></td><td><?php echo $row->Jmeno; ?></td><td><?php echo $row->Prijmeni; ?></td><td><?php echo $row->username; ?></td>
                                </tr>
                            <?php 
                                    } 
                            ?>    
                            </table>
                        </article>
    
                </section>
            <?php
            }break;
    }?>
</body>
</html>