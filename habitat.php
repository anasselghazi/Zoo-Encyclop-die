

<?php
include 'dbconnect.php';
 // AJOUTER
if (isset($_POST['submit'])) {
    $nom = $_POST['NomHabitat'];
    $description = $_POST['Description_Hab'];
    $image=$_POST['image'];
     

     $sql = "INSERT INTO habitat (NomHabitat, Description_Hab ,image)
            VALUES ('$nom', '$description','$image')";

    if (mysqli_query($conn, $sql)) {
        echo  "habitat ajouté avec succès !";
        
    header("Location: habitat.php?success=1");
    exit();


    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}

//AFFICHE
$sql="SELECT * FROM habitat";
$result=mysqli_query($conn,$sql);

//delete
if(isset($_POST['delete']) && isset($_POST['idHab'])) {
    $id = $_POST['idHab'];     
    $sql = "DELETE FROM habitat WHERE idHab = $id";

    if(mysqli_query($conn, $sql)){
        
        header("Location: habitat.php?delete=1");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}

  //EDIT
  
if (isset($_POST['update'])) {
    $id = $_POST['idHab'];
    $nom = $_POST['NomHabitat'];
    $desc = $_POST['Description_Hab'];
    $image = $_POST['image'];

    $sql = "UPDATE habitat 
            SET NomHabitat='$nom',
                Description_Hab='$desc',
                image='$image'
            WHERE idHab=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: habitat.php?updated=1");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}

  


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
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">

       <?php while ($row = mysqli_fetch_assoc($result)) : ?>

    <div class="bg-white rounded-2xl shadow-lg p-5 text-center">

        <!-- Image -->
        <img src="uploads/<?php echo $row['image']; ?>" 
             class="w-28 h-28 object-cover mx-auto rounded-xl mb-4">

        <!-- Name -->
        <h3 class="text-xl font-bold text-green-700 mb-2">
            <?php echo $row['NomHabitat']; ?>
        </h3>

        <!-- Description -->
        <p class="text-gray-600 text-sm mb-3">
            <?php echo $row['Description_Hab']; ?>
        </p>

        <!-- Buttons -->
        <div class="flex justify-center gap-3 mt-3">

            <button type="button"
    class="bg-blue-500 text-white px-3 py-1 rounded-lg"
    onclick="openEditModal(
        '<?php echo $row['idHab']; ?>',
        '<?php echo $row['NomHabitat']; ?>',
        '<?php echo $row['Description_Hab']; ?>',
        '<?php echo $row['image']; ?>'
    )">
    ✏️ Modifier
</button>

            <!-- Delete -->
             <form action="habitat.php" method="POST" onsubmit="return confirm('Supprimer cet animal ?');">
            <input type="hidden" name="idHab" value="<?php echo $row['idHab']; ?>">
          <button type="submit" name="delete" class="bg-red-500 text-white px-3 py-1 rounded-lg">
        🗑️delete
    </button>
</form>

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
            <h2 class="text-2xl font-bold text-purple-700 mb-4 text-center">Add New Habitat</h2>

            <form  action="habitat.php" method="POST" class="space-y-4">
                <input type="text" name="NomHabitat" placeholder="Habitat Name" class="w-full p-3 border rounded-xl">

                <textarea name="Description_Hab" placeholder="Description" class="w-full p-3 border rounded-xl"></textarea>

                <input type="text" name ="image" class="w-full p-3 border rounded-xl">

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


<!-- EDIT MODAL -->
<div id="editModal"
    class="fixed inset-0 bg-black bg-opacity-40 hidden justify-center items-center backdrop-blur-sm">

    <div class="bg-white p-8 rounded-2xl shadow-2xl w-96 animate-fadeIn">
        <h2 class="text-2xl font-bold text-blue-700 mb-4 text-center">Modifier Habitat</h2>

        <form action="habitat.php" method="POST" class="space-y-4">

            
            <input type="hidden" id="edit_id" name="idHab">

            <input type="text" id="edit_nom" name="NomHabitat"
                   class="w-full p-3 border rounded-xl">

            <textarea id="edit_desc" name="Description_Hab"
                      class="w-full p-3 border rounded-xl"></textarea>

            <input type="text" id="edit_image" name="image"
                   class="w-full p-3 border rounded-xl">

            <div class="flex justify-between">

                <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-300 rounded-xl hover:bg-gray-400">
                    Annuler
                </button>

                <button type="submit" name="update"
                        class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-500">
                    Mettre à jour
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


function openEditModal(id, nom, desc, image) {
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_nom").value = nom;
    document.getElementById("edit_desc").value = desc;
    document.getElementById("edit_image").value = image;

    document.getElementById("editModal").classList.remove("hidden");
    document.getElementById("editModal").classList.add("flex");
}

function closeEditModal() {
    document.getElementById("editModal").classList.add("hidden");
    document.getElementById("editModal").classList.remove("flex");
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