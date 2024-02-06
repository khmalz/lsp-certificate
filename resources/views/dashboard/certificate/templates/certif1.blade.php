<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sertifikat Pelatihan</title>
    <style>
        @page {
            size: 1225px 894px landscape;
            margin: 0;
        }

        body {
            background-color: #fefbee;
            margin: 0;
            box-sizing: border-box;
            position: relative;
        }

        #sertifikat {
            width: 1150px;
            height: 816px;
            padding: 5px;
            text-align: center;
            border: 1.9rem solid #333d58;
            position: relative;
        }

        #sertifikat #header {
            position: relative;
            border-bottom: 4px solid black;
            padding-bottom: 15px;
        }

        #sertifikat #header h1 {
            font-size: 3rem;
            margin-bottom: 0;
        }

        #sertifikat #header p {
            font-size: 0.9rem;
            font-weight: 100 !important;
            padding: 0;
            margin: 0;
            margin-top: 10px;
        }

        #sertifikat #content {
            margin-top: 60px;
        }

        #sertifikat #footer {
            text-align: center;
            margin-top: 120px;
            margin-bottom: 15px;
        }

        #sertifikat #footer::after {
            content: "";
            display: table;
            clear: both;
        }

        #sertifikat #footer .column {
            width: 50%;
            box-sizing: border-box;
            padding: 0;
            float: left;
        }

        #sertifikat #footer #ceo {
            float: left;
        }

        #sertifikat #footer #pengajar {
            float: right;
        }

        #sertifikat #footer img {
            max-width: 100%;
            height: auto;
            margin-top: 15px;
            margin-bottom: 15px;
            max-height: 130px;
        }

        #sertifikat #footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div style="position: absolute; z-index: 30; top: 0; left: 0; right: 0; height: 8px; background-color: #2c344c">
    </div>
    <div style="position: absolute; z-index: 30; bottom: 0; left: 0; right: 0; height: 8px; background-color: #2c344c">
    </div>
    <div style="position: absolute; z-index: 30; top: 0; bottom: 0; left: 0; width: 8px; background-color: #2c344c">
    </div>
    <div style="position: absolute; z-index: 30; top: 0; bottom: 0; right: 0; width: 8px; background-color: #2c344c">
    </div>

    <div id="sertifikat">
        <div style="position: absolute; z-index: 30; top: 0; left: 0; right: 0; height: 8px; background-color: #2c344c">
        </div>
        <div
            style="position: absolute; z-index: 30; bottom: 0; left: 0; right: 0; height: 8px; background-color: #2c344c">
        </div>
        <div style="position: absolute; z-index: 30; top: 0; bottom: 0; left: 0; width: 8px; background-color: #2c344c">
        </div>
        <div
            style="position: absolute; z-index: 30; top: 0; bottom: 0; right: 0; width: 8px; background-color: #2c344c">
        </div>

        <div id="header">
            <h1>SERTIFIKAT PELATIHAN</h1>
            <p>No. {{ $certificate->number }}</p>
        </div>

        <div id="content">
            <h5 style="font-size: 1.1rem; margin: 40px 10px 15px; font-weight: 500">Diberikan kepada</h5>
            <p style="font-weight: 600; font-size: 2.8rem; margin: 0; padding: 0">{{ $certificate->participant->name }}
            </p>
            <h5 style="font-size: 1.08rem; margin: 40px 10px 0; font-weight: 400 !important">Atas kelulusannya pada
                pelatihan
                <span style="text-transform: capitalize">{{ $certificate->participant->training->title }}</span>
                yang diselenggarakan
                <br>
                <span>
                    tanggal {{ $certificate->participant->training->started_at->translatedFormat('d F Y') }} oleh
                </span>
            </h5>
            <h2 style="margin: 25px 0; font-size: 1.8rem">PT Codely Karya Indonesia</h2>
        </div>

        <div id="footer">
            <div class="column" id="ceo">
                <p>CEO</p>
                <img src="{{ public_path('assets/img/' . $stamp->ceo_signature) }}" alt="Tanda Tangan CEO" />
                <p>{{ $stamp->ceo_name }}</p>
            </div>
            <div class="column" id="pengajar">
                <p>Pengajar</p>
                <img src="{{ public_path('assets/img/' . $stamp->teacher_signature) }}" alt="Tanda Tangan Pengajar" />
                <p>{{ $stamp->teacher_name }}</p>
            </div>
        </div>
    </div>
</body>

</html>
