{include file="header.html.php"}
{$licznik=1}
<div class="row">
    <div class="col-sm-12 col-md-12">
        <form action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/search/" method="post">
            <div class="input-group classified-search">
                <input type="hidden" name="serverPath" value="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/"/>
                <input class="form-control" type="text" name="id" placeholder="Wyszukiwanie ogłoszenia..">
                <select class="form-control" name="category">
                    <option value="">wszystkie kategorie</option>
                    {foreach $allCats as $id => $name}
                    <option value="{$name}">{$name}</option>
                    {/foreach}
                </select>
                <span class="input-group-btn">
                            <button id="classified-search" class="btn btn-secondary" type="button">Szukaj</button>
                </span>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <p>
            <button class="btn btn-outline-primary btn-block" type="button" data-toggle="collapse"
                    data-target="#categoryCollapse" aria-expanded="false" aria-controls="collapseExample">
                Wybór kategorii
            </button>
        </p>
    </div>
</div>
<div class="collapse" id="categoryCollapse">
    <div class="jumbotron">
        <h1 class="display-3">Wybierz kategorię</h1>
        <p class="lead">Wyświetl wszystkie ogłoszenia z wybranej kategorii.</p>
        <hr class="my-4">
        <div class="row">
            <div class="col-4">
                <form action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/search/" method="post">
                    <div class="form-group">
                        <input type="hidden" name="category" value="">
                        <button class="btn fs-6 btn-bold btn btn-light btn-block  m-1" type="submit">wszystkie
                            kategorie
                        </button>
                    </div>

                </form>
            </div>
            {foreach $allCats as $id => $name}
            <div class="col-4">
                <form action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/search/" method="post">
                    <div class="form-group">
                        <input type="hidden" name="category" value="{$name}">
                        <button class="btn fs-6 btn-bold btn btn-light btn-block  m-1" type="submit">{$name}</button>
                    </div>
                </form>
            </div>
            {/foreach}
        </div>
    </div>
</div>

{if isset($allClassifieds)}
{if $allClassifieds|@count === 0}
<div class="row">
    <div class="col-sm-12 col-md-12">
        <p><strong>Nie znaleziono ogłoszeń spełniających wybrane kryteria.</strong></p>
        <p class="text-center"><a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds"
                                  role="button">Wyświetl wszystkie ogłoszenia</a></p>
    </div>
    {else}
    <div class="all-classifieds">
        {foreach $allClassifieds as $classified}
        <div class="card b-1 hover-shadow mb-20">
            <div class="media card-body">
                <div class="media-left pr-12">
                    <img class="avatar avatar-xl no-radius"
                         src="http://{$smarty.server.HTTP_HOST}{$subdir}images/default_user.png" alt="...">
                </div>
                <div class="media-body">
                    <div class="mb-2">
                        <span class="fs-20 pr-16">{$classified['title']}</span>
                    </div>
                    <small class="fs-16 fw-300 ls-1">{$classified['content']}</small>
                </div>
                <div class="media-right text-right d-block d-md-block">
                    <p class="fs-14 text-fade mb-12"><i class="fa fa-map-marker pr-1"></i> {$classified['city']}</p>
                    <span class="text-fade"><i class="fa fa-money pr-1"></i>{$classified['price']}zł</span>
                </div>
            </div>
            <footer class="card-footer flexbox align-items-center">
                <div>
                    <strong>Dodano:</strong>
                    <span>{$classified['date']|date_format:"%d/%m/%Y"}</span>
                </div>
                <div class="card-hover-show">
                    <a class="btn btn-xs fs-10 btn-bold btn-light btn-block-xs-only"
                       href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/edit/{$classified['id']}">Edycja</a>
                    <a class="btn btn-xs fs-10 btn-bold btn-info disabled btn-block-xs-only" href="#">Dodano:
                        {$classified['date']|date_format:"%d/%m/%Y"}</a>
                    <a class="btn btn-xs fs-10 btn-bold btn-primary btn-block-xs-only" href="#" data-toggle="modal"
                       data-target="#modal-contact">Wyślij wiadomość</a>
                    <form class="form-inline" action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/search/"
                          method="post">
                        <input type="hidden" name="serverPath"
                               value="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/"/>
                        <div class="form-group">
                            <input type="hidden" name="category" value="{$classified['name']}">
                        </div>
                        <button class="btn btn-xs fs-10 btn-bold btn btn-light btn-block m-1" type="submit">
                            {$classified['name']}
                        </button>
                    </form>
                </div>
            </footer>
        </div>
        {/foreach}
    </div>
    {/if}
{/if}
{if isset($error)}
    <strong>{$error}</strong>
{/if}

{include file="footer.html.php"}