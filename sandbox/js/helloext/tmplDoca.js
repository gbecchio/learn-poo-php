Ext.onDocumentReady(
  function()
  {
    var tplData = [{
        color :"#FFE9E9",
        name : 'Projets DOCAPOST-DPS',
        since : 5,
        debut : '03/17/2012',
        projets : ['ADP', 'ADP RH', 'Printemps RH', 'SNCF']
      },
      {
        color : "#E9E9FF",
        name : 'Projets La Poste',
        since : 2,
        debut : '10/20/2010',
        projets : ['Perf RH', 'SAE Paie', 'ADP']
    }];
    var myTpl2 = Ext.create(
      'Ext.XTemplate', [
        '<tpl for=".">',
          '<div style="background-color: {color}; margin: 10px;">',
            '<b> Name :</b> {name}<br />',
            '<b> Depuis :</b> {since}<br />',
            '<b> Début :</b> {debut}<br />',
            '<b> Projets :</b> {projets}<br />',
            '<tpl for="projets">',
            '{.}',
            '<tpl if="this.isCamry(values)">',
              '<b> (same projet)</b>',
              '{[ (xindex < xcount) ? " | " : "" ]}',
            '</tpl>',
            '</tpl>',
          '</div>',
        '</tpl>',
        {
          isCamry : function(projet)
          {
            return projet === 'ADP';
          }
        }]
    );
    myTpl2.compile();
    myTpl2.append(document.body, tplData);
    var myTpl = Ext.create(
      'Ext.XTemplate', [
        '<tpl for=".">',
          '<div style="background-color: {color}; margin: 10px;">',
            '<b> Name :</b> {name}<br />',
            '<b> Depuis :</b> {since}<br />',
            '<b> Début :</b> {debut}<br />',
          '</div>',
        '</tpl>'
        ]
    );
    myTpl.compile();
    myTpl.append(document.body, tplData);
    var panel1 = {
      xtype : 'panel',
      title : 'Ajout spécifique',
      html : 'Ajouter un projet avec un type spécifique'
    };
    var panel2 = {
      title : 'Ajout normal',
      html : 'Ajouter un projet sans type'
    };
    Ext.create(
      'Ext.window.Window',
      {
        width: 250,
        height : 150,
        title : 'Ajout de projets DOCPAOST-DPS',
        border : false,
        layout : {
          type : 'accordion',
          animate : true
        },
        items : [
          panel1,
          panel2
        ]
      }
    ).show();
    var panelUn = {
      html : 'SNCF',
      id : 'panel1',
      frame : true,
      height : 100
    };
    var panelDeux = {
      html : '<b>SNCF Traces</b>',
      id : 'panel2',
      frame : true
    };
    var myWinUn = Ext.create(
      'Ext.window.Window',
      {
        id : 'myWinUn',
        height : 400,
        width : 400,
        items : [
          panelUn,
          panelDeux
        ]
      }
    );
    Ext.getCmp('panel2').add(
      {
        title : 'Login',
        id: 'addedPanel',
        html : 'gbecchio'
      }
    );



    Ext.getCmp('myWinUn').insert(
      -1,
      {
        title : 'Traces',
        id: 'Traces',
        html : '<b>id<b> => gbecchio'
      }
    );
    myWinUn.show();
  }
);
