jQuery(document).ready(function() {
  // Ici, le DOM est entièrement défini
  alert('ici');
});
$(document).ready(function() {
  // Ici, le DOM est entièrement défini
  console.log('la');
});
$(function() {
  // Ici, le DOM est entièrement défini
  console.log('fff');
});
$(function() {
  $('#texteJQ').html('Hello world. Ce texte est affiché par jQuery.');
});
$(function() {
	var i = 0;
	while(i < 10)
	{
    	$(".rouge").fadeOut("slow",function(){
      $(this).fadeIn("slow");
    	});
    	i++;

	$('.rouge').css('background','red').css('color','yellow');
    } 
});
$(function() {
    $('li > ul').css('color','red');
    $('li + li').css('color','green');
    $('li:first-child').css('color', 'blue');
});
$(function() {
        var div = $('div')[0];
        $.data(div, 'mesValeurs', {premier: 'bonjour', deuxieme: 12, troisieme: 'http://www.siteduzero.com'});
        var val1 = $.data(div, 'mesValeurs').premier;
        var val2 = $.data(div, 'mesValeurs').deuxieme;
        var val3 = $.data(div, 'mesValeurs').troisieme;
        $('#sp1').text(val1);
        $('#sp2').text(val2);
        $('#sp3').text(val3);
        });
$(function() {
    $('#majPremier').click(function() {
      $('#premier').load('maj.html #greg', function() {
        alert('La première zone a été mise à jour');
      });
    });

    $('#majDeuxieme').click(function() {
      $('#deuxieme').load('maj.html #google', function() {
        alert('La deuxième zone a été mise à jour');
      });
    });
    $('#majDeuxieme').click(function() {
      $('#deuxieme').load('mon-script.php #gregg','id=5', function() {
        alert('La deuxième zone a été mise à jour');
      });
    });
  });
$(function() {
        $('#action').click(function() {
          var param = 'l=' + $('#ref').val();
          $('#r').load('proverbes.php',param);
          $('#r2').load('proverbe2.php',{l:$('#ref').val(), p:10});
        });  
      });
$(function() {
        $('#action').click(function() {
          $('#r').html('<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">');
          $.get('proverbes.php?l=9', function(data) {
            alert(data);
            $.post('proverbe2.php', { l:9, nom: 'Pierre34', heure: '2pm', post:'Un peu de texte récupéré dans un formulaire HTML et destiné à être posté dans un forum.' },
   function(data) {
     alert(data);
          });    
        });  
      });
   });
$(function() {
    $('#charger').click(function() {
        $.getJSON('fichier.json', function(donnees) {
        $('#r3').html('<p><b>Nom</b> : ' + donnees.nom + '</p>');
        $('#r3').append('<p><b>Age</b> : ' + donnees.age + '</p>');
        $('#r3').append('<p><b>Ville</b> : ' + donnees.ville + '</p>');
        $('#r3').append('<p><b>Domaine de compétences</b> : ' + donnees.domaine + '</p>');
      });
    });  
  });
   $(function() {
        $('#action2').click(function() {
          $.ajax({
            type: 'POST',
            url: 'proverbes.php?l=7',
            timeout: 3000,
            success: function(data) {
              alert(data); },
            error: function() {
              alert('La requête n\'a pas abouti'); }
          });    
        });  
      });
$(function() {
    $('#action3').click(function() {
      $( "body" ).ajaxSend(function() {
});
      $(document).ajaxStart(function() {
        $(this).html('Méthode ajaxStart exécutée<br>');
      });
      $('#message3').ajaxSend(function(ev, req, options){
        $(this).append('Méthode ajaxSend exécutée, ');
        $(this).append('nom du fichier : ' + options.url + '<br>');
      });
      $('#message3').ajaxStop(function(){
        $(this).append('Méthode ajaxStop exécutée<br>');
      });
      $('#message3').ajaxSuccess(function(ev, req, options){
        $(this).append('Méthode ajaxSuccess exécutée<br>');
      });
      $('#message3').ajaxComplete(function(ev, req, options){
        $(this).append('Méthode ajaxComplete exécutée<br>');
      });
      $('#message3').ajaxError(function(ev, req, options, erreur){
        $(this).append('Méthode ajaxError exécutée, ');
        $(this).append('erreur : ' + erreur + '<br>');
      });
      $('#donnees3').load('maj.html');
    });  
  });
$( document ).ajaxSend(function() {
$( ".log" ).text( "Triggered ajaxSend handler." );
$( ".trigger" ).click(function() {
$( ".result" ).load( "maj.html" );
});
});