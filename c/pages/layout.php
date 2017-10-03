
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
        header, main, footer {
            padding-left: 200px;
        }
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
        .inputnyaMobile{
            text-align:center;
        }
        @media only screen and (max-width : 992px) {
            header, main, footer {
                padding-left: 0;
            }
        }
    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <header>
        <nav class="navbar-fixed nav-extended">
            <div class="nav-wrapper">
                <a href="#" data-activates="slide-out" class="button-collapse hide-on-large"><i class="material-icons">menu</i></a>
                <a href="#!" class="brand-logo">calculusToko</a>
            </div>
            <?php if(isset($_REQUEST['p'])){ ?>
            <?php if($menu == 'pemesanan' && $_REQUEST['p'] == 'form'){ ?>
            <div class="nav-content">
                <ul class="tabs tabs-transparent tabs-fixed-width">
                    <li class="tab"><a class="active" href="#form">Form</a></li>
                    <li class="tab"><a href="#list">List</a></li>
                </ul>
            </div>
            <?php } ?>
            <?php } ?>
        </nav>

        <ul id="slide-out" class="side-nav fixed">
            <li> <a href="index.php?m=dashboard">Dashboard</a></li>
            <li> <a href="index.php?m=barang">Barang</a></li>
            <li> <a href="index.php?m=pemesanan">Pemesanan</a></li>
            <li> <a href="index.php?m=kasir">Kasir</a></li>
            <li> <a href="index.php?m=laporan">Laporan</a></li>
            
        </ul>
        
    </header>
    <main>
        
        <div class="row">
        <?php
        if($menu == '' || $menu == 'dashboard'){
            require('pages/dashboard/dashboard.php');    
        }else{
            $path = 'pages/'.$menu.'/'.$menu.'.php';
            if(file_exists($path)){
                require('pages/'.$menu.'/'.$menu.'.php');
            }else{
                echo '<h2 align="center">404: Halaman tidak tersedia!</h2>';
            }
        }
        ?>
        </div>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Dibuat oleh:</h5>
                    <p class="grey-text text-lighten-4">(160535611821) M. Fandi Arfabuma<br>(160535611850) Meynabel Dimas W.</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
        <div class="container">
        © 2017 Tugas Kalkulus Lanjut
        </div>
        </div>
    </footer>
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    
    <script>
        // Initialize collapse button
        $(".button-collapse").sideNav({
            menuWidth: 200, // Default is 300
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true
        });
        // Initialize collapsible (uncomment the line below if you use the dropdown variation)
        //$('.collapsible').collapsible();
    </script>
</body>
</html>