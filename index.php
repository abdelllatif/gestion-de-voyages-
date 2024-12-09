<!DOCTYPE html>
<html lang="ENG">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> form</title>
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

<form action="insertIntoDB.php" method="POST" class="mx-auto mt-16 max-w-xl rounded-lg p-12 bg-white sm:mt-20">
  <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
    <div>
      <label for="nom" class="block text-sm/6 font-semibold text-gray-900">Nom</label>
      <div class="mt-2.5">
        <input type="text" name="nom" id="nom" autocomplete="family-name" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
      </div>
    </div>
    <div>
      <label for="prenom" class="block text-sm/6 font-semibold text-gray-900">Prénom</label>
      <div class="mt-2.5">
        <input type="text" name="prenom" id="prenom" autocomplete="given-name" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
      </div>
    </div>
    <div>
      <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
      <div class="mt-2.5">
        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
      </div>
    </div>
    <div>
      <label for="telephone" class="block text-sm/6 font-semibold text-gray-900">Téléphone</label>
      <div class="mt-2.5">
        <input type="tel" name="telephone" id="telephone" autocomplete="tel" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
      </div>
    </div>
    <div class="sm:col-span-2">
      <label for="adresse" class="block text-sm/6 font-semibold text-gray-900">Adresse</label>
      <div class="mt-2.5">
        <input type="text" name="adresse" id="adresse" autocomplete="street-adresse" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
      </div>
    </div>
    <div>
      <label for="date_naissance" class="block text-sm/6 font-semibold text-gray-900">Date de naissance</label>
      <div class="mt-2.5">
        <input type="date" name="date_naissance" id="date_naissance" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
      </div>
    </div>
  </div>
  <div class="mt-10">
    <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">submit</button>
  </div>
</form>

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
