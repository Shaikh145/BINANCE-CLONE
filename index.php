<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binance Clone - Home</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: #1a1a2e; color: #fff; }
        header { background: #0f0f1f; padding: 20px; display: flex; justify-content: space-between; align-items: center; }
        header h1 { font-size: 24px; }
        nav a { color: #f0b90b; text-decoration: none; margin: 0 15px; font-weight: bold; }
        nav a:hover { color: #fff; }
        .hero { text-align: center; padding: 50px; background: linear-gradient(135deg, #16213e, #0f3460); }
        .hero h2 { font-size: 36px; margin-bottom: 20px; }
        .hero p { font-size: 18px; }
        .market { padding: 30px; }
        .market table { width: 100%; border-collapse: collapse; background: #0f0f1f; border-radius: 10px; overflow: hidden; }
        .market th, .market td { padding: 15px; text-align: left; border-bottom: 1px solid #2a2a3e; }
        .market th { background: #f0b90b; color: #0f0f1f; }
        .market tr:hover { background: #2a2a3e; }
        .cta { text-align: center; padding: 20px; }
        .cta button { padding: 15px 30px; background: #f0b90b; border: none; color: #0f0f1f; font-size: 16px; cursor: pointer; border-radius: 5px; }
        .cta button:hover { background: #e0a008; }
        @media (max-width: 768px) {
            header { flex-direction: column; text-align: center; }
            nav { margin-top: 10px; }
            .market table, .market th, .market td { font-size: 14px; }
        }
    </style>
</head>
<body>
    <header>
        <h1>Binance Clone</h1>
        <nav>
            <a href="#" onclick="redirect('index.php')">Home</a>
            <a href="#" onclick="redirect('trade.php')">Trade</a>
            <a href="#" onclick="redirect('wallet.php')">Wallet</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="#" onclick="redirect('portfolio.php')">Portfolio</a>
                <a href="#" onclick="redirect('logout.php')">Logout</a>
            <?php else: ?>
                <a href="#" onclick="redirect('login.php')">Login</a>
                <a href="#" onclick="redirect('signup.php')">Signup</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="hero">
        <h2>Welcome to Binance Clone</h2>
        <p>Trade cryptocurrencies with ease and security.</p>
    </div>
    <div class="market">
        <h2>Market Prices</h2>
        <table>
            <tr>
                <th>Pair</th>
                <th>Price</th>
                <th>24h Change</th>
            </tr>
            <tr>
                <td>BTC/USDT</td>
                <td id="btc-price">$0.00</td>
                <td id="btc-change">0.00%</td>
            </tr>
            <tr>
                <td>ETH/USDT</td>
                <td id="eth-price">$0.00</td>
                <td id="eth-change">0.00%</td>
            </tr>
        </table>
    </div>
    <div class="cta">
        <button onclick="redirect('trade.php')">Start Trading</button>
    </div>
    <script>
        function redirect(page) {
            window.location.href = page;
        }
        // Simulate real-time price updates
        function updatePrices() {
            document.getElementById('btc-price').textContent = '$' + (Math.random() * 100000).toFixed(2);
            document.getElementById('eth-price').textContent = '$' + (Math.random() * 5000).toFixed(2);
            document.getElementById('btc-change').textContent = ((Math.random() * 10 - 5).toFixed(2)) + '%';
            document.getElementById('eth-change').textContent = ((Math.random() * 10 - 5).toFixed(2)) + '%';
        }
        setInterval(updatePrices, 5000);
        updatePrices();
    </script>
</body>
</html>
