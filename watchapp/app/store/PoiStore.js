Ext.define('watchapp.store.PoiStore', {
    extend: 'Ext.data.Store',


    requires: [
        'watchapp.model.Poi',
        'Ext.data.proxy.Ajax',
        'Ext.data.reader.Json'
    ],

 
    config: {
        autoLoad: true,
        // autoSync: true,
        model: 'watchapp.model.MPoi',
        storeId: 'PoiStore',
        proxy: {
            type: "ajax",
            // withCredentials: true,
            // username: 'appli',
            // password: '72N4Vizs',
            url: 'http://lce14.gnkw.org/api/request.php?request=select%20*%20from%20alerte_type',
            reader: {
                type: "json"
            }
        }
    }
}); 