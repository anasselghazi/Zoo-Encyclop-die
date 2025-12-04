<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Crèche - Gestion des Animaux</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        .sidebar-open { animation: slideIn 0.3s ease-out; }
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
                <li><a onclick="showSection('dashboard')" class="block cursor-pointer p-3 text-white rounded-lg hover:bg-white/20">Dashboard</a></li>
                <li><a onclick="showSection('animaux')" class="block cursor-pointer p-3 text-white rounded-lg hover:bg-white/20">Animaux</a></li>
                <li><a onclick="showSection('habitats')" class="block cursor-pointer p-3 text-white rounded-lg hover:bg-white/20">Habitats</a></li>
                <li><a onclick="showSection('statistiques')" class="block cursor-pointer p-3 text-white rounded-lg hover:bg-white/20">Statistiques</a></li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="sm:ml-64 p-4">

        <!-- DASHBOARD -->
        <div id="dashboard" class="section active">
            <div class="p-6 bg-white rounded-2xl shadow-lg mb-6">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 text-transparent bg-clip-text">Tableau de Bord</h1>
                <p class="text-gray-600">Bienvenue dans l'application de gestion du zoo pour la crèche</p>
            </div>
        </div>

        <!-- ANIMAUX -->
        <div id="animaux" class="section">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-4">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-blue-600 text-transparent bg-clip-text">Gestion des Animaux</h1>
            </div>

            <!-- BOUTON AJOUTER ANIMAL -->
            <button onclick="openModal('addAnimalModal')" 
                    class="mb-6 px-4 py-2 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700">
                + Ajouter Animal
            </button>

            <div id="animalsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"></div>
        </div>

        <!-- HABITATS -->
        <div id="habitats" class="section">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-4">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-teal-600 text-transparent bg-clip-text">Gestion des Habitats</h1>
            </div>

            <!-- BOUTON AJOUTER HABITAT -->
            <button onclick="openModal('addHabitatModal')" 
                    class="mb-6 px-4 py-2 bg-green-600 text-white rounded-xl shadow hover:bg-green-700">
                + Ajouter Habitat
            </button>

            <div id="habitatsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"></div>
        </div>

        <!-- STATISTIQUES -->
        <div id="statistiques" class="section">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 text-transparent bg-clip-text">Statistiques du Zoo</h1>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <canvas id="dietChart"></canvas>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <canvas id="habitatChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL AJOUTER ANIMAL -->
    <div id="addAnimalModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl">
            <h2 class="text-2xl font-bold mb-4 text-indigo-600">Ajouter un Animal</h2>
            <form>
                <input type="text" class="w-full p-2 border rounded mb-3" placeholder="Nom">
                <select class="w-full p-2 border rounded mb-3">
                    <option>Carnivore</option>
                    <option>Herbivore</option>
                    <option>Omnivore</option>
                </select>
                <input type="text" class="w-full p-2 border rounded mb-3" placeholder="Habitat">
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal('addAnimalModal')" class="px-4 py-2 bg-gray-300 rounded-xl">Fermer</button>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL AJOUTER HABITAT -->
    <div id="addHabitatModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-xl">
            <h2 class="text-2xl font-bold mb-4 text-green-600">Ajouter un Habitat</h2>
            <form>
                <input type="text" class="w-full p-2 border rounded mb-3" placeholder="Nom habitat">
                <textarea class="w-full p-2 border rounded mb-3" placeholder="Description"></textarea>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal('addHabitatModal')" class="px-4 py-2 bg-gray-300 rounded-xl">Fermer</button>
                    <button class="px-4 py-2 bg-green-600 text-white rounded-xl">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        function showSection(id) {
            document.querySelectorAll(".section").forEach(sec => sec.classList.remove("active"));
            document.getElementById(id).classList.add("active");
        }

        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        }
    </script>

</body>
</html>
