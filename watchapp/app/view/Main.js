Ext.define('watchapp.view.Main', {
    extend: 'Ext.Panel',
    xtype: 'main',
    requires: [
        'Ext.TitleBar',
        'Ext.Map'
    ],
    config: {
        layout: 'fit',
        items: [
            {
                    docked: 'top',
                    xtype: 'titlebar',
                    title: 'WatchApp',
                     items: [
                    {
                        xtype: 'button',
                        iconCls: 'info',
                        // icon: 'resources/icons/Icons/back.png',
                        // iconMask: true,
                        align: 'left',
                        itemId: 'backButton',
                        ui : 'plain'
                    },
                    {
                        /*xtype: 'button',
                        iconCls: 'settings',
                        // icon: 'resources/icons/Icons/gear.png',
                        // iconMask: true,
                        align: 'right',
                        itemId: 'panelButton',*/
                        align : 'right',
                        // iconCls : 'locate',
                        iconCls : 'list',
                        id: 'settings',
                        itemId: 'positionButton',
                        ui : 'plain'
                    }
                    ]
            },
            {
                xtype: 'map',
                flex: 3,
                mapOptions: {
                    zoom: 3
                }

            }
            
        ]
    }
});
