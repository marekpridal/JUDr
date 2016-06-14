<?php
    include_once 'config.php';

    $result = dibi::query('SELECT * FROM klienti ORDER BY ID_Klienti ASC');
    $all = $result->fetchAll();
?>
<!doctype html>
<html lang="cs">
    <?php
        include_once 'head.php';
    ?>
<body class="container">
    <script>
        $(document).ready(function() 
        {
            console.log( "ready!" );
            $('#my-table').dynatable();
            $('#my-table').dynatable({
  table: {
    defaultColumnIdStyle: 'camelCase'
  }
});
        });    
    </script>
    <?php
        include 'navigace.php';
    ?>
    <section>
    
        <article class="table-responsive">
            <table class="table table-hover table-striped" id="my-table">
                <thead>
                    <tr>
                        <th></th><th>ID</th><th>IČO</th><th>Název</th><th>Jméno</th><th>Příjmení</th><th>Telefon</th><th>Email</th><th>Ulice</th><th>Město</th><th>PSČ</th><th>Stát</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($all as $row)
                        {
                        ?>
                            
                    <tr>
                        <td>
                            <form action="podrobnosti.php" method="get">
                                <input type="hidden" name="ID" value="<?php echo $row->ID_Klienti; ?>">
                                <input type="hidden" name="switch" value="1">
                                <input type="submit" value="&#xf129;" class="button"/>
                            </form>
                        </td>
                        <td><?php echo $row->ID_Klienti; ?></td><td><?php echo $row->ICO ?></td><td><?php echo $row->Nazev ?></td><td><?php echo $row->Jmeno; ?></td><td><?php echo $row->Prijmeni; ?></td><td><?php echo $row->Telefon; ?></td><td><?php echo $row->Email; ?></td><td><?php echo $row->Ulice; ?></td><td><?php echo $row->Mesto ?></td><td><?php echo $row->PSC ?></td><td><?php echo $row->Stat ?></td>
                    </tr>
            <?php } ?>
            </tbody>
            </table>
        </article>
    
    </section>
    
</body>
</html>