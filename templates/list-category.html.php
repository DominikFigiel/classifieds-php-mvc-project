<div class="col-xs-6 col-md-4">
    <div class="list-group">
        {*
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds" class="list-group-item">Motoryzacja</a>
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds" class="list-group-item">Elektronika</a>
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds" class="list-group-item">Sport</a>
        *}
        {if isset($allCats)}
        {if $allCats|@count === 0}
        <b>Brak kategorii w bazie!</b><br/><br/>
        {else}
        <h5 class="mb-1">Kategorie ogłoszeń</h5>
        {foreach $allCats as $id => $name}
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/{$id}" class="list-group-item">{$name}</a>
        {/foreach}
        {/if}
        {/if}
    </div>
</div>