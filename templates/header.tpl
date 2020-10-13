<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="{BASE_URL}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estudio Contable</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png" />
    <script src="https://kit.fontawesome.com/47a87c56e2.js" crossorigin="anonymous"></script>
</head>

<body>
        <header>
        <div class="logo">
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="titulo">
            <h1>ESTUDIO CONTABLE</h1>
        </div>
        <button class="btnmenu">&#9776</button>
    </header>

    <nav class="navbar">
        <ul class="navigation">
             <li>
                <a href="home">HOME</a>
            </li>
            <li>
                <a href="servicios">SERVICIOS</a>
            </li>
            <li>
                <a href="faq">FAQ</a>
            </li>
            <li>
                <a  href="contacto">CONTACTO</a>
            </li>
            {if ($smarty.session)}
            <li>
                <a href="logout">LOGOUT</a>
            </li>
            {else}
            <li>
            <a href="login">LOGIN</a> 
            </li>
            {/if}
        
        </ul>
    </nav>
