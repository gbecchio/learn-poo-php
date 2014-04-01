$(function() {

    
      $(document).ajaxSend(function(ev, req, options){
        $('#messages').html('Méthode ajaxSend exécutée, ');
        $('#messages').append('nom du fichier : ' + options.url + '<br>');
      });
      $(document).ajaxStop(function(){
        $('#messages').append('Méthode ajaxStop exécutée<br>');
      });
      $(document).ajaxSuccess(function(ev, req, options){
        $('#messages').append('Méthode ajaxSuccess exécutée<br>');
      });
      $(document).ajaxComplete(function(ev, req, options){
        $('#messages').append('Méthode ajaxComplete exécutée<br>');
      });
      $(document).ajaxError(function(ev, req, options, erreur){
        $('#messages').append('Méthode ajaxError exécutée, ');
        $('#messages').append('erreur : ' + erreur + '<br>');
      });
    $('#action').click(function() {

      
       
      $('#donnees').load('maj.html');
    });  
  });