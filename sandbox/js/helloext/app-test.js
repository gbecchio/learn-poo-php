var Application = null;
Ext.onReady(function() {
    Application = Ext.application({
        name: 'AM',

        controllers: [
            'Users'
        ],

        launch: function() {
            //include the tests in the test.html head
            jasmine.getEnv().addReporter(new jasmine.TrivialReporter());
            jasmine.getEnv().execute();
        }
    });
});
