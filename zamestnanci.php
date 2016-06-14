<?php
    include_once 'config.php';

    $result = dibi::query('SELECT * FROM zamestnanci ORDER BY ID_zamestnanci ASC');
    $all = $result->fetchAll();
    $pocet = dibi::query('select COUNT(ID_zamestnanci) from zamestnanci');
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
                        <th></th><th>ID</th><th>Jméno</th><th>Příjmení</th><th>Telefon</th><th>Email</th><th>Uživatelské jméno</th>
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
                                <input type="hidden" name="ID" value="<?php echo $row->ID_zamestnanci; ?>">
                                <input type="hidden" name="switch" value="1">
                                <input type="submit" value="&#xf129;" class="button"/>
                            </form>
                        </td>
                        <td><?php echo $row->ID_zamestnanci; ?></td><td><?php echo $row->Jmeno; ?></td><td><?php echo $row->Prijmeni; ?></td><td><?php echo $row->Telefon; ?></td><td><?php echo $row->Email; ?></td><td><?php echo $row->username; ?></td>
                    </tr>
            <?php } ?>
            </tbody>
            </table>
        </article>
    
    </section>
    
</body>
</html>