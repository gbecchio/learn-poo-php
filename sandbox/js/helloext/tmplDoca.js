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
        projets : ['Perf RH', 'SAE Paie']
    }];
    var myTpl = Ext.create(
      'Ext.XTemplate',[
        '<tpl for=".">',
          '<div style="background-color: {color}; margin: 10px;">',
            '<b> Name :</b> {name}<br />',
            '<b> Depuis :</b> {since}<br />',
            '<b> Début :</b> {debut}<br />',
            '<b> Projets :</b> {projets}<br />',
            '<tpl for="cars">',
            '{.}',
            '<tpl if="this.isCamry(values)">',
              '<b> (same car)</b>',
              '{[ (xindex < xcount) ? ", " : "" ]}',
            '</tpl>',
            '<br />',
          '</div>',
        '</tpl>',
        {
          isCamry : function(car)
          {
            return car === 'Camry';
          }
        }
      ]
    );
    myTpl.compile();
myTpl.append(document.body, tplData);
    myTpl.compile();
    myTpl.append(document.body, tplData);
    var myTpl_deux = Ext.create(
      'Ext.XTemplate',[
        '<tpl for=".">',
          '<div style="background-color: {color}; margin: 10px;">',
            '<b> Name :</b> {name}<br />',
            '<b> Depuis :</b> {since}<br />',
            '<b> Début :</b> {debut}<br />',
            '<b> Projets : </b>',
          '</div>',
        '<tpl for="projets">',
        '{.}',
        '<tpl if="this.isCamry(values)">',
        '<b> (same car)</b>',
  }
);
