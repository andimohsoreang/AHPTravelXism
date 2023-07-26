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
                <form class="form form-vertical" method="POST" action="{{ route('userform.submit') }}">
                    @csrf
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
                    <fieldset class="form-group">
                        <p>Jenis Kelamin</p>
                        <select class="form-select" id="genderSelect" name="gender">
                            <option>Laki - Laki</option>
                            <option>Perempuan</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <p>Umur</p>
                        <select class="form-select" id="ageSelect" name="age">
                            <option>&lt; 17 Tahun</option>
                            <option>17-22 Tahun</option>
                            <option>23-28 Tahun</option>
                            <option>29-34 Tahun</option>
                            <option>&gt; 34 Tahun</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group">
                        <p>Daerah Domisili Saat ini</p>
                        <select class="form-select" id="locationSelect" name="location">
                            <option>Yogyakarta</option>
                            <option>Surakarta</option>
                            <option>Semarang</option>
                            <option>Jabodetabek</option>
                            <option>Surabaya</option>
                        </select>
                    </fieldset>
                    <br>
                    <br>
                    <br>
                    @for ($i = 0; $i < $CriteriaCount; $i++)
                        @for ($j = 1; $j < $CriteriaCount; $j++)
                            @if ($i !== $j)
                                <fieldset class="form-group">
                                    <br>
                                    <p>bandingkan antara Kriteria {{ $criteria[$i]->name }} jika dibandingkan dengan
                                        kriteria {{ $criteria[$j]->name }}</p>
                                    <select class="form-select"
                                        id="criteriaSelect{{ $i }}{{ $j }}"
                                        name="criteriaSelect{{ $i }}{{ $j }}">
                                        <option value="1">1 = Kedua kriteria sama penting</option>
                                        <option value="2">2 = Jika anda memilih nilai antara 1 dan 3 </option>
                                        <option value="3">3 = {{ $criteria[$i]->name }} 𝘀𝗲𝗱𝗶𝗸𝗶𝘁 𝗹𝗲𝗯𝗶𝗵
                                            𝗽𝗲𝗻𝘁𝗶𝗻𝗴
                                            daripada {{ $criteria[$j]->name }}</option>
                                        <option value="4">4 = Jika anda memilih nilai antara 3 dan 5</option>
                                        <option value="5">5 = {{ $criteria[$i]->name }} 𝗹𝗲𝗯𝗶𝗵 𝗽𝗲𝗻𝘁𝗶𝗻𝗴
                                            daripada
                                            {{ $criteria[$j]->name }}</option>
                                        <option value="6">6 = Jika anda memilih nilai antara 5 dan 7</option>
                                        <option value="7">7 ={{ $criteria[$i]->name }} 𝘀𝗮𝗻𝗴𝗮𝘁 𝗹𝗲𝗯𝗶𝗵
                                            𝗽𝗲𝗻𝘁𝗶𝗻𝗴
                                            daripada {{ $criteria[$j]->name }}</option>
                                        <option value="8">8 = Jika anda memilih nilai antara 7 dan 9</option>
                                        <option value="9">9 = {{ $criteria[$i]->name }} 𝗺𝘂𝘁𝗹𝗮𝗸 𝘀𝗮𝗻𝗴𝗮𝘁
                                            𝗽𝗲𝗻𝘁𝗶𝗻𝗴
                                            daripada {{ $criteria[$j]->name }}</option>
                                    </select>
                                </fieldset>
                            @endif
                        @endfor
                    @endfor

                    @foreach ($groupedSubCriteria as $index => $subCriteria)
                        @php
                            $count = count($subCriteria);
                        @endphp
                        @for ($i = 0; $i < $count; $i++)
                            @for ($j = $i + 1; $j < $count; $j++)
                                <fieldset class="form-group">
                                    <br>
                                    <p>bandingkan antara SubKriteria Kriteria {{ $subCriteria[$i]->name }} jika
                                        dibandingkan dengan
                                        kriteria {{ $subCriteria[$j]->name }}</p>
                                    <select class="form-select"
                                        id="{{ $index - 1 }}subcriteria{{ $i }}{{ $j }}"
                                        name="{{ $index - 1 }}subcriteria{{ $i }}{{ $j }}">
                                        <option value="1">1 = Kedua kriteria sama penting</option>
                                        <option value="2">2 = Jika anda memilih nilai antara 1 dan 3 </option>
                                        <option value="3">3 = {{ $subCriteria[$i]->name }} 𝘀𝗲𝗱𝗶𝗸𝗶𝘁
                                            𝗹𝗲𝗯𝗶𝗵
                                            𝗽𝗲𝗻𝘁𝗶𝗻𝗴
                                            daripada {{ $subCriteria[$j]->name }}</option>
                                        <option value="4">4 = Jika anda memilih nilai antara 3 dan 5</option>
                                        <option value="5">5 = {{ $subCriteria[$i]->name }} 𝗹𝗲𝗯𝗶𝗵
                                            𝗽𝗲𝗻𝘁𝗶𝗻𝗴 daripada
                                            {{ $subCriteria[$j]->name }}</option>
                                        <option value="6">6 = Jika anda memilih nilai antara 5 dan 7</option>
                                        <option value="7">7 ={{ $subCriteria[$i]->name }} 𝘀𝗮𝗻𝗴𝗮𝘁
                                            𝗹𝗲𝗯𝗶𝗵
                                            𝗽𝗲𝗻𝘁𝗶𝗻𝗴
                                            daripada {{ $subCriteria[$j]->name }}</option>
                                        <option value="8">8 = Jika anda memilih nilai antara 7 dan 9</option>
                                        <option value="9">9 = {{ $subCriteria[$i]->name }} 𝗺𝘂𝘁𝗹𝗮𝗸
                                            𝘀𝗮𝗻𝗴𝗮𝘁
                                            𝗽𝗲𝗻𝘁𝗶𝗻𝗴
                                            daripada {{ $subCriteria[$j]->name }}</option>
                                    </select>
                                </fieldset>
                            @endfor
                        @endfor
                    @endforeach

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/compiled/js/app.js"></script>
</body>

</html>
