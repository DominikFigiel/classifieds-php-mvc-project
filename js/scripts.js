$(document).ready(function () {

    /* Usuwanie danych z bazy (usuwanie kategorii, usuwanie użytkownika) */

    $('ul.list-group').on("mouseover", "a.delete", function (e) {

        e.preventDefault();
        $('a.delete').confirm({
            content: "Potwierdzasz ?",
            buttons: {
                delete: {
                    text: 'Usuń',
                    btnClass: 'btn-danger',
                    action: function (deleteButton) {
                        //location.href = this.$target.attr('href');

                        // usuwanie (ajax) - start

                        var value = this.$target.attr('data-id');
                        var server_path = this.$target.attr('data-server-path');

                        $.ajax({
                            type: "POST", /* dane będą wysyłane */
                            url: server_path + 'delete/' + value, /* jaki plik będzie przy tym wykorzystywany */
                            data: {name: value},
                            dataType: "html",
                            /* Działania wykonywane w przypadku sukcesu */
                            success: function (html) {
                                var no_results = false;
                                        if ($.trim($(html).find('.list-group-item').html()) == '') {
                                            no_results = true;
                                        }

                                        var ul = $('.list-group').empty();
                                        //pobieramy węzły z dokumentu html
                                var elements = $(html).find('.list-group-item');

                                elements.each(function () {
                                            var content = $(this).html();
                                            var li = '<li class="list-group-item align-items-center">' + content + '</li>';
                                            ul.append(li);
                                        });

                                if (no_results) {
                                    var div_no_results = $('.no-results').empty();
                                            var info = '<b>Brak wyników w bazie!</b>';
                                    div_no_results.append(info);
                                        }

                            },

                            /*Działania wykonywane w przypadku błędu*/
                            error: function (blad) {
                                alert("Wystąpił błąd");
                                console.log(blad);
                                /*Funkcja wyświetlająca informacje
                                                   o ewentualnym błędzie w konsoli przeglądarki*/
                            }
                        });

                        // usuwanie (ajax) - koniec
                    }
                },
                anuluj: {}
            }
        });

    });

    /* Usuwanie danych z bazy (usuwanie ogłoszeń) */

    $('a.classified-delete').confirm({
        content: "Potwierdzasz ?",
        buttons: {
            usun: {
                text: 'Usuń',
                btnClass: 'btn-danger',
                action: function (usunButton) {
                    location.href = this.$target.attr('href');
                }
            },
            anuluj: {}
        }
    });

    /* Pobieranie wynikow wyszukiwania z bazy */

    $('#classified-search').click(function () {
        var server_path = $("input[name='serverPath']").val();
        var category = $("select[name='category']").val();
        var content = $("input[name='id']").val();

        $.ajax({
            type: "POST",
            url: server_path + 'search',
            dataType: 'html',
            data: {id: content, category: category},

            /*Działania wykonywane w przypadku sukcesu*/
            success: function (html) {
                var no_results = false;
                if ($.trim($(html).find('.card').html()) == '') {
                    no_results = true;
                }

                var ul = $('.all-classifieds').empty();
                //pobieramy węzły z dokumentu html
                var elements = $(html).find('.card');

                elements.each(function () {
                    var content = $(this).html();
                    var li = '<div class="card b-1 hover-shadow mb-20">' + content + '</div>';
                    ul.append(li);
                });

                if (no_results) {
                    var div_no_results = $('.all-classifieds').empty();
                    var info = '<p><strong>Nie znaleziono ogłoszeń spełniających wybrane kryteria.</strong></p>' +
                        '<p class="text-center">' +
                        '<a class="btn btn-primary" href="' + server_path + '" role="button">' +
                        'Wyświetl wszystkie ogłoszenia</a></p>';
                    div_no_results.append(info);
                }

            },

            /*Działania wykonywane w przypadku błędu*/
            error: function (blad) {
                alert("Wystąpił błąd");
                console.log(blad);
                /*Funkcja wyświetlająca informacje o ewentualnym błędzie w konsoli przeglądarki*/
            }
        });


    });

    /* Wysyłanie danych do bazy (dodawanie kategorii, dodawanie użytkownika) */

    $('#submit').click(function () { /* Zdefiniowanie zdarzenia inicjującego- kliknięcie przycisku wyślij */

        /*  wyczyszczenie formularza po kliknieciu */

        $('input:text').focus(
            function () {
                $(this).val('');
            });

        /* Pobieranie wartości opcji i zapisywanie ich do zmiennej */

        var value = $("input[name='name']").val();
        var server_path = $("input[name='serverPath']").val();
        if (value.length < 3) // nazwa kategorii nie moze byc krótsza niż 3 znaki
            value = null;

        $.ajax({
            type: "POST", /*Informacja o tym, że dane będą wysyłane*/
            url: server_path + 'insert', /*Informacja, o tym jaki plik będzie przy tym wykorzystywany*/
            data: {name: value}, /*Zdefiniowanie jakie dane będą wysyłane na zasadzie
            pary klucz-wartość np: name=NazwaKategorii*/
            dataType: "html",

            /*Działania wykonywane w przypadku sukcesu*/
            success: function (html) {
                var no_results = false;
                if ($.trim($(html).find('.list-group-item').html()) == '') {
                    no_results = true;
                }

                var ul = $('.list-group').empty();
                //pobieramy węzły z dokumentu html
                var elements = $(html).find('.list-group-item');

                elements.each(function () {
                    var content = $(this).html();
                    var li = '<li class="list-group-item align-items-center">' + content + '</li>';
                    ul.append(li);
                });

                if (!no_results) {
                    var div_brak_wynikow = $('.no-results').empty();
                }
            },

            /*Działania wykonywane w przypadku błędu*/
            error: function (blad) {
                alert("Wystąpił błąd");
                console.log(blad);
                /*Funkcja wyświetlająca informacje o ewentualnym błędzie w konsoli przeglądarki*/
            }
        });

    });


    /**
     Własne metody do walidacji
     **/
    $.validator.addMethod('phonenumber', function (value, element) {
        return /^\d+$/.test(value);
    }, 'Numer telefonu musi składać się z samych cyfr');

    $.validator.addMethod('priceformat', function (value, element) {
        return /^\d+(\.\d{1,2})?$/.test(value);
    }, 'Podany format ceny jest błędny');

    $('#form').validate({
        //reguły dla pola formularza
        rules: {
            //atrybut name: {reguły}
            name: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 3,
                maxlength: 50
            },
            category_id: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 1
            },
            surname: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 3,
                maxlength: 50
            },
            login: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 3,
                maxlength: 30
            },
            password: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 5,
                maxlength: 30
            },
            title: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 5,
                maxlength: 70
            },
            city: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 3,
                maxlength: 30
            },
            content: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 10,
                maxlength: 500
            },
            email: {
                //reguły
                required: true,
                minlength: 4,
                email: true
            },
            phone: {
                //reguły
                required: true,
                phonenumber: true,
                minlength: 9
            },
            price: {
                //reguły
                priceformat: true,
                maxlength: 10
            }
        },
        //komunikaty dla pola formularza
        messages: {
            name: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            category_id: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
            },
            surname: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            login: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            password: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            title: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            city: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            content: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            email: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Adres email musi zawierać minimum {0} znaki!"),
                email: 'Wpisz poprawny adres email',
            },
            phone: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Numer telefonu musi skłądać się z miniminum {0} znaków!")
            },
            price: {
                required: 'Pole wymagane',
                maxlength: jQuery.validator.format("Maksymalna ilość znaków wynosi {0}!"),
            }
        },
        highlight: function (element, errorClass, validClass) {
            //znajdz najbliższy element form-group
            $(element).closest('.form-control').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-control').removeClass(errorClass).addClass(validClass);
        },
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        /**niestandradowa reakcja na kliknięcie submit,
         gdy nie ma błędów,
         blokuje standardową akcję
         **/
        /*submitHandler: function(form) {
            alert('reakcja na subit');
        },*/
        /**
         niestadardowa rekacja na kliknięcie submit,
         gdy są błędy,
         blokuje standardową akcję
         **/
        invalidHandler: function (event, validator) {
            // 'this' to referencja do form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1
                    ? 'Nie wypełniono poprawnie 1 pola. Zostało podświetlone'
                    : 'Nie wypełniono poprawnie ' + errors + ' pól. Zostały podświetlone';
                $("div.alert-danger").html(message);
                $("div.alert-danger").show();
            } else {
                $("div.alert-danger").hide();
            }
        },
    });

    $('#edit-user-form').validate({
        //reguły dla pola formularza
        rules: {
            //atrybut name: {reguły}
            name: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 3,
                maxlength: 50
            },
            surname: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 3,
                maxlength: 50
            },
            login: {
                //reguły - kolejność ma znaczenia
                required: true,
                minlength: 3,
                maxlength: 30
            },
            password: {
                //reguły - kolejność ma znaczenia
                required: false,
                minlength: 5,
                maxlength: 30
            }
        },
        //komunikaty dla pola formularza
        messages: {
            name: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            surname: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            login: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            password: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            }
        },
        highlight: function (element, errorClass, validClass) {
            //znajdz najbliższy element form-group
            $(element).closest('.form-control').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-control').removeClass(errorClass).addClass(validClass);
        },
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        /**niestandradowa reakcja na kliknięcie submit,
         gdy nie ma błędów,
         blokuje standradową akcję
         **/
        /*submitHandler: function(form) {
            alert('reakcja na subit');
        },*/
        /**
         niestadardowa rekacja na kliknięcie submit,
         gdy są błędy,
         blokuje standradową akcję
         **/
        invalidHandler: function (event, validator) {
            // 'this' to referencja do form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1
                    ? 'Nie wypełniono poprawnie 1 pola. Zostało podświetlone'
                    : 'Nie wypełniono poprawnie ' + errors + ' pól. Zostały podświetlone';
                $("div.alert-danger").html(message);
                $("div.alert-danger").show();
            } else {
                $("div.alert-danger").hide();
            }
        },
    });
});