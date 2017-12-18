{include file="header.html.php"}
<h1>Lista kategorii</h1>
{if isset($allCats)}
{if $allCats|@count === 0}
<div class="brak-wynikow">
    <b>Brak wyników w bazie!</b>
</div>

<ul class="list-group">
    <li class="list-group-item align-items-center">
    </li>
</ul>
{else}
<div class="brak-wynikow">
</div>
<ul class="list-group">
    {foreach $allCats as $id => $name}

    <li class="list-group-item align-items-center">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{$name}</h4>
                <div class="text-right">
                    <a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/edit/{$id}">edycja</a>
                    <a class="usun btn btn-danger" data-title="Usuwanie kategorii"
                       data-server-path="http://{$smarty.server.HTTP_HOST}{$subdir}categories/"
                       data-id="{$id}"
                       href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/delete/{$id}">usuń</a>
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
<p>
    <button class="btn btn-primary btn-block" type="button" data-toggle="collapse"
            data-target="#categoryCollapse" aria-expanded="false" aria-controls="collapseExample">
        Dodaj
        kategorię
    </button>
</p>
<div class="collapse" id="categoryCollapse">
    <form id="form">
        <div class="form-group">
            <label>Nazwa kategorii:</label>
            <input class="form-control" type="text" name="name" minlength="3" placeholder="Wpisz nazwę.."
                   autofocus/><br/>
            <input type="hidden" name="serverPath" value="http://{$smarty.server.HTTP_HOST}{$subdir}categories/"/>
        </div>
        <div class="alert alert-danger collapse" role="alert"></div>
        <button class="btn btn-outline-primary btn-block" id="wyslij" type="button">Dodaj</button>
    </form>
</div>
{include file="footer.html.php"}