Ext.define('watchapp.model.Poi', {
    extend: 'Ext.data.Model',


    requires: [
        'Ext.data.Field'
    ],

    config: {
        // useCache: false,
        fields: [
            {
                name: 'id_poi'
            },
            {
                name: 'id_type'
            },
            {
                name: 'desc'
            },
            {
                name: 'lat'
            },
            {
                name: 'lng'
            }
            
        ]
    }
});


