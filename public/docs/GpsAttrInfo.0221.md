# Exif0221: GPS Attribute Information

|Field Name|Type|Count|Values|Default|Separator|
|:---|:---|---:|:---|:---:|:---:|
|GPSVersion|BYTE|4|---|2.2.0.0|.|
|GPSVersionID|BYTE|4|---|2.2.0.0|.|
|GPSLatitudeRef|ASCII|2|* N: North latitude<br />* S: South latitude|None|---|
|GPSLatitude|RATIONAL|3|---|None|---|
|GPSLongitudeRef|ASCII|2|* E: East longitude<br />* W: West longitude|None|---|
|GPSLongitude|RATIONAL|3|---|None|---|
|GPSAltitudeRef|BYTE|1|* 0: Sea level<br />* 1: Sea level reference (negative value)|0||
|GPSAltitude|RATIONAL|1|---|None|---|
|GPSTimeStamp|RATIONAL|3|---|None|---|
|GPSSatellites|ASCII|0|---|None|---|
|GPSStatus|ASCII|2|* A: Measurement in progress<br />* V: Measurement Interoperability|None|---|
|GPSMeasureMode|ASCII|2|* 2: 2-dimensional measurement<br />* 3: 3-dimensional measurement|None|---|
|GPSDOP|RATIONAL|1|---|None|---|
|GPSSpeedRef|ASCII|2|* K: Kilometers per hour<br />* M: Miles per hour<br />* N: Knots|K|---|
|GPSSpeed|RATIONAL|1|---|None|---|
|GPSTrackRef|ASCII|2|* T: True direction<br />* M: Magnetic direction|T|---|
|GPSTrack|RATIONAL|1|---|None|---|
|GPSImgDirectionRef|ASCII|2|* T: True direction<br />* M: Magnetic direction|T|---|
|GPSImgDirection|RATIONAL|1|---|None|---|
|GPSMapDatum|ASCII|0|---|None|---|
|GPSDestLatitudeRef|ASCII|2|* N: North latitude<br />* S: South latitude|None|---|
|GPSDestLatitude|RATIONAL|3|---|None|---|
|GPSDestLongitudeRef|ASCII|2|* E: East longitude<br />* W: West longitude|None|---|
|GPSDestLongitude|RATIONAL|3|---|None|---|
|GPSDestBearingRef|ASCII|2|* T: True direction<br />* M: Magnetic direction|T|---|
|GPSDestBearing|RATIONAL|1|---|None|---|
|GPSDestDistanceRef|ASCII|2|* K: Kilometers<br />* M: Niles<br />* N: Knots|K|---|
|GPSDestDistance|RATIONAL|1|---|None|---|
|GPSProcessingMethod|UNDEFINED|0|---|None|---|
|GPSAreaInformation|UNDEFINED|0|---|None|---|
|GPSDateStamp|ASCII|11|---|None|---|
|GPSDifferential|SHORT|1|* 0: Measurement without differential correction<br />* 1: Differential correction applied|None|---|
