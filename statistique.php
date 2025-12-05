<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics - Zoo Kids</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-50 font-sans">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-purple-800 text-white p-6 space-y-6 shadow-2xl">
            <h2 class="text-3xl font-bold text-center mb-10">🐾 Zoo Kids</h2>

            <nav class="flex flex-col gap-4">
                <a href="index.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">
                    🏠 Home
                </a>

                <a href="animal.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">
                    🦁 Animals
                </a>

                <a href="habitat.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">
                    🌍 Habitats
                </a>

                <a href="statistique.php"
                    class="bg-purple-700 p-3 rounded-xl font-semibold text-center shadow-lg">
                    📊 Statistique
                </a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-10">

            <header class="bg-blue-500 text-white p-6 rounded-2xl shadow-lg mb-10">
                <h1 class="text-4xl font-bold text-center">Statistics</h1>
                <p class="text-center mt-1 text-blue-100">
                    Visualize zoo data with simple charts!
                </p>
            </header>

            <!-- CHARTS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Chart 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-xl">
                    <h2 class="text-xl font-bold text-purple-700 mb-4 text-center">
                        Animals by Type Alimentaire
                    </h2>
                    <canvas id="foodChart" class="w-full h-64"></canvas>
                </div>

                <!-- Chart 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-xl">
                    <h2 class="text-xl font-bold text-purple-700 mb-4 text-center">
                        Animals by Habitat
                    </h2>
                    <canvas id="habitatChart" class="w-full h-64"></canvas>
                </div>

            </div>

        </main>
    </div>

    <!-- JS CHARTS -->
    <script>
        // --- Chart 1 : Alimentaire ---
        const ctx1 = document.getElementById('foodChart');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Carnivore', 'Herbivore', 'Omnivore'],
                datasets: [{
                    data: [5, 8, 3], // يمكن تغييرها بـ PHP
                    backgroundColor: ['#ef4444', '#22c55e', '#eab308'],
                }]
            }
        });

        // --- Chart 2 : Habitats ---
        const ctx2 = document.getElementById('habitatChart');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Savane', 'Jungle', 'Désert', 'Océan'],
                datasets: [{
                    label: 'Nombre d\'animaux',
                    data: [6, 4, 2, 3], // يمكن تغييرها بـ PHP
                    backgroundColor: '#6366f1',
                }]
            }
        });
    </script>

</body>

</html>