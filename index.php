 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Kids Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-purple-800 text-white p-6 space-y-6 shadow-2xl">
            <h2 class="text-3xl font-bold text-center mb-10">🐾 Zoo Kids</h2>

            <nav class="flex flex-col gap-4">
                <a href="index.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">🏠
                    Home</a>

                <a href="animal.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">🦁
                    Animals</a>

                <a href="habitat.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">🌍
                    Habitats</a>

                <a href="statistique.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">📊
                    Statistique</a>
            </nav>

            <p class="text-center text-purple-200 text-sm pt-10">
                &copy; 2025 Zoo Kids Learning
            </p>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-10">

            <header class="bg-pink-400 text-white p-6 rounded-2xl shadow-lg mb-10">
                <h1 class="text-4xl font-bold text-center">Zoo Kids Learning</h1>
                <p class="text-center mt-1 text-pink-100">
                    Fun and interactive way for kids to learn about animals!
                </p>
            </header>

            <section class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-3 text-purple-700">Welcome to the Zoo Adventure!</h2>
                <p class="text-gray-700 text-lg">
                    Learn, play, and explore the amazing world of animals through fun interactive sections!
                </p>
            </section>

            <!-- CARDS GRID -->
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <div
                    class="bg-white rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition p-6 text-center">
                    <img src="img/lion.jpg" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-purple-700 mb-1">Meet the Animals</h3>
                    <p class="text-gray-600 text-sm">Discover fun facts about your favorite animals!</p>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition p-6 text-center">
                    <img src="https://play-lh.googleusercontent.com/D2s4-8A93I0pe9pudzEWGvGvKnG4H2IQxKJU4IzFv9SSXy6yFyj7t3V8v0w8u_OXQg=w480-h960-rw"
                        class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-purple-700 mb-1">Play Games</h3>
                    <p class="text-gray-600 text-sm">Test your memory and animal knowledge.</p>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition p-6 text-center">
                    <img src="https://i0.wp.com/frostingandglue.com/wp-content/uploads/2024/03/Facts-about-Animals.jpg?resize=1536%2C1024&ssl=1"
                        class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-purple-700 mb-1">Fun Facts</h3>
                    <p class="text-gray-600 text-sm">Learn surprising nature facts!</p>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition p-6 text-center">
                    <img src="img/zoo.jpg" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-purple-700 mb-1">Explore the Zoo</h3>
                    <p class="text-gray-600 text-sm">Travel through jungle, savanna, and ocean zones!</p>
                </div>

            </section>

        </main>

    </div>

</body>

</html>
