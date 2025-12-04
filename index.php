 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Crèche - Gestion des Animaux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes slideIn { from { transform: translateX(-100%); } to { transform: translateX(0); } }
        .sidebar-open { animation: slideIn 0.3s ease-out; }
        .animal-card, .habitat-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .animal-card:hover, .habitat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        .section { display: none; }
        .section.active { display: block; }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-50">

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 sidebar-open">
        <div class="h-full px-4 py-6 overflow-y-auto bg-gradient-to-b from-indigo-600 to-purple-700 shadow-2xl">
            <!-- Logo -->
            <div class="flex items-center mb-8 p-3 bg-white/10 rounded-xl backdrop-blur-sm">
                <i class="fas fa-paw text-4xl text-yellow-300 mr-3"></i>
                <div>
                    <h2 class="text-2xl font-bold text-white">Zoo Crèche</h2>
                    <p class="text-xs text-purple-200">Apprendre en s'amusant</p>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="space-y-2 font-medium">
                <li><a href="#dashboard" class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 group transition-all duration-200"><i class="fas fa-chart-line w-6 h-6 text-yellow-300 group-hover:scale-110 transition-transform"></i><span class="ms-3 text-lg">Dashboard</span></a></li>
                <li><a href="#animaux" class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 group transition-all duration-200"><i class="fas fa-horse w-6 h-6 text-green-300 group-hover:scale-110 transition-transform"></i><span class="ms-3 text-lg">Animaux</span></a></li>
                <li><a href="#habitats" class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 group transition-all duration-200"><i class="fas fa-tree w-6 h-6 text-green-400 group-hover:scale-110 transition-transform"></i><span class="ms-3 text-lg">Habitats</span></a></li>
                <li><a href="#statistiques" class="flex items-center p-3 text-white rounded-lg hover:bg-white/20 group transition-all duration-200"><i class="fas fa-chart-pie w-6 h-6 text-pink-400 group-hover:scale-110 transition-transform"></i><span class="ms-3 text-lg">Statistiques</span></a></li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="sm:ml-64 p-4">

        <!-- Dashboard -->
        <div id="dashboard" class="section active">
            <div class="p-6 bg-white rounded-2xl shadow-lg mb-6">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-2">Tableau de Bord</h1>
                <p class="text-gray-600">Bienvenue dans l'application de gestion du zoo pour la crèche</p>
            </div>
        </div>

        <!-- Animaux -->
        <div id="animaux" class="section">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 flex justify-between items-center">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600">Gestion des Animaux</h1>
                <button onclick="openModal('addAnimalModal')" class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Ajouter un Animal</button>
            </div>
            <div id="animalsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Cartes animales statiques -->
                <div class="animal-card bg-white rounded-2xl shadow-lg p-4">
                    <img src="https://via.placeholder.com/150" class="w-full h-40 object-cover rounded-lg mb-3">
                    <h3 class="text-lg font-bold text-gray-800">Lion</h3>
                    <p class="text-gray-600">Carnivore</p>
                </div>
                <div class="animal-card bg-white rounded-2xl shadow-lg p-4">
                    <img src="https://via.placeholder.com/150" class="w-full h-40 object-cover rounded-lg mb-3">
                    <h3 class="text-lg font-bold text-gray-800">Girafe</h3>
                    <p class="text-gray-600">Herbivore</p>
                </div>
            </div>
        </div>

        <!-- Habitats -->
        <div id="habitats" class="section">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 flex justify-between items-center">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-teal-600">Gestion des Habitats</h1>
                <button onclick="openModal('addHabitatModal')" class="px-4 py-2 bg-green-600 text-white rounded-xl">Ajouter un Habitat</button>
            </div>
            <div id="habitatsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Cartes habitats statiques -->
                <div class="habitat-card bg-white rounded-2xl shadow-lg p-4">
                    <h3 class="text-lg font-bold text-gray-800">Savane</h3>
                    <p class="text-gray-600">Habitat sec et chaud</p>
                </div>
                <div class="habitat-card bg-white rounded-2xl shadow-lg p-4">
                    <h3 class="text-lg font-bold text-gray-800">Forêt Tropicale</h3>
                    <p class="text-gray-600">Habitat humide et dense</p>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div id="statistiques" class="section">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">Statistiques du Zoo</h1>
            </div>
        </div>

    </div>

    <!-- Modal Ajouter Animal -->
    <div id="addAnimalModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl">
            <h2 class="text-2xl font-bold mb-4 text-indigo-600">Ajouter un Animal</h2>
            <form>
                <label class="font-semibold">Nom :</label>
                <input type="text" class="w-full p-2 border rounded mb-3">

                <label class="font-semibold">Type Alimentaire :</label>
                <select class="w-full p-2 border rounded mb-3">
                    <option>Carnivore</option>
                    <option>Herbivore</option>
                    <option>Omnivore</option>
                </select>

                <label class="font-semibold">Habitat :</label>
                <input type="text" class="w-full p-2 border rounded mb-3">

                <label class="font-semibold">Lien Image :</label>
                <input type="text" placeholder="https://example.com/image.jpg" class="w-full p-2 border rounded mb-3">

                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeModal('addAnimalModal')" class="px-4 py-2 bg-gray-300 rounded-xl">Fermer</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Ajouter Habitat -->
    <div id="addHabitatModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl">
            <h2 class="text-2xl font-bold mb-4 text-green-600">Ajouter un Habitat</h2>
            <form>
                <label class="font-semibold">Nom Habitat :</label>
                <input type="text" class="w-full p-2 border rounded mb-3">

                <label class="font-semibold">Description :</label>
                <textarea class="w-full p-2 border rounded mb-3"></textarea>

                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeModal('addHabitatModal')" class="px-4 py-2 bg-gray-300 rounded-xl">Fermer</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-xl">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

<script>
// Navigation dynamique sidebar
const links = document.querySelectorAll('aside ul li a');
const sections = document.querySelectorAll('.section');

links.forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
        const target = link.getAttribute('href').substring(1);
        sections.forEach(section => {
            section.classList.toggle('active', section.id.toLowerCase() === target.toLowerCase());
        });
    });
});

// Modals
function openModal(id){ document.getElementById(id).classList.remove('hidden'); }
function closeModal(id){ document.getElementById(id).classList.add('hidden'); }
</script>

</body>
</html>