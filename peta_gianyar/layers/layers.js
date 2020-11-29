var wms_layers = [];
var format_ADMINISTRASIKECAMATAN_AR_0 = new ol.format.GeoJSON();
var features_ADMINISTRASIKECAMATAN_AR_0 = format_ADMINISTRASIKECAMATAN_AR_0.readFeatures(json_ADMINISTRASIKECAMATAN_AR_0, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_ADMINISTRASIKECAMATAN_AR_0 = new ol.source.Vector({
    attributions: [new ol.Attribution({html: '<a href=""></a>'})],
});
jsonSource_ADMINISTRASIKECAMATAN_AR_0.addFeatures(features_ADMINISTRASIKECAMATAN_AR_0);var lyr_ADMINISTRASIKECAMATAN_AR_0 = new ol.layer.Vector({
                declutter: true,
                source:jsonSource_ADMINISTRASIKECAMATAN_AR_0, 
                style: style_ADMINISTRASIKECAMATAN_AR_0,
    title: 'ADMINISTRASIKECAMATAN_AR<br />\
    <img src="styles/legend/ADMINISTRASIKECAMATAN_AR_0_0.png" />  51 - 70 <br />\
    <img src="styles/legend/ADMINISTRASIKECAMATAN_AR_0_1.png" />  70 - 88 <br />\
    <img src="styles/legend/ADMINISTRASIKECAMATAN_AR_0_2.png" />  88 - 107 <br />\
    <img src="styles/legend/ADMINISTRASIKECAMATAN_AR_0_3.png" />  107 - 125 <br />\
    <img src="styles/legend/ADMINISTRASIKECAMATAN_AR_0_4.png" />  125 - 144 <br />'
        });

lyr_ADMINISTRASIKECAMATAN_AR_0.setVisible(true);
var layersList = [lyr_ADMINISTRASIKECAMATAN_AR_0];
lyr_ADMINISTRASIKECAMATAN_AR_0.set('fieldAliases', {'KECAMATAN': 'KECAMATAN', 'JUMLAH_GURU': 'JUMLAH_GURU', 'KODE_DAGRI': 'KODE_DAGRI', });
lyr_ADMINISTRASIKECAMATAN_AR_0.set('fieldImages', {'KECAMATAN': 'TextEdit', 'JUMLAH_GURU': 'TextEdit', 'KODE_DAGRI': 'TextEdit', });
lyr_ADMINISTRASIKECAMATAN_AR_0.set('fieldLabels', {'KECAMATAN': 'inline label', 'JUMLAH_GURU': 'inline label', 'KODE_DAGRI': 'inline label', });
lyr_ADMINISTRASIKECAMATAN_AR_0.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});