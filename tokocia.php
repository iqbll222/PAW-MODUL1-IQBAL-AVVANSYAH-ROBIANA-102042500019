<?php
$products = [
    [
        "name" => "Monitor 24 Inch",
        "category" => "Monitor",
        "price" => 1800000,
        "stock" => 4
    ],
    [
        "name" => "Laptop Workstation Lenovo",
        "category" => "Laptop",
        "price" => 8500000,
        "stock" => 3
    ],
    [
        "name" => "Ajazz Mechanical Keyboard",
        "category" => "Aksesoris",
        "price" => 850000,
        "stock" => 10
    ],
    [
        "name" => "Mouse Wireless Logitech",
        "category" => "Aksesoris",
        "price" => 250000,
        "stock" => 0
    ],
    [
        "name" => "In Ear Monitor Hi-Res Audio (dijamin mendut mendut)",
        "category" => "Audio",
        "price" => 1200000,
        "stock" => 5
    ],
    [
        "name" => "Webcam Logitech 1080p",
        "category" => "Aksesoris",
        "price" => 450000,
        "stock" => 0
    ]
];
$total_produk = count($products);
function formatRupiah($angka){
    return "Rp" . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Simple Tech Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary: #2563eb;
            --dark: #060707;
            --light: #f8fafc;
            --danger: #ef4444;
            --success: #22c55e;
            --gray: #64748b;
        }

        body {
            background-color: #f1f5f9;
            color: var(--dark);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
        }

        nav ul {
            display: flex;
            gap: 20px;
            list-style: none;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
        }

        nav ul li a:hover {
            color: var(--primary);
        }

        header {
            text-align: center;
            padding: 4rem 1rem;
            background-color: var(--dark);
            color: white;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        header p {
            color: #cbd5e1;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        main {
            padding: 3rem 5%;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .product-grid 
        {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .product-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }

        .badge-category {
            font-size: 0.8rem;
            background: #e2e8f0;
            color: var(--gray);
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .badge-discount {
            position: absolute;
            top: -10px;
            right: -10px;
            background: var(--danger);
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .product-name {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .price-normal {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .price-strike {
            text-decoration: line-through;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .price-discounted {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--danger);
            margin-bottom: 5px;
        }

        .stock-info {
            font-size: 0.9rem;
            margin-bottom: 15px;
            color: var(--gray);
        }

        .status-tersedia {
            color: var(--success);
            font-weight: bold;
        }

        .status-habis {
            color: var(--danger);
            font-weight: bold;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover 
        {
            background-color: #1d4ed8;
        }

        
        footer {
            text-align: center;
            padding: 2rem;
            background: var(--dark);
            color: white;
            margin-top: 3rem;
        }

        @media (max-width: 900px) 
        {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">Cia Store</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>

    
    <header>
        <h1>Welcome to Cia Store</h1>
        <p>Simple Tech Store. Temukan berbagai perangkat dan aksesoris untuk kebutuhan harianmu dengan harga terbaik.</p>
        <a href="#products"><button class="btn btn-primary" style="width: max-content; padding: 10px 20px; margin: auto;">Lihat Produk</button></a>
    </header>

    <main id="products">
        <div class="section-header">
            <h2>Katalog Produk</h2>
            <p><strong>Total Produk:</strong> <?= $total_produk ?></p>
        </div>

        <div class="product-grid">
            <?php
            foreach ($products as $item) {
                echo '<div class="product-card">';
                echo '<span class="badge-category">' . $item["category"] . '</span>';
                
                $harga_awal = $item["price"];
                $is_discount = false;
                
                if ($harga_awal >= 1000000) {
                    $is_discount = true;
                    $potongan = $harga_awal * 0.10;
                    $harga_akhir = $harga_awal - $potongan;
                }

    
                if ($is_discount) {
                    echo '<div class="badge-discount">Diskon 10%</div>';
                }

                echo '<h3 class="product-name">' . $item["name"] . '</h3>';

                if ($is_discount) {
                    echo '<p class="price-strike">' . formatRupiah($harga_awal) . '</p>';
                    echo '<p class="price-discounted">' . formatRupiah($harga_akhir) . '</p>';
                } else {
                    echo '<p class="price-normal">' . formatRupiah($harga_awal) . '</p>';
                }
                echo '<p class="stock-info">Stok: ' . $item["stock"] . '</p>';

                if ($item["stock"] > 0) {
                    echo '<p class="status-tersedia mb-3">Tersedia</p>';
                    echo '<button class="btn btn-primary mt-2" style="margin-top: 10px;">Beli Sekarang</button>';
                } else {
                    echo '<p class="status-habis" style="margin-top: 10px;">Stok Habis</p>';

                }

                echo '</div>';
            }
            ?>
        </div>
    </main>


    <footer>
        <p>Iqbal Avvansyah Robiana</p>
        <p>&copy; 2026 Cia Store. </p>
    </footer>

</body>
</html>