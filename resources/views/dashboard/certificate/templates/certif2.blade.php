<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sertifikat Pelatihan</title>
    <style>
        @page {
            size: 1192px 860px landscape;
            margin: 0;
        }

        body {
            background-color: #fefbee;
            margin: 0;
            box-sizing: border-box;
        }

        #sertifikat {
            width: 1150px;
            height: 816px;
            padding: 10px;
            text-align: center;
            border: 10px solid #fff;
            position: relative;
            background: url({{ public_path('assets/img/certificate/certif-template-2.jpg') }}) center/cover;
            overflow: hidden;
        }

        #header {
            margin-top: 60px;
        }

        #header h1 {
            margin-bottom: 10px;
        }

        #header p {
            margin: 0;
            padding: 0;
            font-size: 0.9rem;
        }

        #content {
            margin: 0 auto;
            width: 80%;
            padding-top: 30px;
            text-align: center;
            height: 40%;
        }

        #content h5,
        #content h2 {
            margin: 0;
        }

        #footer {
            margin-top: 20px;
        }

        #footer div {
            width: 48%;
            box-sizing: border-box;
            padding: 0;
            float: left;
            text-align: center;
            vertical-align: bottom;
        }

        #footer img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            max-height: 130px;
        }

        #footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div id="sertifikat">
        <!-- Header -->
        <div id="header">
            <h1 style="text-transform: uppercase; font-size: 3rem">Sertifikat Pelatihan</h1>
            <p>No. {{ $certificate->number }}</p>
        </div>

        <!-- Content -->
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

        <!-- Footer -->
        <div id="footer">
            <div>
                <p>CEO</p>
                <img src="{{ public_path('assets/img/' . $stamp->ceo_signature) }}" alt="Tanda Tangan CEO" />
                <p>{{ $stamp->ceo_name }}</p>
            </div>
            <div>
                <p>Pengajar</p>
                <img src="{{ public_path('assets/img/' . $stamp->teacher_signature) }}" alt="Tanda Tangan Pengajar" />
                <p>{{ $stamp->teacher_name }}</p>
            </div>
        </div>
    </div>
</body>

</html>
