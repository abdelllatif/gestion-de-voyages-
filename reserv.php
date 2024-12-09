<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'vygs';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

$clients_result = $mysqli->query("SELECT id_client, nom FROM cliente");

$activities_result = $mysqli->query("SELECT id_activite, titre FROM activite");

?>

<!DOCTYPE html>
<html lang="en">
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


    <form action="reservation.php" method="POST" class="mx-auto mt-16 max-w-2xl bg-white p-8 rounded-lg p-12 bg-gray-200 shadow-lg rounded-md">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Ajouter une Réservation</h2>
        
        <div class="mb-4">
            <label for="id_client" class="block text-sm font-semibold text-gray-900">ID Client</label>
            <select name="id_client" id="id_client" required
                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-gray-300 focus:outline-indigo-600">
                <option value="">Sélectionnez un client</option>
                <?php while ($client = $clients_result->fetch_assoc()) { ?>
                    <option value="<?= $client['id_client'] ?>"><?= $client['nom'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="id_activite" class="block text-sm font-semibold text-gray-900">ID Activité</label>
            <select name="id_activite" id="id_activite" required
                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-gray-300 focus:outline-indigo-600">
                <option value="">Sélectionnez une activité</option>
                <?php while ($activity = $activities_result->fetch_assoc()) { ?>
                    <option value="<?= $activity['id_activite'] ?>"><?= $activity['titre'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="date_reservation" class="block text-sm font-semibold text-gray-900">Date de Réservation</label>
            <input type="date" name="date_reservation" id="date_reservation" required
                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-gray-300 focus:outline-indigo-600">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-semibold text-gray-900">Statut</label>
            <select name="status" id="status" required
                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-gray-300 focus:outline-indigo-600">
                <option value="En attente">En attente</option>
                <option value="Confirmée">Confirmée</option>
                <option value="Annulée">Annulée</option>
            </select>
        </div>

        <div class="mt-8">
            <button type="submit" 
                class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
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

</body>
</html>

<?php
$clients_result->free();
$activities_result->free();
$mysqli->close();
?>
