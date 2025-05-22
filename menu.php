<style>
    .btnN {
        background: none;
        border: none;
        border: 0;
        padding: 15px;
        height: auto;
        background-color: transparent
    }

    .range {
        margin-top: 20px;
        background: #9d9d9d;
    }

    .white {
        color: white;
    }

    .col2 {
        color: #9d9d9d;
    }

    .col2:hover {
        color: white;
    }
</style>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">BELAKANG PADANG</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><button class="btnN col2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Karyawan</button>
                <div class="range dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="nav">
                        <li><a class="white" href="datakaryawan.php">Pengemudi</a></li>
                        <li><a class="white" href="absensi.php">Absensi</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="scan.php">Scan Kartu</a></li>
            <li><a href="tiket.php">Tiket</a></li>
            <li><button class="btnN col2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loket</button>
                <div class="range dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="nav">
                        <li><a class="white" href="loketbatam.php">Batam</a></li>
                        <li><a class="white" href="loketblp.php">Belakang Padang</a></li>
                    </ul>
                </div>
            </li>
            <li><button class="btnN col2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Antrian</button>
                <div class="range dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <ul class="nav">
                        <li><a class="white" href="antrianB.php">Batam</a></li>
                        <li><a class="white" href="antrianP.php">Belakang Padang</a></li>
                    </ul>
                </div>
            </li>
            <li style="margin-left: 365px;">
                <a id='ct'></a>
            </li>
        </ul>
    </div>
</nav>
