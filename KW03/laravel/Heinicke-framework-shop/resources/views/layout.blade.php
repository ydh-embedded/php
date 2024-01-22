<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge , chrome=1">
    <link type="text/css" href="assets/css/bootstrap.min.css">
    
    <title>Shop-Layout</title>
</head>
<body>
    <style>
        .header {
            background-color: #2e2e2e;
            border-radius: 25px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            margin: 1rem;
            display: flex;
            flex-direction: row;
            align-items: center;
            text-align: center;

        }

        body {
            background-color: #2b2b2b;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
            display: flex ;
            flex-direction: column ;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: flex ;
            flex-direction: column ;
        }

        a   {
            color: #242424;

        }

        a:hover {
            color: #45a049;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        p {
            font-size: 1.1rem;
            line-height: 1.5;
        }
        
        table {
            border: 2px #474747 ;
        }
        
        .container #tablehead {
            border: 2px #474747 ;
            color: #6b6b6b ;
        }
        
        .container #tablebody {
            border: 2px #474747 ;
            color: #474747 ;
        }

        .product-card {
            background-color: #3b3b3b;
            border-radius: 5px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            margin: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .product-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        
        .product-title {
            color: #6b6b6b ;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .product-description {
            margin-bottom: 1rem;
        }
        
        .add-to-cart-button {
            background-color: #4caf50;
            color: #474747;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 2rem;
            text-transform: uppercase;
            cursor: pointer;
        }
        
        .add-to-cart-button:hover {
            background-color: #45a049;
        }
    </style>

<div class="container">
        @yield('content')
        
    <div class="header">

        <h2>            framework-shop        </h2>
        
    </div>
        
        

        <table>
            <div class="tablehead">
                <tr>
                    <th><div class="product-title">timestamp</div></th>
                    <th><div class="product-title">Artikel-<br>Bezeichnung</div></th>
                    <th><div class="product-title">Artikel<br> bearbeiten </div></th>
                    <th></th>
                    <th></th>
                    <th><div class="product-card"><a href="card">Artikel<br>neu erstellen</a></div>    </th>
                </tr>
            </div>

            <div class="tablebody">
                <tr>
                    <th><div class="product-card">Datum 22</div>                                    </th>
                    <th><div class="product-card"><a href="card">Bezeichnung</a></div>              </th>
                    <th><div class="product-card"><a href="/articels/{id}/edit">bearbeiten</a></div></th>
                    <th></th>
                    <th><div class="product-card"><a href="card">Artikel löschen</a></div>          </th>
                    <th><div class="product-card"><a href="card">Bild</a></div>                     </th>
                </tr>
            </div>


            


    

</body>
</html>