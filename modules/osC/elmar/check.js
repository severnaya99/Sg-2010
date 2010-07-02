/*
  Das Elm@r-Modul fuer osCommerce
  Unterstuetzung des shopinfo.xml-Standards
  http://projekt.wifo.uni-mannheim.de/elmar/nav/osCommerce
  Copyright (c) 2004-2005 Dr. Stefan Kuhlins, http://kuhlins.de/
  Released under the GNU General Public License
  $Id: check.js 419 2005-11-08 22:31:38Z stefan $
*/

function check_passwordform(form) {
  if (form.elmar_password_input.value == null || form.elmar_password_input.value == '') {
    alert("Bitte geben Sie das Passwort ein.");
    form.elmar_password_input.focus();
    return false;
  }
  return true;
}

function check_shopform(form) {
  form.shopinfo_path.value = trim(form.shopinfo_path.value);
  form.shopinfo_url.value = trim(form.shopinfo_url.value);
  if (form.shopinfo_path.value == null || form.shopinfo_path.value == '') {
    alert("Bitte geben Sie den Pfad der Shopdatei ein.");
    form.shopinfo_path.focus();
    return false;
  }
  if (form.shopinfo_url.value == null || form.shopinfo_url.value == '') {
    alert("Bitte geben Sie die URL der Shopdatei ein.");
    form.shopinfo_url.focus();
    return false;
  }
  return true;
}

function check_regform(form) {
  form.url.value = trim(form.url.value);
  if (form.url.value == null || form.url.value == '') {
    alert("Bitte geben Sie die URL der Shopdatei ein.");
    form.url.focus();
    return false;
  } else if (form.url.value.indexOf('...') > 0) {
    alert("Bitte ersetzen Sie '...' durch den korrekten Pfad zur Shopdatei.");
    form.url.focus();
    return false;
  }
  return true;
}

function check_idealoForm(form) {
  form.link.value = trim(form.link.value);
  if (form.link.value == '') {
    alert("Bitte geben Sie die URL Ihrer Shopdatei ein.");
    form.link.focus();
    return false;
  }
  return true;
}

function check_RockBottomForm(form) {
  form.shopurl.value = trim(form.shopurl.value);
  if (form.shopurl.value == '') {
    alert("Bitte geben Sie die URL Ihrer Shopdatei ein.");
    form.shopurl.focus();
    return false;
  }
  if (!form.agb.checked) {
    alert("Um den Shop anmelden zu können, müssen Sie die Nutzungsbedingungen von RockBottom akzeptieren.");
    return false;
  }
  return true;
}


function check_feedbackform(form) {
  form.text.value = trim(form.text.value);
  form.name.value = trim(form.name.value);
  form.mail.value = trim(form.mail.value);
  var ok = false;
  for (var i = 0; !ok && i < form.rating.length; ++i)
    if (form.rating[i].checked)
      ok = true;
  if (!ok && form.text.value == '') {
    alert("Bitte bewerten Sie das Modul und/oder geben Sie einen Text ein.");
    form.text.focus();
    return false;
  }
  return true;
}

function check_letterform(form) {
  form.to.value = trim(form.to.value);
  form.subject.value = trim(form.subject.value);
  form.text.value = trim(form.text.value);
  form.name.value = trim(form.name.value);
  form.mail.value = trim(form.mail.value);
  if (form.to.value == '') {
    alert("Bitte geben Sie die E-Mail-Adresse des Empfängers ein.");
    form.to.focus();
    return false;
  }
  if (form.subject.value == '') {
    alert("Bitte geben Sie einen Betreff für die E-Mail ein.");
    form.subject.focus();
    return false;
  }
  if (form.text.value == '') {
    alert("Bitte geben Sie den Text für die E-Mail ein.");
    form.text.focus();
    return false;
  }
  if (form.mail.value == '') {
    alert("Bitte geben Sie die E-Mail-Adresse des Absenders, also Ihre ein.");
    form.mail.focus();
    return false;
  }
  return true;
}

function check_prodfilesform(form) {
  var ok = false;
  for (var j=0; j < form.elements.length; ++j) {
    var e = form.elements[j];
    if (e.type == "checkbox" && e.checked) {
      var t = form.elements[j+1];  // Direkt nach der Checkbox e kommt der zugehoerige Text.
      if (t.value == '') {
        alert("Bitte geben Sie einen Dateinamen ein.");
        t.focus();
        return false;
      }
      if (t.value.indexOf('://') >= 0) {
        alert("Bitte geben Sie den Pfad auf dem Server und keine URL ein.");
        t.focus();
        return false;
      }
      ok = true;  // mindestens eine Checkbox aktiviert
    }
  }
  if (!ok) {
    alert("Bitte waehlen Sie mindestens eine zu erzeugende Produktdatei aus.");
    return false;
  }
  return true;
}

function check_backupform(form) {
  var ok = false;
  for (var j=0; j < form.elements.length; ++j) {
    var e = form.elements[j];
    if (e.type == "checkbox" && e.checked) {
      ok = true;
      break;
    }
  }
  if (!ok) {
    alert("Bitte waehlen Sie mindestens eine Datei zum Sichern aus.");
    return false;
  }
  return true;
}

function froogle_ftp_click(url) {
  if (confirm('Möchten Sie eine Produktdatei für Froogle erzeugen und per FTP übertragen?\nJe nach Anzahl der Produkte ist die Produktdatei vorab zu erzeugen und der Vorgang kann recht lange dauern; schließen Sie nicht vorzeitig das Browser-Fenster.')) {
    document.location = url + '&ftp=froogle&language='
      + document.form.language.value + '&currency=' + document.form.currency.value;
  }
}

function all_checkboxes(form) {
  for (var j=0; j < form.elements.length; ++j) {
    var e = form.elements[j];
    if (e.type == "checkbox") {
      e.checked = true;
    }
  }
}

function all_checkboxes_if(form, name) {
  for (var j=0; j < form.elements.length; ++j) {
    var e = form.elements[j];
    if (e.type == "checkbox" && e.name.indexOf(name)>=0) {
      e.checked = true;
    }
  }
}

function no_checkboxes(form) {
  for (var j=0; j < form.elements.length; ++j) {
    var e = form.elements[j];
    if (e.type == "checkbox") {
      e.checked = false;
    }
  }
}

function no_checkboxes_if(form, name) {
  for (var j=0; j < form.elements.length; ++j) {
    var e = form.elements[j];
    if (e.type == "checkbox" && e.name.indexOf(name)>=0) {
      e.checked = false;
    }
  }
}

function no_radios(form) {
  for (var j=0; j < form.elements.length; ++j) {
    var e = form.elements[j];
    if (e.type == "radio") {
      e.checked = false;
    }
  }
}

// Returns a copy of the string with leading and trailing blanks omitted.
function trim(s) {
  if (s == null)
    return null;
  var i = 0;
  while(i < s.length && s.charAt(i) == ' ')
    ++i;
  if (i >= s.length)
    return '';
  var j = s.length - 1;
  while(j >= 0 && s.charAt(j) == ' ')
    --j;
  return s.substring(i, ++j);
}
