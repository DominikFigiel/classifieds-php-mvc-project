$(document).ready(function () {

    // Potwierdzenie usunięcia

    $('a.usun').confirm({
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

    /* Wysyłanie danych do bazy */
    $('#wyslij').click(function () { /* Zdefiniowanie zdarzenia inicjującego- kliknięcie przycisku wyślij */

        // usuwanie wpisanego tekstu po kliknieciu
        $('input:text').focus(
            function () {
                $(this).val('');
            });

        /*Funkcja pobierająca wartość opcji,
        która następnie zapisywana jest do zmiennej*/
        var wartosc = $("input[name='name']").val();
        var sciezka = $("input[name='serverPath']").val();
        if (wartosc.length < 3)
            wartosc = null;

        $.ajax({
            type: "POST", /*Informacja o tym, że dane będą wysyłane*/
            url: sciezka + 'insert', /*Informacja, o tym jaki plik będzie przy tym wykorzystywany*/
            data: {name: wartosc}, /*Zdefiniowanie jakie dane będą wysyłane na zasadzie
            pary klucz-wartość np: name=NazwaKategorii*/

            /*Działania wykonywane w przypadku sukcesu*/
            success: function () {

                $.ajax({
                    type: "GET",
                    url: sciezka,
                    dataType: "html",
                    //pomyślne wysłanie danych do skryptu
                    success: function (html) {
                        var ul = $('.list-group').empty();
                        //pobieramy węzły z dokumentu html
                        var elementy = $(html).find('.list-group-item');

                        elementy.each(function () {
                            var content = $(this).html();
                            var li = '<li class="list-group-item align-items-center">' + content + '</li>';
                            ul.append(li);
                        });

                        // jQuery dla nowoutworzonych elementow
                        $('a.usun').confirm({
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
                    },
                    //zakończenie połączenia niezależnie od wyniki
                    //błąd połączenia
                    error: function (blad) {
                        //console.log(blad)
                        $('.alert').show();
                    }
                });

            },

            /*Działania wykonywane w przypadku błędu*/
            error: function (blad) {
                alert("Wystąpił błąd");
                console.log(blad);
                /*Funkcja wyświetlająca informacje
                                   o ewentualnym błędzie w konsoli przeglądarki*/
            }
        });

    });


    /* Usuwanie danych z bazy (Nieużywane) */
    $('.usunKategorie').click(function () { /*Zdefiniowanie zdarzenia inicjującego
    - kliknięcie przycisku wyślij*/

        /*Funkcja pobierająca wartość opcji z listy,
        która następnie zapisywana jest do zmiennej*/
        var wartosc = $("input[name='name']").val();
        var sciezka = $("input[name='serverPath']").val();

        $.ajax({
            type: "POST", /*Informacja o tym, że dane będą wysyłane*/
            url: sciezka + 'delete/' + wartosc, /*Informacja, o tym jaki plik będzie przy tym wykorzystywany*/
            data: {name: wartosc},
            /*Działania wykonywane w przypadku sukcesu*/
            success: function () {

                $.ajax({
                    type: "GET",
                    url: sciezka,
                    dataType: "html",
                    //pomyślne wysłanie danych do skryptu
                    success: function (html) {
                        var ul = $('.list-group').empty();
                        //pobieramy węzły z dokumentu html
                        var elementy = $(html).find('.list-group-item');

                        elementy.each(function () {
                            var content = $(this).html();
                            var li = '<li class="list-group-item align-items-center">' + content + '</li>';
                            ul.append(li);
                        });

                        // jQuery dla nowoutworzonych elementow
                        // usuwanie - onClick
                        $('a.usun').confirm({
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

                        // usuwanie - ajax
                        $('.usunKategorie').click(function () { /*Zdefiniowanie zdarzenia inicjującego - kliknięcie przycisku wyślij*/

                            /*Funkcja pobierająca wartość opcji z listy,
                            która następnie zapisywana jest do zmiennej*/
                            var wartosc = $("input[name='name']").val();
                            var sciezka = $("input[name='serverPath']").val();

                            $.ajax({
                                type: "POST", /*Informacja o tym, że dane będą wysyłane*/
                                url: sciezka + 'delete/' + wartosc, /*Informacja, o tym jaki plik będzie przy tym wykorzystywany*/
                                data: {name: wartosc},
                                /*Działania wykonywane w przypadku sukcesu*/
                                success: function () {

                                    $.ajax({
                                        type: "GET",
                                        url: sciezka,
                                        dataType: "html",
                                        //pomyślne wysłanie danych do skryptu
                                        success: function (html) {
                                            var ul = $('.list-group').empty();
                                            //pobieramy węzły z dokumentu html
                                            var elementy = $(html).find('.list-group-item');

                                            elementy.each(function () {
                                                var content = $(this).html();
                                                var li = '<li class="list-group-item align-items-center">' + content + '</li>';
                                                ul.append(li);
                                            });

                                            // jQuery dla nowoutworzonych elementow
                                            $('a.usun').confirm({
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
                                        },
                                        //zakończenie połączenia niezależnie od wyniki
                                        //błąd połączenia
                                        error: function (blad) {
                                            //console.log(blad)
                                            $('.alert').show();
                                        }
                                    });

                                },

                                /*Działania wykonywane w przypadku błędu*/
                                error: function (blad) {
                                    alert("Wystąpił błąd");
                                    console.log(blad);
                                    /*Funkcja wyświetlająca informacje
                                                           o ewentualnym błędzie w konsoli przeglądarki*/
                                }
                            });

                        });
                        // koniec jQuery dla nowych elementow
                    },
                    //zakończenie połączenia niezależnie od wyniki
                    //błąd połączenia
                    error: function (blad) {
                        //console.log(blad)
                        $('.alert').show();
                    }
                });

            },

            /*Działania wykonywane w przypadku błędu*/
            error: function (blad) {
                alert("Wystąpił błąd");
                console.log(blad);
                /*Funkcja wyświetlająca informacje
                                   o ewentualnym błędzie w konsoli przeglądarki*/
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