
<div class="fixed inset-0 flex items-center justify-center backdrop-blur-md bg-black/30  ">
    <div class="mx-auto mt-16 max-w-xl sm:mt-20 bg-slate-200 p-4 rounded-md border-0 shadow-2xl">
        <form action="{{Route('commentaires.delete', [$id, $scene_id])}}" method="post">
            @csrf
            @method("DELETE")
        <p>Voulez-vous valider ?</p>
        <input class=" bg-red-600 rounded p-2" type="submit" name="delete" value="Refuser">
        <input class="bg-green-600 rounded p-2" type="submit" name="delete" value="Supprimer">
        </form>
    </div>
</div>
