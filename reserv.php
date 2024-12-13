<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'vygs';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die('Échec de la connexion: ' . $mysqli->connect_error);
}

$clients_result = $mysqli->query("SELECT id_client, nom FROM cliente");
$activities_result = $mysqli->query("SELECT id_activite, titre FROM activite");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ajouter une Réservation</title>
</head>
<body class="bg-gray-100">
<nav class="bg-indigo-600 p-4">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="h-36 w-36"><img src="includes/—Pngtree—tour and travel logo_5695483.png" alt="voyages"></div>
                <div class="ml-10 flex items-center space-x-4">
                    <a href="index.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Client</a>
                    <a href="afficheall.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Informations</a>
                    <a href="fold.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Activité</a>
                    <a href="reserv.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Réservation</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<form id="myForm" action="reservation.php" method="POST" class="mx-auto mt-16 max-w-2xl bg-white p-8 rounded-lg p-12 bg-gray-200 shadow-lg rounded-md">
    <h2 class="text-xl font-bold text-gray-900 mb-6">Ajouter une Réservation</h2>
    
    <div class="mb-4">
        <label for="id_client" class="block text-sm font-semibold text-gray-900">Nom du Client</label>
        <select name="id_client" id="id_client" required class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-gray-300 focus:outline-indigo-600">
            <option value="">Sélectionnez un client</option>
            <?php while ($client = $clients_result->fetch_assoc()) { ?>
                <option value="<?= $client['id_client'] ?>"><?= $client['nom'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-4">
        <label for="id_activite" class="block text-sm font-semibold text-gray-900">Nom de l'Activité</label>
        <select name="id_activite" id="id_activite" required class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-gray-300 focus:outline-indigo-600">
            <option value="">Sélectionnez une activité</option>
            <?php while ($activity = $activities_result->fetch_assoc()) { ?>
                <option value="<?= $activity['id_activite'] ?>"><?= $activity['titre'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div>
        <label for="dateReserv" class="block text-sm/6 font-semibold text-gray-900">Date de Réservation</label>
        <div class="mt-2.5">
            <input type="datetime-local" name="dateReserv" id="dateReserv" class="dateReserv block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
            <div id="dateReservError" class="text-red-500 text-sm mt-2 hidden">La date de réservation est requise.</div>
        </div>
    </div>

    <div class="mb-4">
        <label for="status" class="block text-sm font-semibold text-gray-900">Statut</label>
        <select name="status" id="status" required class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-gray-300 focus:outline-indigo-600">
            <option value="En attente">En attente</option>
            <option value="Confirmée">Confirmée</option>
            <option value="Annulée">Annulée</option>
        </select>
    </div>

    <div class="mt-8">
        <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
            Ajouter la Réservation
        </button>
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

<script>
  document.getElementById('myForm').addEventListener('submit', function(event) {
    const dateReserv = document.getElementById('dateReserv').value;
    const dateReservError = document.getElementById('dateReservError');
    const today = new Date().toISOString().split('T')[0];

    dateReservError.classList.add('hidden');

    if (!dateReserv) {
      dateReservError.textContent = "La date de reservation est requise.";
      dateReservError.classList.remove('hidden');
      event.preventDefault(); 
    } 
  });
</script>

</body>
</html>

<?php
$clients_result->free();
$activities_result->free();
$mysqli->close();
?>
