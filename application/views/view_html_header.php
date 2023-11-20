<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Prueba Técnica">
        <meta name="author" content="Natacha Alvarez">

        <title>Telat - Prueba Técnica</title>

        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Fontawesome -->
        <link href="<?php echo base_url('assets/css/fontawesome.min.css'); ?>" rel="stylesheet">
        <!-- Data tables -->
        <link href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" href="<?php echo base_url('favicon.ico'); ?>">

        <style>
            label.error{
                color: #ff3a3a;
                width: 100%;
                display: block;
                order: 5;
            }
        </style>
        
    </head>
    <body>

        <header class="shadow-sm">

            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img class="mb-2" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" width="40" height="40"> Telat 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>users">Reportes</a>
                        </li>
                    </ul>

                </div>
            </nav>

        </header>




