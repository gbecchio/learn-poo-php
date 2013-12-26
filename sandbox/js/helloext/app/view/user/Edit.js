Ext.define('AM.view.user.Edit', {
    extend: 'Ext.window.Window',
    alias: 'widget.useredit',
    title: 'Edit User',
    layout: 'fit',
    autoShow: true,

    initComponent: function() {
        this.items = [
            {
                xtype: 'form',
                id: 'rrr',
                items: [
                    {
                        xtype: 'textfield',
                        name : 'name',
                        fieldLabel: 'Name'
                    },
                    {
                        xtype: 'textfield',
                        name : 'email',
                        fieldLabel: 'Email'
                    },
                    {
                        xtype: 'panel',
                        renderTo: Ext.getBody(),
    height: 100,
    width: 200,
    items: [
        {
            // Explicitly define the xtype of this Component configuration.
            // This tells the Container (the tab panel in this case)
            // to instantiate a Ext.panel.Panel when it deems necessary
            xtype: 'panel',
            title: 'Tab One',
            html: 'The first tab',
            listeners: {
                render: function() {
                    Ext.MessageBox.alert('Rendered One', 'Tab One was rendered.');
                }
            }
        },
        {
            // this component configuration does not have an xtype since 'panel' is the default
            // xtype for all Component configurations in a Container
            title: 'Tab Two',
            html: 'The second tab',
            listeners: {
                render: function() {
                    Ext.MessageBox.alert('Rendered One', 'Tab Two was rendered.');
                }
            }
        }
    ]
                    }
                ]
            }
        ];

        this.buttons = [
            {
                text: 'Save',
                action: 'save'
            },
            {
                text: 'Cancel',
                scope: this,
                handler: this.close
            }
        ];

        this.callParent(arguments);
    }
});

