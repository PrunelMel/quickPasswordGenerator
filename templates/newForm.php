<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Compte - PasswordGen</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-black text-gray-300 flex justify-center items-center h-screen">

    <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-violet-400 text-center mb-6">Créer un Compte</h2>
        
        <form>
            <!-- Nom d'utilisateur -->
            <div class="mb-4">
                <label class="block text-gray-400 font-semibold mb-2" for="username">Nom d'utilisateur</label>
                <input class="w-full p-3 bg-gray-700 text-gray-300 rounded-lg border border-gray-600 focus:border-violet-500 focus:ring-violet-500 focus:outline-none" type="text" id="username" name="username" placeholder="Votre nom d'utilisateur" required>
            </div>

            <!-- Adresse Email -->
            <div class="mb-4">
                <label class="block text-gray-400 font-semibold mb-2" for="email">Adresse Email</label>
                <input class="w-full p-3 bg-gray-700 text-gray-300 rounded-lg border border-gray-600 focus:border-violet-500 focus:ring-violet-500 focus:outline-none" type="email" id="email" name="email" placeholder="Votre adresse email" required>
            </div>

            <!-- Mot de Passe -->
            <div class="mb-4">
                <label class="block text-gray-400 font-semibold mb-2" for="password">Mot de Passe</label>
                <input class="w-full p-3 bg-gray-700 text-gray-300 rounded-lg border border-gray-600 focus:border-violet-500 focus:ring-violet-500 focus:outline-none" type="password" id="password" name="password" placeholder="Votre mot de passe" required>
            </div>

            <!-- Confirmation du Mot de Passe -->
            <div class="mb-6">
                <label class="block text-gray-400 font-semibold mb-2" for="confirm_password">Confirmer le Mot de Passe</label>
                <input class="w-full p-3 bg-gray-700 text-gray-300 rounded-lg border border-gray-600 focus:border-violet-500 focus:ring-violet-500 focus:outline-none" type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
            </div>

            <!-- Bouton de création de compte -->
            <div class="text-center">
                <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:ring-2 focus:ring-violet-600">
                    Créer un Compte
                </button>
            </div>
        </form>

        <!-- Lien vers la page de connexion -->
        <div class="text-center mt-4">
            <a href="#" class="text-violet-400 hover:text-violet-600">Déjà un compte? Connectez-vous ici.</a>
        </div>
    </div>

</body>

</html>
