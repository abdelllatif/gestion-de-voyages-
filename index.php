<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Formulaire</title>
</head>
<body class="bg-gray-100">
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'vygs';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die('Échec de la connexion: ' . $mysqli->connect_error);
}

$emailError = "";
$telephoneError = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $date_naissance = $_POST['date_naissance'];

    $stmt = $mysqli->prepare("SELECT * FROM cliente WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result_email = $stmt->get_result();

    $stmt = $mysqli->prepare("SELECT * FROM cliente WHERE telephone = ?");
    $stmt->bind_param("s", $telephone);
    $stmt->execute();
    $result_telephone = $stmt->get_result();

    if ($result_email->num_rows > 0) {
        $emailError = "L'email existe déjà !";
    }

    if ($result_telephone->num_rows > 0) {
        $telephoneError = "Le numéro existe déjà !";
    }

    if ($result_email->num_rows == 0 && $result_telephone->num_rows == 0) {
        $stmt = $mysqli->prepare('INSERT INTO cliente (nom, prenom, email, telephone, adresse, date_naissance) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $nom, $prenom, $email, $telephone, $adresse, $date_naissance);
        
        if ($stmt->execute()) {
            echo '<script>alert("Utilisateur enregistré avec succès !")</script>';
        } else {
            echo '<script>alert("Échec de l\'enregistrement de l\'utilisateur !")</script>';
        }
    }

    $stmt->close();
}

$mysqli->close();
?>

<nav class="bg-indigo-600 p-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="h-36 w-36"><img src="includes/—Pngtree—tour and travel logo_5695483.png" alt="travels"></div>
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

    <form action="" method="POST" class="mx-auto mt-16 max-w-xl rounded-lg p-12 bg-white sm:mt-20" id="myForm">
  <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
    <div>
      <label for="nom" class="block text-sm/6 font-semibold text-gray-900">Nom</label>
      <div class="mt-2.5">
        <input type="text" name="nom" id="nom" class="nom block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        <div id="nomError" class="text-red-500 text-sm mt-2 hidden">Le nom doit contenir au moins 3 caractères !</div>
      </div>
    </div>
    <div>
      <label for="prenom" class="block text-sm/6 font-semibold text-gray-900">Prénom</label>
      <div class="mt-2.5">
        <input type="text" name="prenom" id="prenom" class="prenom block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        <div id="prenomError" class="text-red-500 text-sm mt-2 hidden">Le prénom doit contenir au moins 3 caractères !</div>
      </div>
    </div>
    <div>
      <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
      <div class="mt-2.5">
        <input type="email" name="email" id="email" class="email block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        <div id="emailError" class="text-red-500 text-sm mt-2 hidden">L'email n'est pas valide.</div>
        <?php if ($emailError) { echo '<div id="emailError" class="text-red-500 text-sm mt-2">' . $emailError . '</div>'; } ?>
      </div>
    </div>
    <div>
      <label for="telephone" class="block text-sm/6 font-semibold text-gray-900">Téléphone</label>
      <div class="mt-2.5">
        <input type="tel" name="telephone" id="telephone" class="telephone block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        <div id="telephoneError" class="text-red-500 text-sm mt-2 hidden">Le téléphone doit contenir au moins 10 chiffres.</div>
        <?php if ($telephoneError) { echo '<div id="telephoneError" class="text-red-500 text-sm mt-2">' . $telephoneError . '</div>'; } ?>
      </div>
    </div>
    <div class="sm:col-span-2">
      <label for="adresse" class="block text-sm/6 font-semibold text-gray-900">Adresse</label>
      <div class="mt-2.5">
        <input type="text" name="adresse" id="adresse" class="adresse block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        <div id="adresseError" class="text-red-500 text-sm mt-2 hidden">L'adresse doit contenir au moins 4 caractères !</div>
      </div>
    </div>
    <div>
      <label for="date_naissance" class="block text-sm/6 font-semibold text-gray-900">Date de naissance</label>
      <div class="mt-2.5">
        <input type="date" name="date_naissance" id="date_naissance" class="date_naissance block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        <div id="date_naissanceError" class="text-red-500 text-sm mt-2 hidden">La date de naissance est requise.</div>
      </div>
    </div>
  </div>
  <div class="mt-10">
    <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter le client</button>
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
  const form = document.getElementById('myForm');

  form.addEventListener('submit', function(event) {
    let isValid = true;

    const nom = document.getElementById('nom');
    const prenom = document.getElementById('prenom');
    const email = document.getElementById('email');
    const telephone = document.getElementById('telephone');
    const adresse = document.getElementById('adresse');
    const date_naissance = document.getElementById('date_naissance');

    if (nom.value.trim().length < 3) {
      document.getElementById('nomError').classList.remove('hidden');
      isValid = false;
    } else {
      document.getElementById('nomError').classList.add('hidden');
    }

    if (prenom.value.trim().length < 3) {
      document.getElementById('prenomError').classList.remove('hidden');
      isValid = false;
    } else {
      document.getElementById('prenomError').classList.add('hidden');
    }

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email.value)) {
      document.getElementById('emailError').classList.remove('hidden');
      isValid = false;
    } else {
      document.getElementById('emailError').classList.add('hidden');
    }

    if (telephone.value.trim().length < 10) {
      document.getElementById('telephoneError').classList.remove('hidden');
      isValid = false;
    } else {
      document.getElementById('telephoneError').classList.add('hidden');
    }

    if (adresse.value.trim().length < 4) {
      document.getElementById('adresseError').classList.remove('hidden');
      isValid = false;
    } else {
      document.getElementById('adresseError').classList.add('hidden');
    }

    if (!date_naissance.value) {
      document.getElementById('date_naissanceError').classList.remove('hidden');
      isValid = false;
    } else {
      document.getElementById('date_naissanceError').classList.add('hidden');
    }

    if (!isValid) {
      event.preventDefault();
    }
  });
</script>

</body>
</html>
