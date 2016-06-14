<?php
    include_once 'config.php';

    $result = dibi::query('SELECT * FROM mobily ORDER BY Kod_telefonu DESC');
    $all = $result->fetchAll();
    $pocet = dibi::query('select COUNT(Kod_telefonu) from mobily');
    $count = $pocet->fetchSingle();
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
                        <th></th><th>ID</th><th>Výrobce</th><th>Typ</th><th>Cena</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($all as $row)
                        {
                        ?>
                            
                    <tr><td><form action="podrobnosti.php" method="get">
<input type="hidden" name="ID" value="<?php echo $row->Kod_telefonu; ?>">
<input type="submit" value="&#xf129;" class="button"/>
</form></td><td><?php echo $row->Kod_telefonu; ?></td><td><?php echo $row->Vyrobce; ?></td><td><?php echo $row->Typ; ?></td><td><?php echo $row->Cena_bez_DPH." Kč"; ?></td></tr>
            <?php } ?>
            </tbody>
            </table>
        </article>
    
    </section>
    
</body>
</html>