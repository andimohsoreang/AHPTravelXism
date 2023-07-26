<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="{{ asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.png') }}" type="image/png">

</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="index.html"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="./assets/compiled/svg/logo.svg" />
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Halo👋</h4>
            </div>
            <div class="card-body">
                <h5>
                    Halo pelanggan TravelXism.
                </h5>
                <p>Untuk keperluan perjalanan anda tolong berikan mengenai rute yang akan anda pilih.</p>
                <form class="form form-vertical">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Nama</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                        placeholder="First Name" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <fieldset class="form-group">
                    <p>Jenis Kelamin</p>
                    <select class="form-select" id="basicSelect">
                        <option>Laki - Laki</option>
                        <option>Perempuan</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <p>Umur</p>
                    <select class="form-select" id="basicSelect">
                        <option>
                            < 17 Tahun</option>
                        <option> 17-22 Tahun</option>
                        <option> 23-28 Tahun</option>
                        <option> 29-34 Tahun</option>
                        <option> > 34 Tahun</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <p>Daerah Domisili Saat ini</p>
                    <select class="form-select" id="basicSelect">
                        <option> Yogyakarta</option>
                        <option> Surakarta</option>
                        <option> Semarang</option>
                        <option> Jabodetabek</option>
                        <option> Surabaya</option>
                    </select>
                </fieldset>
                <br>
                <br>
                <br>
                <fieldset class="form-group">
                    <p>Dibawah ini, mana kriteria yang paling anda prioritaskan jika berkunjung ke suatu destinasi?</p>
                    <select class="form-select" id="basicSelect">
                        <option> Criteria 1</option>
                        <option> Criteria 2</option>
                        <option> Criteria 3</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <br>
                    <p>bandingkan antara Kriteria "a" jika dibandingkan dengan kriteria "b"</p>
                    <select class="form-select" id="basicSelect">
                        <option>1 = Kedua kriteria sama penting</option>
                        <option>2 = Jika anda memilih nilai antara 1 dan 3 </option>
                        <option>3 = Kriteria 1 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria lainnya</option>
                        <option>4 = Jika anda memilih nilai antara 3 dan 5</option>
                        <option>5 = Kriteria 1 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada kriteria yang lainnya</option>
                        <option>6 = Jika anda memilih nilai antara 5 dan 7</option>
                        <option>7 = Kriteria 1 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        <option>8 = Jika anda memilih nilai antara 7 dan 9</option>
                        <option>9 = Kriteria 1 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <br>
                    <p>bandingkan antara Kriteria "a" jika dibandingkan dengan kriteria "c"</p>
                    <select class="form-select" id="basicSelect">
                        <option>1 = Kedua kriteria sama penting</option>
                        <option>2 = Jika anda memilih nilai antara 1 dan 3 </option>
                        <option>3 = Kriteria 1 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria lainnya</option>
                        <option>4 = Jika anda memilih nilai antara 3 dan 5</option>
                        <option>5 = Kriteria 1 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada kriteria yang lainnya</option>
                        <option>6 = Jika anda memilih nilai antara 5 dan 7</option>
                        <option>7 = Kriteria 1 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        <option>8 = Jika anda memilih nilai antara 7 dan 9</option>
                        <option>9 = Kriteria 1 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                    </select>
                </fieldset>
                <br>
                <br>
                <br>
                <fieldset class="form-group">
                    <p>Dibawah ini, mana kriteria yang paling anda tidak prioritaskan jika berkunjung ke suatu destinasi?</p>
                    <select class="form-select" id="basicSelect">
                        <option> Criteria 1</option>
                        <option> Criteria 2</option>
                        <option> Criteria 3</option>
                    </select>
                </fieldset>
                 <fieldset class="form-group">
                    <br>
                    <p>bandingkan antara Kriteria "1" jika dibandingkan dengan kriteria "3"</p>
                    <select class="form-select" id="basicSelect">
                        <option>1 = Kedua kriteria sama penting</option>
                        <option>2 = Jika anda memilih nilai antara 1 dan 3 </option>
                        <option>3 = Kriteria 1 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria lainnya</option>
                        <option>4 = Jika anda memilih nilai antara 3 dan 5</option>
                        <option>5 = Kriteria 1 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada kriteria yang lainnya</option>
                        <option>6 = Jika anda memilih nilai antara 5 dan 7</option>
                        <option>7 = Kriteria 1 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        <option>8 = Jika anda memilih nilai antara 7 dan 9</option>
                        <option>9 = Kriteria 1 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <br>
                    <p>bandingkan antara Kriteria "2" jika dibandingkan dengan kriteria "3"</p>
                    <select class="form-select" id="basicSelect">
                        <option>1 = Kedua kriteria sama penting</option>
                        <option>2 = Jika anda memilih nilai antara 1 dan 3 </option>
                        <option>3 = Kriteria 1 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria lainnya</option>
                        <option>4 = Jika anda memilih nilai antara 3 dan 5</option>
                        <option>5 = Kriteria 1 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada kriteria yang lainnya</option>
                        <option>6 = Jika anda memilih nilai antara 5 dan 7</option>
                        <option>7 = Kriteria 1 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        <option>8 = Jika anda memilih nilai antara 7 dan 9</option>
                        <option>9 = Kriteria 1 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                    </select>
                </fieldset>
                <br>
                <br>
                <br>
                <fieldset class="form-group">
                    <p>Pilih (kriteria) yang paling 𝗮𝗻𝗱𝗮 𝘀𝘂𝗸𝗮</p>
                    <select class="form-select" id="basicSelect">
                        <option> SubCriteria 1</option>
                        <option> SubCriteria 2</option>
                        <option> SubCriteria 3</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <br>
                    <p>bandingkan antara SubKriteria "1" jika dibandingkan dengan kriteria "2"</p>
                    <select class="form-select" id="basicSelect">
                        <option>1 = Kedua kriteria sama penting</option>
                        <option>2 = Jika anda memilih nilai antara 1 dan 3 </option>
                        <option>3 = Kriteria 1 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria lainnya</option>
                        <option>4 = Jika anda memilih nilai antara 3 dan 5</option>
                        <option>5 = Kriteria 1 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada kriteria yang lainnya</option>
                        <option>6 = Jika anda memilih nilai antara 5 dan 7</option>
                        <option>7 = Kriteria 1 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        <option>8 = Jika anda memilih nilai antara 7 dan 9</option>
                        <option>9 = Kriteria 1 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <br>
                    <p>bandingkan antara SubKriteria "1" jika dibandingkan dengan kriteria "3"</p>
                    <select class="form-select" id="basicSelect">
                        <option>1 = Kedua kriteria sama penting</option>
                        <option>2 = Jika anda memilih nilai antara 1 dan 3 </option>
                        <option>3 = Kriteria 1 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria lainnya</option>
                        <option>4 = Jika anda memilih nilai antara 3 dan 5</option>
                        <option>5 = Kriteria 1 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada kriteria yang lainnya</option>
                        <option>6 = Jika anda memilih nilai antara 5 dan 7</option>
                        <option>7 = Kriteria 1 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        <option>8 = Jika anda memilih nilai antara 7 dan 9</option>
                        <option>9 = Kriteria 1 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                    </select>
                </fieldset>
                <br>
                <br>
                <br>
                <fieldset class="form-group">
                    <p>Pilih (kriteria) yang paling 𝗮𝗻𝗱𝗮 tidak 𝘀𝘂𝗸𝗮i</p>
                    <select class="form-select" id="basicSelect">
                        <option> SubCriteria 1</option>
                        <option> SubCriteria 2</option>
                        <option> SubCriteria 3</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <br>
                    <p>bandingkan antara SubKriteria "1" jika dibandingkan dengan kriteria "2"</p>
                    <select class="form-select" id="basicSelect">
                        <option>1 = Kedua kriteria sama penting</option>
                        <option>2 = Jika anda memilih nilai antara 1 dan 3 </option>
                        <option>3 = Kriteria 1 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria lainnya</option>
                        <option>4 = Jika anda memilih nilai antara 3 dan 5</option>
                        <option>5 = Kriteria 1 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada kriteria yang lainnya</option>
                        <option>6 = Jika anda memilih nilai antara 5 dan 7</option>
                        <option>7 = Kriteria 1 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        <option>8 = Jika anda memilih nilai antara 7 dan 9</option>
                        <option>9 = Kriteria 1 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <br>
                    <p>bandingkan antara SubKriteria "1" jika dibandingkan dengan kriteria "3"</p>
                    <select class="form-select" id="basicSelect">
                        <option>1 = Kedua kriteria sama penting</option>
                        <option>2 = Jika anda memilih nilai antara 1 dan 3 </option>
                        <option>3 = Kriteria 1 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria lainnya</option>
                        <option>4 = Jika anda memilih nilai antara 3 dan 5</option>
                        <option>5 = Kriteria 1 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada kriteria yang lainnya</option>
                        <option>6 = Jika anda memilih nilai antara 5 dan 7</option>
                        <option>7 = Kriteria 1 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                        <option>8 = Jika anda memilih nilai antara 7 dan 9</option>
                        <option>9 = Kriteria 1 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁 𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada Kriteria yang lainnya</option>
                    </select>
                </fieldset>
            </div>
        </div>
    </div>

    <script src="assets/compiled/js/app.js"></script>
</body>

</html>
