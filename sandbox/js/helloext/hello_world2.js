var myDiv1 = null;
Ext.onDocumentReady(
  function()
  {
    myDiv1 = Ext.get('div1');
    var firstChild = myDiv1.down('div:first-child');
    //firstChild.remove();
    var mynestedChild1 = Ext.get('nestedChild1');
    mynestedChild1.remove();
    Ext.get('child4').down('span:first-child').remove();
    //myTpl = new Ext.Template("<div>Hello {0}.</div>");
    var myTpl = Ext.create('Ext.Template' , "<div><b>DOCAPOST-DPS {0}.</b></div>");
    var inne  = Ext.get('deux'); 
    myTpl.append(inne, ['LA POSTE']);
    myTpl.append("child4", ['Printemps-RH']);
    myTpl.append('div1', ['ADP']);
    var myTpl2 = Ext.create('Ext.Template', [
      '<div style="background-color: {color}; margin: 10px;" style="coplor:   #FFFFFF";>',
        '<b> Name :</b> {name}<br />',
        '<b> id projet :</b> {idProjet}<br />',
        '<b> DOB :</b> {dob}<br />',
        '<b> Energy :</b> {energy}<br />',
      '</div>'
    ]);
    myTpl2.compile(); // #2
    myTpl2.append(
        document.body,
        {
          color : "#E9E9FF",
          name : 'Perf-RH',
          idProjet : 20,
          dob : '10/20/89',
          energy : 100
        }
      ); // #3
      myTpl2.append(
        document.body,
        {
          color : "#a1a1a1",
          name : 'Printemps RH',
          idProjet : 25,
          dob : '03/17/84',
          energy : 1200
        }
      );
      myTpl2.append(
        document.body,
        {
          color : "#E9E9FF",
          name : 'Aéroposts de Paris',
          idProjet : 2325,
          dob : '03/17/-2356',
          energy : '789 456 123'
        }
      );
      myTpl2.append(
        document.body,
        {
          color : "#E9E9FF",
          name : 'ADP-RH',
          idProjet : 2325,
          dob : '04/09/1999',
          energy : '987 12 32'
        }
      );
      myTpl2.append(
        document.body,
        {
          color : "#E9E9FF",
          name : 'ARS',
          idProjet : 1987,
          dob : '04/09/2011',
          energy : '987 12 31'
        }
      );
  }
);
