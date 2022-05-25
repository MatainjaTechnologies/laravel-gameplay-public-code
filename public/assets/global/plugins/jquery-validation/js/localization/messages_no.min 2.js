/*! jQuery Validation Plugin - v1.14.0 - 6/30/2015
 * http://jqueryvalidation.org/
 * Copyright (c) 2015 Jörn Zaefferer; Licensed MIT */
!function(a){"function"==typeof define&&define.amd?define(["jquery","../jquery.validate.min"],a):a(jQuery)}(function(a){a.extend(a.validator.messages,{required:"Dette feltet er obligatorisk.",maxlength:a.validator.format("Maksimalt {0} tegn."),minlength:a.validator.format("Minimum {0} tegn."),rangelength:a.validator.format("Angi minimum {0} og maksimum {1} tegn."),email:"Oppgi en gyldig epostadresse.",url:"Angi en gyldig URL.",date:"Angi en gyldig dato.",dateISO:"Angi en gyldig dato (&ARING;&ARING;&ARING;&ARING;-MM-DD).",dateSE:"Angi en gyldig dato.",number:"Angi et gyldig nummer.",numberSE:"Angi et gyldig nummer.",digits:"Skriv kun tall.",equalTo:"Skriv samme verdi igjen.",range:a.validator.format("Angi en verdi mellom {0} og {1}."),max:a.validator.format("Angi en verdi som er mindre eller lik {0}."),min:a.validator.format("Angi en verdi som er st&oslash;rre eller lik {0}."),creditcard:"Angi et gyldig kredittkortnummer."})});