{include file="header.html.php"}
<div class="row">
    <div class="col-sm-12 col-md-12">
        <form action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/search/" method="post">
            <div class="input-group classified-search">

                <input class="form-control" type="text" name="id" placeholder="Wyszukiwanie ogłoszenia..">
                <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Szukaj</button>
                        </span>
            </div>
        </form>
    </div>
</div>
{if isset($phrase)}
<h1>Lista ogłoszeń zawierających frazę '{$phrase}'</h1>
{else}
<h1>Lista ogłoszeń</h1>
{/if}
{if isset($allClassifieds)}
{if $allClassifieds|@count === 0}
<b>Brak ogłoszeń w bazie!</b><br/><br/>
{else}
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
               href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/edit/{$classified['id']}">edycja</a>
            <a class="btn btn-xs fs-10 btn-bold btn-secondary disabled btn-block-xs-only"
               href="#">{$classified['name']}</a>
            <a class="btn btn-xs fs-10 btn-bold btn-info disabled btn-block-xs-only" href="#">Dodano:
                {$classified['date']|date_format:"%d/%m/%Y"}</a>
            <a class="btn btn-xs fs-10 btn-bold btn-primary btn-block-xs-only" href="#" data-toggle="modal"
               data-target="#modal-contact">Wyślij wiadomość</a>
        </div>
    </footer>
</div>
{/foreach}

{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}