$(document).ready(function () {

    // Ogłoszenia - Potwierdzenie usunięcia (Modal)
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });

    //tutaj wstawiamy kod JQuery, który zostanie uruchomiony
    //jak tylko dokument będzie gotowy do manipulowania jego elementami
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