<?php
    include_once 'config.php';

    $result = dibi::query('
        SELECT spisy.Spisova_znacka,k.Nazev AS Klient_nazev,k.Jmeno AS Klient_jmeno,k.Prijmeni AS Klient_prijmeni,p.Nazev AS Proti_nazev,p.Jmeno AS Proti_jmeno,p.Prijmeni AS Proti_prijmeni,spisy.Nazev_spisu,zam.Jmeno AS Zam_jmeno,zam.Prijmeni AS Zam_prijmeni,spisy.Taxa,spisy.Pausal,spisy.Datum_zadani FROM spisy
        INNER JOIN klienti AS k on spisy.Klient=k.ID_Klienti
        INNER JOIN klienti AS p on spisy.Protistrana=p.ID_Klienti
        LEFT JOIN spisy_has_zamestnanci on Spisova_znacka=Spisy_Spisova_Znacka
        LEFT JOIN zamestnanci AS zam on Zamestnanci_ID_zamestnanci=ID_zamestnanci
        ORDER BY spisy.Spisova_znacka ASC
        ');
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
                        <th></th><th>Spisová značka</th><th>Klient</th><th>Protistrana</th><th>Název spisu</th><th>Zaměstnanec</th><th>Taxa</th><th>Paušál</th><th>Datum zadaní</th>
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
                                <input type="hidden" name="ID" value="<?php echo $row->Spisova_znacka; ?>">
                                <input type="hidden" name="switch" value="3">
                                <input type="submit" value="&#xf129;" class="button"/>
                            </form>
                        </td>
                        <td><?php echo $row->Spisova_znacka; ?></td><td><?php echo $row->Klient_nazev." ".$row->Klient_jmeno." ".$row->Klient_prijmeni; ?></td><td><?php echo $row->Proti_nazev." ".$row->Proti_jmeno." ".$row->Proti_prijmeni; ?></td><td><?php echo $row->Nazev_spisu; ?></td><td><?php echo $row->Zam_jmeno." ".$row->Zam_prijmeni; ?></td><td><?php echo $row->Taxa; ?></td><td><?php echo $row->Pausal; ?></td><td><?php echo $row->Datum_zadani->format("H:i d.m.Y"); ?></td>
                    </tr>
            <?php } ?>
            </tbody>
            </table>
        </article>
    
    </section>
    
</body>
</html>