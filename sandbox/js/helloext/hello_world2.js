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
    myTpl = new Ext.Template("<div>Hello {0}.</div>");
    var inne  = Ext.get('deux'); 
    myTpl.append(inne, ['Marjan']);
    myTpl.append("child4", ['Michael']);
    myTpl.append('div1', ['Sebastian']);
  }
);
