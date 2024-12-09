<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ajouter une Activité</title>
</head>
<body class="bg-gray-100">
<nav class="bg-indigo-600 p-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="h-36 w-36"><img src="includes/—Pngtree—tour and travel logo_5695483.png" alt="travels"></div>
                    <div class="ml-10 flex items-center space-x-4">
                    <a href="index.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Client</a>
                    <a href="afficheall.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">informations</a>

                    <a href="fold.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Activité</a>
                        <a href="reserv.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Réservation</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <form action="formhandler.php" method="POST" class="mx-auto mt-16 max-w-2xl bg-white p-8 shadow-lg rounded-lg p-12 bg-gray-200  rounded-md">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Ajouter une Nouvelle Activité</h2>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="titre" class="block text-sm font-semibold text-gray-900">Titre</label>
                <div class="mt-2.5">
                    <input type="text" name="titre" id="titre" required 
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block text-sm font-semibold text-gray-900">Description</label>
                <div class="mt-2.5">
                    <textarea name="description" id="description" rows="4" required
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600"></textarea>
                </div>
            </div>
            <div>
                <label for="destination" class="block text-sm font-semibold text-gray-900">Destination</label>
                <div class="mt-2.5">
                    <input type="text" name="destination" id="destination" required 
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600">
                </div>
            </div>
            <div>
                <label for="prix" class="block text-sm font-semibold text-gray-900">Prix (€)</label>
                <div class="mt-2.5">
                    <input type="number" step="0.01" name="prix" id="prix" required 
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600">
                </div>
            </div>
            <div>
                <label for="date_debut" class="block text-sm font-semibold text-gray-900">Date de Début</label>
                <div class="mt-2.5">
                    <input type="date" name="date_debut" id="date_debut" required 
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600">
                </div>
            </div>
            <div>
                <label for="date_fin" class="block text-sm font-semibold text-gray-900">Date de Fin</label>
                <div class="mt-2.5">
                    <input type="date" name="date_fin" id="date_fin" required 
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600">
                </div>
            </div>
            <div>
                <label for="places_disponible" class="block text-sm font-semibold text-gray-900">Places Disponibles</label>
                <div class="mt-2.5">
                    <input type="number" name="places_disponible" id="places_disponible" required 
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600">
                </div>
            </div>
        </div>
        <div class="mt-8">
            <button type="submit" 
                class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                Ajouter l'Activité
            </button>
        </div>
    </form>
    <!-- Footer -->
<footer class="bg-indigo-600 text-white text-center py-4 mt-24">
    <p class="text-sm">© 2024 Mon Application - Tous droits réservés</p>
    <div class="mt-2">
        <a href="index.php" class="text-white hover:underline text-sm">Ajouter Client</a> |
        <a href="fold.php" class="text-white hover:underline text-sm">Ajouter Activité</a> |
        <a href="reserv.php" class="text-white hover:underline text-sm">Ajouter Réservation</a>
    </div>
</footer>
</body>
</html>
