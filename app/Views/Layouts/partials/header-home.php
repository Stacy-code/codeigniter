<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= env('app.name') ?? 'Codeigniter' ?> - <?= $this->renderSection('title') ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<style>
    ul {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
        display: flex;
    }
    ul li {
        list-style: none;
    }
    ul li a {
        position: relative;
        display: block;
        margin: 0 10px;
        padding: 5px 10px;
        color: #aaa;
        font-size: 24px;
        text-decoration: none;
        text-transform: uppercase;
        transition: 0.5s;
        overflow: hidden;
    }
    ul li a::before {
        content: '';
        position: absolute;
        top: calc(50% - 2px);
        left: -100%;
        width: 100%;
        height: 4px;
        background: #2196f3;
        transition: 0.5s;
    }
    ul li a:hover {
        color: #fff;
    }
    ul li a:hover::before {
        animation: animate .5s linear forwards;
    }

    @keyframes animate {
        0% {
            top: calc(50% - 2px);
            left: -100%;
            height: 4px;
            z-index: 1;
        }
        50% {
            top: calc(50% - 2px);
            left: 0;
            height: 4px;
            z-index: 1;
        }
        100% {
            top: 0;
            left: 0;
            height: 100%;
            z-index: -1;
        }
    }
</style>
<body>

<div class="container p-3 mb-2 ">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 mb-2 ">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/create">Question</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Service</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
    </nav>
</div>
