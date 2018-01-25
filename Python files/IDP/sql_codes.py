met = 'SELECT met_waarde FROM apparaat WHERE apparaat_naam ='
gewicht = 'SELECT lid_gewicht FROM leden WHERE lid_id ='
code = 'SELECT isLoggedIn FROM leden WHERE lid_id ='
resultaat = "INSERT INTO resultaat(lid_id, apparaat_id, tijd, cal, gem_snelheid, afstand) VALUES ("
apparaat_code= 'SELECT apparaat_id FROM apparaat WHERE UPPER(apparaat_naam) ='
status= 'UPDATE leden SET isLoggedIn = '

