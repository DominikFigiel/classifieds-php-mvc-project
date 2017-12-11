{include file="header.html.php"}
<h1>Lista kategorii</h1>
{if isset($allCats)}
{if $allCats|@count === 0}
<b>Brak kategorii w bazie!</b><br/><br/>
{else}
<ul class="list-group">
    {foreach $allCats as $id => $name}

    <li class="list-group-item align-items-center">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{$name}</h4>
                <div class="text-right">
                    <a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/edit/{$id}">edycja</a>
                    <a class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/delete/{$id}">usuń</a>
                </div>
            </div>
        </div>
    </li>
    {/foreach}
</ul>
{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<a class="form-control btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/add">Dodaj
    kategorię</a>
{include file="footer.html.php"}