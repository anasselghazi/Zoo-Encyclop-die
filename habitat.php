

<?php
include 'dbconnect.php';

if (isset($_POST['submit'])) {
    $nom = $_POST['nomAnimal'];
    $description = $_POST['type_alimentaire'];
     

     $sql = "INSERT INTO habitat (NomHabitat, Description_Hab)
            VALUES ('$nom', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo  "habitat ajouté avec succès !";
        
    header("Location: animal.php?success=1");
    exit();


    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>
  <?php
 include 'dbconnect.php';
$sql="SELECT a.idAnimal,a.NomAnimal,a.Type_alimentaire,a.image,h.NomHabitat
FROM  animal a
    INNER JOIN habitat h ON a.id_habitat = h.idHab ";
    $result = mysqli_query($conn,$sql);


 ?>
 







<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitats - Zoo Kids</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-purple-800 text-white p-6 space-y-6 shadow-2xl">
            <h2 class="text-3xl font-bold text-center mb-10">🐾 Zoo Kids</h2>

            <nav class="flex flex-col gap-4">
                <a href="index.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">🏠 Home</a>

                <a href="animal.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">🦁 Animals</a>

                <a href="habitat.php"
                    class="bg-purple-700 p-3 rounded-xl font-semibold text-center shadow-lg">🌍 Habitats</a>

                <a href="statistique.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">📊 Statistique</a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-10">

            <header class="bg-green-500 text-white p-6 rounded-2xl shadow-lg mb-10">
                <h1 class="text-4xl font-bold text-center">Habitats</h1>
                <p class="text-center mt-1 text-green-100">
                    Explore the natural homes of the animals!
                </p>
            </header>

            <!-- ADD BUTTON -->
            <div class="flex justify-end mb-6">
                <button onclick="openModal()" class="bg-purple-600 text-white px-5 py-2 rounded-xl text-lg shadow
                hover:bg-purple-500 transition">
                    ➕ Add Habitat
                </button>
            </div>

            <!-- HABITATS GRID -->
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <!-- Example Card -->
                <div class="bg-white rounded-2xl shadow-xl p-6 text-center">
                    <img src="img/savane.jpg" class="w-full h-32 object-cover rounded-xl mb-4">
                    <h3 class="text-xl font-semibold text-purple-700 mb-1">Savane</h3>
                    <p class="text-gray-600 text-sm mb-4">Large hot open grassland.</p>

                    <div class="flex justify-between">
                        <a href="edit_habitat.php?id=1" class="px-3 py-1 bg-yellow-500 text-white rounded">Modifier</a>
                        <a href="delete_habitat.php?id=1" class="px-3 py-1 bg-red-600 text-white rounded">Supprimer</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-6 text-center">
                    <img src="img/jungle.jpg" class="w-full h-32 object-cover rounded-xl mb-4">
                    <h3 class="text-xl font-semibold text-purple-700 mb-1">Jungle</h3>
                    <p class="text-gray-600 text-sm mb-4">Dense forest with humidity.</p>

                    <div class="flex justify-between">
                        <a href="edit_habitat.php?id=2" class="px-3 py-1 bg-yellow-500 text-white rounded">Modifier</a>
                        <a href="delete_habitat.php?id=2" class="px-3 py-1 bg-red-600 text-white rounded">Supprimer</a>
                    </div>
                </div>

            </section>

        </main>
    </div>

    <!-- POPUP MODAL -->
    <div id="modal"
        class="fixed inset-0 bg-black bg-opacity-40 hidden justify-center items-center backdrop-blur-sm transition">

        <div class="bg-white p-8 rounded-2xl shadow-2xl w-96 animate-fadeIn">
            <h2 class="text-2xl font-bold text-purple-700 mb-4 text-center">Add New Habitat</h2>

            <form class="space-y-4">
                <input type="text" name="NomHabitat" placeholder="Habitat Name" class="w-full p-3 border rounded-xl">

                <textarea name="Description_Hab" placeholder="Description" class="w-full p-3 border rounded-xl"></textarea>

                <input type="file" class="w-full p-3 border rounded-xl">

                <div class="flex justify-between">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 rounded-xl hover:bg-gray-400">Cancel</button>

                    <button type="submit" name="submit" class="px-4 py-2 bg-purple-600 text-white rounded-xl hover:bg-purple-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS FOR POPUP -->
    <script>
        function openModal() {
            document.getElementById("modal").classList.remove("hidden");
            document.getElementById("modal").classList.add("flex");
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
            document.getElementById("modal").classList.remove("flex");
        }
    </script>

    <!-- Fade Animation -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to   { opacity: 1; transform: scale(1); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.25s ease-out;
        }
    </style>

</body>
</html>