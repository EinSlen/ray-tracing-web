<x-layout>
    @guest
    <h1 class="text-amber-50 text-center p-5 text-red-300">Identifiez-vous pour pouvoir créer des scènes.</h1>
    @endguest
        <div class="bg-white py-5">
        <h2 class="text-lg font-semibold text-gray-800 p-2">Présentation de l’application</h2>
        <p class="text-sm text-gray-600 p-2">
            Dans cette phase préliminaire du projet marathon, nous allons développer une application dont
            l’objectif sera de gérer les images calculées à l’aide de votre bibliothèque de lancer de rayons.
           Nous allons mettre à la disposition des développeurs
            de bibliothèque de lancer de rayons une application dans laquelle ils pourront stocker toutes les
            informations associées aux scènes qu’ils auront calculées.
        </p>
        <ul class="list-disc text-sm text-gray-600 p-2">
            <li>Chaque scène calculée est associée à un fichier de description de la scène à calculer, utilisé par le parser de votre bibliothèque de lancer de rayons.</li>
            <li>Il est nécessaire de pouvoir associer à la scène calculée une description du résultat attendu, comprenant les différents traitements utilisés pour calculer la lumière, avec ou sans ombrage, etc.</li>
            <li>Il faut pouvoir associer à la scène l’image calculée ainsi qu'une vignette (image réduite).</li>
            <li>Un lien vers l’exécutable qui calcule la scène doit également être pris en compte.</li>
        </ul>
        <p class="text-sm text-gray-600 p-2">
            Pour compléter notre application, nous souhaitons pouvoir gérer un mécanisme de scènes favorites, de
            commentaires et de notation qui seront donnés par les utilisateurs de l’application.
        </p>
            <a class="p-5 mt-5 text-black text-4xl" href="{{route('scenes.index')}}">Voir les scènes...</a>
    </div>
</x-layout>
