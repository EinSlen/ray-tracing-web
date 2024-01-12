<!-- resources/views/components/Statistiques.blade.php -->

<div class="bg-slate-200 p-4 rounded">
    <h4>Statistiques</h4>
    <ul>
        <li>Note moyenne: {{ $moyenne }}</li>
        <li>Note la plus haute: {{ $max }}</li>
        <li>Note la plus basse: {{ $min }}</li>
        <li>Nombre d'utilisateurs favoris: {{ $nombreFavoris }}</li>
    </ul>
</div>
