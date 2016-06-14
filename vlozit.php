<?php
    include_once 'config.php';
    include_once 'class.php';

    $vlozit=$_GET["vlozit"];
    $result="";
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
    
    <section class="form_input">
    
    <?php
    
    switch ($vlozit)
    {
        case 1:
            ?>
            <!--HTML-->
            <form action="vlozit.php" method="get" role="form">
                    <fieldset>
                        <legend>Nový klient</legend>
                            <div class="form-group">
                                <label for="jmeno">IČO</label>
                                <input type="number" name="ICO" class="form-control" placeholder="25596641">
                            </div>
                            <div class="form-group">
                                <label for="jmeno">Název</label>
                                <input type="text" name="nazev" class="form-control" placeholder="SKANSKA">
                            </div>
                            <div class="form-group">
                                <label for="jmeno">Jméno</label>
                                <input type="text" name="jmeno" class="form-control" placeholder="Jan">
                            </div>
                            <div class="form-group">
                                <label for="prijmeni">Příjmení</label>
                                <input type="text" name="prijmeni" class="form-control" placeholder="Novák">
                            </div>
                            <div class="form-group">
                                <label for="telefon">Telefon</label>
                                <input type="tel" name="telefon" class="form-control" placeholder="+420777666555">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="petr.novak@email.cz">
                            </div>
                            <div class="form-group">
                                <label for="ulice">Ulice</label> 
                                <input type="text" name="ulice" class="form-control" placeholder="Pod Stromem 5">
                            </div>
                            <div class="form-group">
                                <label for="mesto">Město</label>
                                <input type="text" name="mesto" class="form-control" placeholder="Ostrava">
                            </div>
                            <div class="form-group">
                                <label for="psc">PSČ</label>
                                <input type="number" name="psc" class="form-control" placeholder="70030">
                            </div>
                            <div class="form-group">
                                <label for="stat">Stát</label>
                                <input type="text" name="stat" class="form-control" placeholder="Česká republika">
                            </div>
                        <input type="hidden" name="vlozit" value="1">
                        <button type="submit" name="klient" class="btn btn-default">Vložit</button>
                    </fieldset>
                </form>
            <?php

            if(isset($_GET['klient']))
            {
                $zaznam = new klient($_GET['ICO'],$_GET['nazev'],$_GET['jmeno'],$_GET['prijmeni'],$_GET['telefon'],$_GET['email'],$_GET['ulice'],$_GET['mesto'],$_GET['psc'],$_GET['stat'],$login_session);
                
                $arr = [
                            'ICO' => $zaznam->ico,
                            'Nazev'  => $zaznam->nazev,
                            'Jmeno' => $zaznam->jmeno,
                            'Prijmeni' => $zaznam->prijmeni,
                            'Telefon' => $zaznam->telefon,
                            'Email' => $zaznam->email,
                            'Ulice' => $zaznam->ulice,
                            'Mesto' => $zaznam->mesto,
                            'PSC' => $zaznam->psc,
                            'Stat' => $zaznam->stat,
                            'vlozil' => $zaznam->vlozil,
                        ];
                if(dibi::query('INSERT klienti', $arr))
                {
                    echo "<h1>Úspěšně vloženo</h1>";    
                }else echo "<h1>Chyba - zkuste znova</h1>";
            }
            break;
        case 2:
           if((isset($_GET['zamestnanec'])))
            {
                $zaznam = new zamestnanec($_GET['jmeno'],$_GET['prijmeni'],$_GET['telefon'],$_GET['email'],$_GET['username'],$_GET['heslo'],$login_session);
               
                if(($zaznam->username!="")&&($zaznam->password==""))
                {
                    $result='<div class="alert alert-danger banner-vlozit">Zadejte prosím u nového zaměstnance také heslo</div>';
                    goto zamestnanec;
                }
               
                if(($zaznam->jmeno!="")&&($zaznam->prijmeni!=""))
                {
                    $arr = [
                                'Jmeno' => $zaznam->jmeno,
                                'Prijmeni'  => $zaznam->prijmeni,
                                'Telefon' => $zaznam->telefon,
                                'Email' => $zaznam->email,
                                'username' => $zaznam->username,
                                'password' => md5($zaznam->password),
                                'vlozil' => $zaznam->vlozil,
                            ];
                    if(dibi::query('INSERT zamestnanci', $arr))
                    {
                        $result='<div class="alert alert-success banner-vlozit">Nový zaměstnanec úspěšně vložen</div>';    
                    }else $result='<div class="alert alert-info banner-vlozit">Někde se stala chyba</div>';                    
                } else $result='<div class="alert alert-danger banner-vlozit">Zadejte prosím u nového zaměstnance jméno i příjmení</div>';
               zamestnanec:

            }     
        ?>
            <form action="vlozit.php" method="get" role="form">
                    <fieldset>
                        <legend>Nový zaměstnanec</legend>
                            <div class="form-group">
                                <label for="jmeno">Jméno (*)</label>
                                <input type="text" name="jmeno" class="form-control" placeholder="Jan">
                            </div>
                            <div class="form-group">
                                <label for="prijmeni">Příjmení (*)</label>
                                <input type="text" name="prijmeni" class="form-control" placeholder="Novák">
                            </div>
                            <div class="form-group">
                                <label for="telefon">Telefon</label>
                                <input type="tel" name="telefon" class="form-control" placeholder="+420777666555">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="petr.novak@email.cz">
                            </div>
                            <div class="form-group">
                                    <label for="username">Uživatelské jméno</label>
                                    <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">@</span>  
                                    <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="heslo">Heslo</label>
                                <input type="password" name="heslo" class="form-control" placeholder="********">
                            </div>
                        <input type="hidden" name="vlozit" value="2">
                        <button type="submit" name="zamestnanec" class="btn btn-default">Vložit</button>
                    </fieldset>
                    <?php echo $result; ?>
                </form>
        <?php
            break;
        case 3:
            $results = dibi::query('SELECT * FROM klienti ORDER BY ID_Klienti ASC');
            $all = $results->fetchAll();  
            
            
           if((isset($_GET['spis'])))
            {
                $zaznam = new spis($_GET['spisova_znacka'],$_GET['klient'],$_GET['protistrana'],$_GET['nazev'],$_GET['taxa'],$_GET['pausal'],$login_session);
               
                if(($zaznam->klient==$zaznam->protistrana))
                {
                    $result='<div class="alert alert-danger banner-vlozit">Klient i protistrana nemůžou být stejní</div>';
                    goto spisy;
                }
               
                if(($zaznam->nazev!="")&&($zaznam->spisova_znacka!=""))
                {
                    $arr = [
                                'Spisova_znacka' =>$zaznam->spisova_znacka,
                                'Klient' => $zaznam->klient,
                                'Protistrana'  => $zaznam->protistrana,
                                'Nazev_spisu' => $zaznam->nazev,
                                'Taxa' => $zaznam->taxa,
                                'Pausal' => $zaznam->pausal,
                                'vlozil' => $zaznam->vlozil,
                            ];
                    if(dibi::query('INSERT spisy', $arr))
                    {
                        $result='<div class="alert alert-success banner-vlozit">Nový spis úspěšně vložen</div>';    
                    }else $result='<div class="alert alert-info banner-vlozit">Někde se stala chyba</div>';                    
                } else $result='<div class="alert alert-danger banner-vlozit">Zadejte prosím u nového spisu název</div>';
               spisy:

            }  
        ?>
            <link rel="stylesheet" href="jquery-flexselect-master/flexselect.css" type="text/css" media="screen" />
            <script src="jquery-flexselect-master/jquery-3.0.0.min.js" type="text/javascript"></script>
            <script src="jquery-flexselect-master/liquidmetal.js" type="text/javascript"></script>
            <script src="jquery-flexselect-master/jquery.flexselect.js" type="text/javascript"></script>
            
            <script>
                jQuery(document).ready(function()
                {
                    if($("select.flexselect").flexselect())
                        console.log("Flexselect");
                });
            </script>
            <form action="vlozit.php" method="get" role="form">
                    <fieldset>
                        <legend>Nový spis</legend>
                                <div class="form-group">
                                        <label for="spisova_znacka">Spisová značka (*)</label>
                                        <input type="text" name="spisova_znacka" class="form-control" placeholder="000000">                            
                                </div>
                                <div class="form-group">
                                <label for="klient">Klient (*)</label><br>
                                <select class="flexselect" name="klient">
                                    <?php
                                        foreach ($all as $row)
                                        {
                                         ?>
                                    <option value="<?php echo $row->ID_Klienti; ?>"><?php echo $row->Nazev."".$row->Jmeno." ".$row->Prijmeni; ?></option>    
                                        <?php
                                        }
                                    ?>
                                </select>
                                </div>
                            <div class="form-group">
                                <label for="protistrana">Protistrana (*)</label><br>
                                <select class="flexselect" name="protistrana" tabindex="-1">
                                    <?php
                                        foreach ($all as $row)
                                        {
                                         ?>
                                    <option value="<?php echo $row->ID_Klienti; ?>"><?php echo $row->Nazev."".$row->Jmeno." ".$row->Prijmeni; ?></option>    
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        <div class="form-group">
                                <label for="nazev">Název spisu (*)</label>
                                <input type="text" name="nazev" class="form-control" placeholder="Krádež kola">                            
                        </div>
                        <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Kč</div>
                            <input type="number" class="form-control" name="taxa" placeholder="Taxa">
                            <div class="input-group-addon">.00</div>                           
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Kč</div>
                            <input type="number" class="form-control" name="pausal" placeholder="Paušál">
                            <div class="input-group-addon">.00</div>                           
                        </div>
                        </div>
                        <input type="hidden" name="vlozit" value="3">
                        <button type="submit" name="spis" class="btn btn-default">Vložit</button>
                    </fieldset>
                    <?php echo $result; ?>
                </form>            
        <?php
        
            break;
        case 4:
            {
                ?>
        
                <?php
            }
            
    } //switch end
    ?>
    </section>
</body>
</html>