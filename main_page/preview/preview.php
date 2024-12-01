<?php
// Database connection parameters
define('DB_HOST', 'aws-0-ap-southeast-1.pooler.supabase.com');  // host
define('DB_PORT', '6543'); // port
define('DB_NAME', 'postgres');  // database name
define('DB_USER', 'postgres.kfkqpjzxvkbdnhrxlnbr'); // user
define('DB_PASS', '08236611180aA'); // password

try {
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Handle search query
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $query = "SELECT title, description, \"posterImage\", rating FROM poster";
    if ($search) {
        $query .= " WHERE title ILIKE :search";
    }

    $stmt = $pdo->prepare($query);
    if ($search) {
        $stmt->execute(['search' => '%' . $search . '%']);
    } else {
        $stmt->execute();
    }

    $cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="preview.css">
    <title>Cards</title>
</head>
<body>
    <div class="swiper-section">
        <?php if (count($cards) > 0): ?>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($cards as $card): ?>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-front">
                                <img src="<?= htmlspecialchars($card['posterImage']); ?>" alt="<?= htmlspecialchars($card['title']); ?>">
                                <button class="flip-button">Learn More</button>
                            </div>
                            <div class="card-back">
                                <h2 class="card-title"><?= htmlspecialchars($card['title']); ?></h2>
                                <p class="card-description"><?= htmlspecialchars($card['description']); ?></p>
                                <p class="card-rating">Rating: <span><?= htmlspecialchars($card['rating']); ?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Navigation Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        <?php else: ?>
            <div class="no-results">
                <p>No cards found for your search.</p>
                <p><a href="main_page/index-search.php">Go back to search</a></p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="preview.js"></script>
</body>
</html>