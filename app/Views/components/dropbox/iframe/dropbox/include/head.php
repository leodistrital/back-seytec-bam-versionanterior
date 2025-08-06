<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <title>explorer</title>
    <style>
    /* Fonts from Google Fonts */
    @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,700italic);

    @font-face {
        font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Light.woff2') format('woff2');
        font-weight: 200;
        font-style: normal;
    }

    @font-face {
        font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Book.woff2') format('woff2');
        font-weight: 300;
        font-style: normal;
    }

    @font-face {
        font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Regular.woff2') format('woff2');
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Semibold.woff2') format('woff2');
        font-weight: 600;
        font-style: normal;
    }

    @font-face {
        font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Bold.woff2') format('woff2');
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Extrabold.woff2') format('woff2');
        font-weight: 800;
        font-style: normal;
    }

    @font-face {
        font-family: 'NouvelRVariable';
        src: url('../../fonts/NouvelR-Variable.woff2') format('woff2');
        font-weight: 800;
        font-style: normal;
    }

    @import url(//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic&subset=latin,latin-ext);
    @import url(//fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic,700italic&subset=latin,latin-ext);
    @import url(//fonts.googleapis.com/earlyaccess/nanumgothic.css);
    @import url(//fonts.googleapis.com/earlyaccess/nanumgothiccoding.css);

    /* Some elements from Apaxy */
    * {
        /*margin:0;
         padding:0;*/
    }

    html {
        min-height: 100%;
        padding-top: 1em;
        padding-bottom: 1em;
        /*border-top: 10px solid #eee;
         border-bottom: 10px solid #eee;*/
        color: #61666c;
        line-height: 10px;
    }

    .font-monospace {
        font-family: 'NouvelR';
        font-weight: 400;
    }

    .font-sans-serif {
        font-family: 'NouvelR';
        font-weight: 500;
    }

    strong,
    .strong {
        font-weight: 500;
    }

    .no-strong {
        font-weight: 300;
    }

    .transparent {
        border: 0px;
    }

    .container {
        width: 100%;
    }

    a:link {
        text-decoration: none;
        color: #61666c;
    }

    a:visited {
        color: #61666c;
    }

    a:hover {
        color: #2d2d2d;
    }

    a:active {
        color: #2d2d2d;
    }

    a:focus {
        color: #2d2d2d;
    }

    table {
        table-layout: fixed;
    }

    tr {
        height: 39px;
        text-align: center;
    }

    th {
        white-space: nowrap;
    }

    td {
        word-wrap: break-word;
    }

    td a:link {
        display: block;
    }

    .btn {
        font-weight: 300;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        background: red;
        cursor: inherit;
        display: block;
    }

    input[readonly] {
        background-color: white !important;
        cursor: text !important;
    }
    </style>
</head>