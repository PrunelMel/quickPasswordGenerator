<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Générateur de Mot de Passe</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-black text-gray-300 h-screen flex ">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 h-full flex flex-col p-6">
        <div class="text-2xl font-bold text-violet-400 mb-8">
            PasswordGen
        </div>
        <nav class="flex-1">
            <ul>
                <li class="mb-4">
                    <a href="#" class="flex items-center p-3 rounded-lg bg-gray-800 text-violet-400">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"></path></svg>
                        Dashboard
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-violet-400">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-6 0h6m9 4H3"></path></svg>
                        Historique
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-violet-400">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Sécurité
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-violet-400">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A1 1 0 006 19h12a1 1 0 00.879-1.196l-1.518-8.666A2 2 0 0015.403 7H8.597a2 2 0 00-1.958 2.138l-1.518 8.666z"></path></svg>
                        Déconnexion
                    </a>
                </li>
            </ul>
        </nav>
        <!--<div>
            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-violet-400">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A1 1 0 006 19h12a1 1 0 00.879-1.196l-1.518-8.666A2 2 0 0015.403 7H8.597a2 2 0 00-1.958 2.138l-1.518 8.666z"></path></svg>
                Déconnexion
            </a>
        </div>-->
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-8 bg-gray-800">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-violet-400">Dashboard</h1>
            <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded-full">
                Nouveau Mot de Passe
            </button>
        </div>

        <!-- Formulaire de Génération de Mot de Passe -->
        <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-violet-400 mb-6">Générer un Mot de Passe</h2>
            <form>
                <!-- Longueur du mot de passe -->
                <div class="mb-4">
                    <label class="block text-gray-400 font-semibold mb-2" for="length">Longueur du Mot de Passe</label>
                    <input class="w-full p-3 bg-gray-600 text-gray-300 rounded-lg border border-gray-500 focus:border-violet-500 focus:ring-violet-500 focus:outline-none" type="number" id="length" name="length" min="8" max="128" placeholder="Entrez la longueur (8 à 128 caractères)" required>
                </div>

                <!-- Inclusion des majuscules -->
                <div class="mb-4">
                    <label class="block text-gray-400 font-semibold mb-2">
                        <input class="mr-2 leading-tight" type="checkbox" name="uppercase" checked>
                        Inclure des Majuscules
                    </label>
                </div>

                <!-- Inclusion des chiffres -->
                <div class="mb-4">
                    <label class="block text-gray-400 font-semibold mb-2">
                        <input class="mr-2 leading-tight" type="checkbox" name="numbers" checked>
                        Inclure des Chiffres
                    </label>
                </div>

                <!-- Inclusion des caractères spéciaux -->
                <div class="mb-6">
                    <label class="block text-gray-400 font-semibold mb-2">
                        <input class="mr-2 leading-tight" type="checkbox" name="specialChars" checked>
                        Inclure des Caractères Spéciaux
                    </label>
                </div>

                <!-- Bouton de génération -->
                <div class="text-center">
                    <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:ring-2 focus:ring-violet-600">
                        <a href="/generate">Générer le Mot de Passe</a>
                        
                    </button>
                </div>
            </form>
        </div>

        <!-- Liste des Mots de Passe générés -->
        <!--<div class="mt-12">
            <h2 class="text-2xl font-bold text-violet-400 mb-4">Vos Mots de Passe Récents</h2>
            <ul class="space-y-4">
                <li class="bg-gray-700 p-4 rounded-lg shadow-lg flex justify-between items-center">
                    <span class="text-gray-300">Mot de passe : <span class="text-violet-400 font-mono">abcD123$efg</span></span>
                    <button class="bg-violet-500 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded-full">Copier</button>
                </li>
                 Répétez les éléments de la liste pour afficher plus de mots de passe
            </ul>
        </div>-->
    </div>

</body>

</html>
