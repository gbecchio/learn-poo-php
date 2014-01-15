var tpl = Ext.create(
  'Ext.Template',
  [
    'Le login est : {login} Le mot de passe est : {motdepasse}!',
    " <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style='color:red;'>Erreur FATALE !!!</b>"
  ]
);
var formPanel = Ext.create(
  'Ext.form.FormPanel',
  {
    itemId : 'formPanel',
    frame : true,
    layout : 'anchor',
    defaultType : 'textfield',
    defaults :
    {
      anchor : '-10',
      labelWidth : 100
    },
    items : [
      {
        fieldLabel : 'Login',
        name : 'login'
      },
      {
        fieldLabel : 'Mot de passe',
        name : 'motdepasse'
      }
    ],
    buttons : [
    {
      text : 'Envoyer',
      handler : function()
      {
        var formPanel = this.up('#formPanel');
        var vals = formPanel.getValues();
        var greeting = tpl.apply(vals);
        Ext.Msg.alert('Politique de mot de passe:', greeting);
      }
    }
  ]
});
Ext.onReady(
  function()
  {
    Ext.create(
      'Ext.window.Window',
      {
        height : 125,
        width : 285,
        closable : false,
        title : 'Connexion AeS:',
        border : false,
        layout : 'fit',
        items : formPanel
      }
    ).show();
    var myDiv1 = Ext.get('div1');
    myDiv1.setHeight(100);
    myDiv1.setWidth(100);
    myDiv1.setStyle("border", "30");
    myDiv1.setSize(265, 100, {duration: 10000, easing:'bounceOut'});
  }
);
Ext.onDocumentReady(
  function()
  {
    var myDiv1 = Ext.get('div1');
    myDiv1.setStyle("border","5px solid #333333");
    myDiv1.setStyle("background-color","#808080");
    var myDiv1 = Ext.get('div1');
    myDiv1.createChild('<b><h1 style="color:#333333;backgroun-color:#F5F5F5;">PRINTEMPS RH : </h1></b>');
    var span1 = Ext.get('span1');
    myDiv1.appendChild(span1);
    myDiv1.createChild('<h2><b style="color:#FFFFFF">Docapost-DPS</b></h2>');
    myDiv1.createChild({
      tag : 'div',
      html : '<br />Signature éléctronique:<br />'
    });
    myDiv1.createChild(
      {
        tag : 'div',
        id : 'nestedDiv',
        style : 'border: 1px dashed; padding: 5px;',
        children :
        {
          tag : 'div',
          html : '...Rechercher',
          style : 'color: #CBCBCB; border: 1px solid'
        }
      }
    );
    myDiv1.insertFirst({
      tag : 'div',
      id : 'firstdiv',
      html : '<span style="color:red;"><b>Erreur de signature éléctronique</b></span>'
    });
    myDiv1.createChild({
      tag : 'div',
      id : 'removeMeLater',
      html : 'Child inserted as node 2 of myDiv1'
      },
    myDiv1.dom.childNodes[3]
  );}
);
