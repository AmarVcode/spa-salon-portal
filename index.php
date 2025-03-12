<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold & Black Card Design</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;600&display=swap"
        rel="stylesheet">
    <?php include "./spa/includecss.php"; ?>

    <style>
    :root {
        --primary-gold: #D4AF37;
        --dark-gold: #B8860B;
        --soft-gold: #E6C200;
        --black: #000000;
        --matte-black: #1C1C1C;
        --charcoal: #333333;
        --off-black: #121212;
        --golden-beige: #F5E1A4;
    }

    body {
        background-color: var(--off-black);
        color: var(--primary-gold);
        font-family: "Poppins", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        max-width: 1200px;
    }

    .card {
        background: linear-gradient(135deg, var(--matte-black), var(--charcoal));
        border: 2px solid var(--primary-gold);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(212, 175, 55, 0.2);
        transition: transform 0.3s ease-in-out;
        text-align:center;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        font-family: "Playfair Display", serif;
        color: var(--soft-gold);
        font-size: 22px;
        margin-bottom: 10px;
    }

    .card p {
        color: var(--golden-beige);
        font-size: 16px;
        line-height: 1.5;
    }

    .card a {
        background: var(--primary-gold);
        color: var(--black);
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
        margin-top: 15px;
        text-decoration: none;
        max-width: 100%
        display: block;
    }

    .card a:hover {
        background: var(--soft-gold);
        transform: scale(1.05);
    }

    .card i{
        font-size: 40px;
    }

    @media (max-width: 900px) {
        .card-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .card-container {
            grid-template-columns: 1fr;
        }
    }
    </style>
</head>

<body>
    <div class="card-container">
    <div class="card">
    <i class="fas fa-spa"></i>
    <h3> Manage Spa & Salon</h3>
    <br>
    <a href="#">Login</a>
</div>

<div class="card">
<i class="fas fa-clinic-medical"></i>
    <h3> Manage Clinic</h3>
    <br>
    <a href="#">Login</a>
</div>

<div class="card">
<i class="fas fa-dumbbell"></i> 
    <h3>Manage Yoga</h3>
    <br>
    <a href="#">Login</a>
</div>


    </div>
</body>

</html>