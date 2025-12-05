 
 <?php
include 'dbconnect.php';

if (isset($_POST['submit'])) {
    $nom = $_POST['nomAnimal'];
    $type = $_POST['type_alimentaire'];
    $idHab = $_POST['id_habitat'];
    $image = $_POST['image'];

     $sql = "INSERT INTO animal (NomAnimal, Type_alimentaire, image, id_habitat)
            VALUES ('$nom', '$type', '$image', $idHab)";

    if (mysqli_query($conn, $sql)) {
        echo  "Animal ajouté avec succès !";
        
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals - Zoo Kids</title>
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
                    class="bg-purple-700 p-3 rounded-xl font-semibold text-center shadow-lg">🦁 Animals</a>

                <a href="habitat.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">🌍
                    Habitats</a>

                <a href="statistique.php"
                    class="bg-purple-600 hover:bg-purple-500 transition p-3 rounded-xl font-semibold text-center">📊
                    Stats</a>
            </nav>

            <p class="text-center text-purple-200 text-sm pt-10">
                &copy; 2025 Zoo Kids Learning
            </p>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-10">

            <header class="bg-pink-400 text-white p-6 rounded-2xl shadow-lg mb-10">
                <h1 class="text-4xl font-bold text-center">Animals</h1>
                <p class="text-center mt-1 text-pink-100">
                    Explore and learn about zoo animals!
                </p>
            </header>

            <!-- ADD BUTTON -->
            <div class="flex justify-end mb-6">
                <button onclick="openModal()" class="bg-purple-600 text-white px-5 py-2 rounded-xl text-lg shadow
                hover:bg-purple-500 transition">
                    ➕ Add Animal
                </button>
            </div>
<!-- FILTERS -->
<div class="flex gap-4 mb-8">

    <!-- Filter Habitat -->
    <select class="w-1/2 p-3 border rounded-xl bg-white shadow">
        <option value="">Filter by Habitat</option>
        <option value="Savane">Savane</option>
        <option value="Jungle">Jungle</option>
        <option value="Désert">Désert</option>
        <option value="Océan">Océan</option>
    </select>

    <!-- Filter Type Alimentaire -->
    <select class="w-1/2 p-3 border rounded-xl bg-white shadow">
        <option >Type Alimentaire</option>
        <option value="Carnivore">Carnivore</option>
        <option value="Herbivore">Herbivore</option>
        <option value="Omnivore">Omnivore</option>
    </select>

</div>
            <!-- ANIMALS GRID -->
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
 
<?php while ($row = mysqli_fetch_assoc($result)) : ?>

<div class="bg-white rounded-2xl shadow-xl p-6 text-center">

    <img src="img/<?php echo $row['image']; ?>" 
         class="w-24 h-24 mx-auto mb-4 rounded-xl">

    <h3 class="text-xl font-semibold text-purple-700 mb-1">
        <?php echo $row['NomAnimal']; ?>
    </h3>

    <p class="text-gray-600 text-sm">
        <?php echo $row['Type_alimentaire']; ?>
    </p>

    <p class="text-gray-500 text-sm">
        Habitat : <?php echo $row['NomHabitat']; ?>
    </p>

    <div class="flex justify-center gap-3 mt-4">
        <!-- EDIT BUTTON -->
        <a href="edit_animal.php?id=<?php echo $row['idAnimal']; ?>"
           class="bg-blue-500 text-white px-3 py-1 rounded-lg">
           ✏️ Modifier
        </a>

        <!-- DELETE BUTTON -->
        <a href="delete_animal.php?id=<?php echo $row['idAnimal']; ?>"
           class="bg-red-500 text-white px-3 py-1 rounded-lg"
           onclick="return confirm('Supprimer cet animal ?');">
           🗑️ Supprimer
        </a>
    </div>

</div>

<?php endwhile; ?>

            </section>

        </main>

    </div>

    <!-- POPUP MODAL -->
    <div id="modal"
        class="fixed inset-0 bg-black bg-opacity-40 hidden justify-center items-center backdrop-blur-sm transition">

        <div class="bg-white p-8 rounded-2xl shadow-2xl w-96 animate-fadeIn">
            <h2 class="text-2xl font-bold text-purple-700 mb-4 text-center">Add New Animal</h2>

            <form  action="animal.php" method="POST"  class="space-y-4"  >
                <input type="text" name="nomAnimal" placeholder="Animal Name" class="w-full p-3 border rounded-xl">

                <select name="type_alimentaire" class="w-full p-3 border rounded-xl">
                    <option value="">Type alimentaire</option>
                    <option value="Carnivore">Carnivore</option>
                    <option value="Herbivore">Herbivore</option>
                    <option value="Omnivore">Omnivore</option>
                </select>

                <select name="id_habitat"  class="w-full p-3 border rounded-xl">
                    <option value="">Habitat</option>
                    <option value = "2">Savane</option>
                    <option value ="3">Jungle</option>
                    <option value="4">Désert</option>
                    <option value="6">Océan</option>
                </select>

                <input type="text" name="image" placeholder="image.jpg" class="w-full p-3 border rounded-xl">

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
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.25s ease-out;
        }
    </style>

</body>

</html>